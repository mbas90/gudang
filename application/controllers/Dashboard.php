<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_data');

		if($this->session->userdata('user_level') != 1){
			redirect('auth');
		}elseif($this->session->userdata('user_level') == FALSE){
			redirect('auth');
		}

	}

	public function index()
	{
		$data['title'] = 'Dashboard';

		$data['total'] = $this->M_data->getTotalData();
		$data['total_operator'] = $this->M_data->getTotaloperator();
		$data['dataBarang'] = $this->M_data->getDataByGroup();

		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/home', $data);
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

	public function inputData()
	{
		$this->M_data->inputDataBarang();
		$this->session->set_flashdata('flash', 'Di Input');
		redirect('dashboard/print/'.$this->input->post('kode_barang').'');
	}

	public function hapusData()
	{
		$this->M_data->hapusDataBarang();
		$this->session->set_flashdata('flash', 'Di Hapus');
	}
}