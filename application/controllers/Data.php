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
		$data['pasien'] = $this->informasi->get_data_pasien()->result_array();
		$this->load->view('pages/data_pasien', $data);
	}

	function crud_penyakit() {
		if (isset($_POST['tambah'])) {
      $inputan = $this->input->post(null, TRUE);
			$this->informasi->post_penyakit($inputan);
			redirect('Data');
    } else if(isset($_POST['ubah'])) {
			$inputan = $this->input->post(null, TRUE);
			$this->informasi->edit_penyakit($inputan);
			redirect('Data');
		}
	}

	function crud_gejala() {
		if (isset($_POST['tambah'])) {
      $inputan = $this->input->post(null, TRUE);
			$this->informasi->post_gejala($inputan);
			redirect('Data/gejala');
    } else if(isset($_POST['ubah'])) {
			$inputan = $this->input->post(null, TRUE);
			$this->informasi->edit_gejala($inputan);
			redirect('Data/gejala');
		}
	}
	
	function tambah_pasien() {
		$inputan = $this->input->post(null, TRUE);
		$this->informasi->post_pasien($inputan);
		redirect('Diagnosa/pilih_gejala');
	}

	function hapus_pasien($id = null) {
		$this->informasi->delete_pasien($id);
		redirect('Data/pasien');
	}

	function show_detail($nama_penyakit = null) {
		$data['penyakit'] = $this->informasi->get_detail($nama_penyakit)->row();
		$obj = (object) array('nama_penyakit' => $nama_penyakit);
		
		$this->informasi->update_pasien($this->session->userdata('id'), $obj, 'berhasil');		
		$this->load->view('pages/berhasil', $data);
		// print_r($obj);
	}
}
