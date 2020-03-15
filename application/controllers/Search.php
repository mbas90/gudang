<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_data');


		if($this->session->userdata('user_level') != 3 && $this->session->userdata('user_level') != 1){
			redirect('auth');
		}elseif($this->session->userdata('user_level') == FALSE){
			redirect('auth');
		}
	}


	public function index()
	{
		$data['title'] = 'Dashboard';
		
		$data['barang'] = $this->M_data->cariDataBarang();

		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/search', $data);
		$this->load->view('templates/footer.php');
	}


	public function prosesData()
	{
			$this->M_data->prosesDataBarang();
			$this->session->set_flashdata('flash', 'Di Proses');
			redirect('search/detail/'.$this->input->post('id_barang').'');
	}


	public function detail($id_barang)
	{
		$data['title'] = 'Detail Data Barang';

		$data['barang'] = $this->M_data->getDataById($id_barang);

		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/detail', $data);
		$this->load->view('templates/footer.php');	
	}
}