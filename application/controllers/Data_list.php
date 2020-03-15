<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_list extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_data');

		if ($this->session->userdata('user_level') == FALSE) {
			redirect('auth');
		}
	}


	public function index()
	{
		$data['title'] = 'Data List';
		$user_level = $this->session->userdata('user_level');
		$data['DataBarangMasuk'] = $this->M_data->getDataPO();

		$this->load->view('templates/header.php', $data);
		if ($user_level == '2') {
			$this->load->view('pages/table_barang_masuk', $data);
		} elseif ($user_level == '3') {
			$this->load->view('pages/table_barang_keluar', $data);
		} else {
			$this->load->view('pages/table_po', $data);
		}
		$this->load->view('templates/footer.php');
	}


	// tampil data
	function tampilPo()
	{
		$data['title'] = 'Data PO';
		$data['user_level'] = $this->session->userdata('user_level');
		$data['DataPO'] = $this->M_data->getDataPO();
		$this->load->view('templates/header.php');
		$this->load->view('pages/table_po', $data);
		$this->load->view('templates/footer.php');
	}

	function tampilBarang()
	{
		$data['title'] = 'Data Barang';
		$data['user_level'] = $this->session->userdata('user_level');
		$data['DataBarangMasuk'] = $this->M_data->getDataBarang();
		$this->load->view('templates/header.php');
		$this->load->view('pages/table_barang_all', $data);
		$this->load->view('templates/footer.php');
	}


	// edit data
	function EditPO($id_po = null)
	{
		$data['title'] = 'Edit PO';
		$data['user_level'] = $this->session->userdata('user_level');
		if ($id_po != null) {
			$data['po'] = $this->M_data->getDataDetailPO($id_po);
		}
		$this->load->view('templates/header.php');
		$this->load->view('pages/edit_po', $data);
		$this->load->view('templates/footer.php');
	}

	//tambah PO
	function tambahPO()
	{
		$data['title'] = 'Input PO';
		$this->load->view('templates/header.php');
		$this->load->view('pages/input_po', $data);
		$this->load->view('templates/footer.php');
	}


	// hapus data

	public function delete($id_barang)
	{
		$this->M_data->hapusDataBarang($id_barang);
		$this->session->set_flashdata('flash', 'Di Hapus');
		redirect('data_list');
	}

	public function detail($id_barang)
	{
		$data['title'] = 'Detail Data Barang';

		$data['barang'] = $this->M_data->getDataById($id_barang);

		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/detail', $data);
		$this->load->view('templates/footer.php');
	}

	public function edit($id_barang)
	{
		$data['title']    = 'Edit Data Barang';
		$data['databyid'] = $this->M_data->getDataById($id_barang);

		$this->load->view('templates/header', $data);
		$this->load->view('pages/edit_data', $data);
		$this->load->view('templates/footer');
	}

	public function table_po($id_barang)
	{
		$data['title'] = 'Detail Data PO';

		$data['barang'] = $this->M_data->getDataById($id_po);

		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/table_po', $data);
		$this->load->view('templates/footer.php');
	}
}
