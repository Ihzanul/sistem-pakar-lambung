<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {

	function __construct(){
    parent::__construct();      
    $this->load->model('M_diagnosa', 'diagnosa');
    $this->load->model('M_data', 'informasi');
  }

  public function index()
	{
		$this->load->view('pages/pasien');
	}

  function pilih_gejala() {
    $data['gejala'] = $this->diagnosa->get_daftar_gejala()->result_array();
		$data['pasien'] = $this->informasi->get_pasien()->row();

    $data_session = array(
      'id' => $data['pasien']->id_pasien
    );
    $this->session->set_userdata($data_session);

    $this->load->view('pages/diagnosa', $data);
  }

  function diagnosa() {
    if (isset($_POST['kirim'])) {
      $inputan = $this->input->post(null, TRUE);
      $hasil = $this->diagnosa->forward($inputan);

      // print_r($hasil['penyakit']);
      $this->informasi->update_pasien($this->session->userdata('id'), $hasil['penyakit'], $hasil['diagnosa']);

      if($hasil['diagnosa'] == 'berhasil') {
        $this->load->view('pages/berhasil', $hasil);
        // print_r($hasil);
      } else {
        $this->load->view('pages/gagal', $hasil);
        // print_r($hasil);
      }
    }
    // print_r($wew);
  }
}
