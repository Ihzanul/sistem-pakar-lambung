<?php

class M_data extends CI_Model {
  
  function get_data_penyakit() {
    $this->db->select('*');
    $this->db->from('penyakit');
    return $this->db->get();
  }
  
  function get_data_gejala() {
    $this->db->select('*');
    $this->db->from('gejala');
    return $this->db->get();
  }

  function get_data_rule() {
    $this->db->select('*');
    $this->db->from('rule');
    return $this->db->get();
  }

  function post_penyakit($data) {
    $param = array(
      'id_penyakit' => $data['id_penyakit'],
      'nama_penyakit' => $data['nama_penyakit'],
      'info' => $data['info_penyakit'],
      'solusi' => $data['solusi_penyakit']
    );

    $this->db->insert('penyakit', $param);
  }

  function post_gejala($data) {
    $param = array(
      'nama_gejala' => $data['nama_gejala'],
      'kode_gejala' => $data['kode_gejala'],
    );

    $this->db->insert('gejala', $param);
  }

  function post_pasien($data) {
    $param = array(
      'nama' => $data['nama_pasien'],
      'alamat' => $data['alamat'],
      'umur' => $data['umur']
    );

    $this->db->insert('pasien', $param);
  }

  function update_pasien($id, $data) {
    $param = array(
      'hasil_diagnosa' => $data->nama_penyakit
    );

    $this->db->set($param);
    $this->db->where('id_pasien', $id);
    $this->db->update('pasien');
  }

  function get_pasien() {
    $this->db->select('*');
    $this->db->from('pasien');
    $this->db->order_by('id_pasien', 'DESC');
    $this->db->limit(1);
    return $this->db->get();
  }

}