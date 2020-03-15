<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_data');

		if($this->session->userdata('user_level') != 2 && $this->session->userdata('user_level') != 1){
			redirect('auth');
		}elseif($this->session->userdata('user_level') == FALSE){
			redirect('auth');
		}

	}

	public function index()
	{
		$data['title'] = 'Dashboard';

		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/input_data', $data);
		$this->load->view('templates/footer.php');
	}

	public function print($kode_barang)
	{
		$data['title'] = 'Detail Data Barang';

		$data['print'] = $this->M_data->getDataPrint($kode_barang);


		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/print', $data);
		$this->load->view('templates/footer.php');
	}

	public function prosesInput()
	{
		$this->M_data->inputDataBarang();
		$this->session->set_flashdata('flash', 'Di Input');

		$key = str_replace(' ', '', $this->input->post('kode_barang'));
		redirect('input/print/'.$key.'');
	}

	public function prosesEdit()
	{
		$this->M_data->editData();
		$this->session->set_flashdata('flash', 'Di Ubah');

		redirect('data_list');
	}

}