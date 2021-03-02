<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
    parent::__construct();      
    $this->load->model('M_data', 'informasi');
  }

	public function index()
	{
		$data['pasien'] = $this->informasi->get_data_pasien()->num_rows();
		$data['penyakit'] = $this->informasi->get_data_penyakit()->num_rows();
		$data['gejala'] = $this->informasi->get_data_gejala()->num_rows();
		$this->load->view('pages/welcome_message', $data);
	}
}
