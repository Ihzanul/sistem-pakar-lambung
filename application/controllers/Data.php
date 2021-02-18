<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	function __construct(){
    parent::__construct();      
    $this->load->model('M_data', 'informasi');
  }

  function index()
	{
		$data['penyakit'] = $this->informasi->get_data_penyakit()->result_array();
		$this->load->view('pages/data_penyakit', $data);
	}

  function gejala()
	{
		$data['gejala'] = $this->informasi->get_data_gejala()->result_array();
		$this->load->view('pages/data_gejala', $data);
	}

  function rule()
	{
		$data['rule'] = $this->informasi->get_data_rule()->result_array();
		$this->load->view('pages/data_rule', $data);
		// print_r($data['rule']);
	}

  function pasien()
	{
		$data['penyakit'] = $this->informasi->get_data_pasien()->result_array();
		$this->load->view('pages/data_pasien', $data);
	}

	function crud_penyakit() {
		if (isset($_POST['tambah'])) {
      $inputan = $this->input->post(null, TRUE);
			$this->informasi->post_penyakit($inputan);
			redirect('Data');
    }
	}

	function crud_gejala() {
		if (isset($_POST['tambah'])) {
      $inputan = $this->input->post(null, TRUE);
			$this->informasi->post_gejala($inputan);
			redirect('Data/gejala');
    }
	}
	
	function tambah_pasien() {
		$inputan = $this->input->post(null, TRUE);
		$this->informasi->post_pasien($inputan);
		redirect('Diagnosa/pilih_gejala');
	}
}