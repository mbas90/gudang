<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_data extends CI_Model
{

	public function getTotalData()
	{
		$date = date('d-M-Y');

		$query['barang_masuk'] = $this->db->select('count(status) as total')->where('status', 'Masuk')->where('tanggal', $date)->get('barang')->row();
		$query['barang_keluar'] = $this->db->select('count(status) as total')->where('status', 'Keluar')->where('tanggal', $date)->get('barang')->row();
		$query['barang'] = $this->db->select('count(status) as total')->where('tanggal', $date)->get('barang')->row();

		return $query;
	}

	public function getTotalOperator()
	{
		$query = $this->db->select('count(user_level) as total')->where('user_level', '2')->or_where('user_level', '3')->get('user')->row();
		return $query->total;
	}


	public function inputDataBarang()
	{

		if ($data['jenis_barang'] == 'Motor') {
			$stok = '4000';
		} else {
			$stok = '3500';
		};
		$data = [
			"no_barang"    => strtoupper(str_replace(' ', '', $this->input->post('kode_barang', true))),
			"jenis_barang" => $this->input->post('jenis_barang', true),
			"keterangan"      => $this->input->post('keterangan'),
			"tanggal"         => $this->input->post('tanggal', true),
			"barang_masuk"     => $this->input->post('barang_masuk', true),
			"barang_keluar"    => $this->input->post('barang_keluar', true),
			"stok"           => $stok,
			"status"          => $this->input->post('status', true)
		];

		$this->db->insert('barang', $data);
	}


	public function hapusDataBarang($id_barang)
	{
		$this->db->where('id_barang', $id_barang);
		$this->db->delete('barang');
	}


	public function cariDataBarang()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->where('kode_barang', $keyword);
		$this->db->where('status', 'Masuk');
		return $this->db->get('barang')->result_array();
	}


	public function prosesDataBarang()
	{
		$data = [
			"kode_barang"    => $this->input->post('kode_barang', true),
			"jenis_barang" => $this->input->post('jenis_barang', true),
			"tanggal"         => $this->input->post('tanggal', true),
			"barang_masuk"     => $this->input->post('barang_masuk', true),
			"barang_keluar"    => $this->input->post('barang_keluar', true),
			"stok" 		  => $this->input->post('stok', true),
			"status" 		  => $this->input->post('status', true)
		];

		$this->db->where('id_barang', $this->input->post('id_barang'));
		$this->db->update('barang', $data);
	}



	public function getDataBarangMasuk($user_level)
	{
		if ($user_level == '2') {
			$this->db->select('*');
			$this->db->where('status', 'Masuk');
			$query = $this->db->get('barang');
		} elseif ($user_level == '3') {
			$this->db->select('*');
			$this->db->where('status', 'Keluar');
			$query = $this->db->get('barang');
		} else {
			$this->db->select('*');
			$query = $this->db->get('barang');
		}

		return $query->result_array();
	}

	public function getDataById($id_barang)
	{
		return $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
	}

	public function getDataPOById($id_barang)
	{
		return
			$this->db->join('user', 'user.user_id=po.id_user')->get_where('po', ['id_po' => $id_barang])->row_array();
	}


	// data list

	public function getDataPO()
	{
		$data = $this->db->join('user', 'user.user_id=po.id_user')->get('po')->result_array();
		// echo $this->db->last_query();
		return $data;
	}

	public function getDataBarang()
	{
		$data = $this->db->get('barang')->result_array();
		// echo $this->db->last_query();
		return $data;
	}


	// end data list

	// data detail

	function getDataDetailPO($id_po = null)
	{
		return $this->db->get_where('po', ['id_po' => $id_po])->result_array();
	}
	// end data detail

	public function getDataPrint($kode_barang)
	{
		return $this->db->get_where('barang', ['kode_barang' => $kode_barang])->row_array();
	}


	public function getDataByGroup()
	{
		$query = $this->db->query("SELECT jenis_barang, COUNT(jenis_barang) AS total FROM barang GROUP BY jenis_barang");
		return $query->result_array();
	}


	public function editData()
	{
		if ($data['jenis_barang'] == 'Motor') {
			$stok = '4000';
		} else {
			$stok = '3500';
		};
		$data = [
			"id_barang"		  => $this->input->post('id_barang'),
			"kode_barang"    => strtoupper(str_replace(' ', '', $this->input->post('kode_barang', true))),
			"jenis_barang" => $this->input->post('jenis_barang', true),
			"keterangan"      => $this->input->post('keterangan'),
			"tanggal"         => $this->input->post('tanggal', true),
			"barang_masuk"     => $this->input->post('barang_masuk', true),
			"barang_keluar"    => $this->input->post('barang_keluar', true),
			"stok"             => $stok,
			"status"          => $this->input->post('status', true)
		];

		$this->db->where('id_barang', $this->input->post('id_barang'));
		$this->db->update('barang', $data);
	}
}
