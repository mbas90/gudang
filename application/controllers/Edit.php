<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_data');

		if ($this->session->userdata('user_level') == FALSE) {
			redirect('auth');
		}
	}


	public function index($id_barang)
	{
		$data['title']    = 'Edit Data Barang';
		$data['databyid'] = $this->M_data->getDataById($id_barang);

		$this->load->view('templates/header', $data);
		$this->load->view('pages/edit_data', $data);
		$this->load->view('templates/footer');
	}

	public function EditPO($id_po)
	{
		$data['title']    = 'Edit Data PO';
		$data['databyid'] = $this->M_data->getDataPOById($id_po);
		// var_dump($data);

		$this->load->view('templates/header', $data);
		$this->load->view('pages/edit_po', $data);
		$this->load->view('templates/footer');
	}

	public function approvepo($id_po)
	{
		$this->db->update('po', ['status' => 'approve', 'tanggal_approve' => date('Y-m-d H:i:s')], ['id_po' => $id_po]);
		redirect(base_url('edit/EditPO/' . $id_po));
	}
}
