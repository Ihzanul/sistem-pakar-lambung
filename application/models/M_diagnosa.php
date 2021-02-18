<?php

class M_diagnosa extends CI_Model {
  
  function get_daftar_gejala() {
    $this->db->select('*');
    $this->db->from('gejala');
    return $this->db->get();
  }

  function forward($input) {
    $qry='SELECT id_rule FROM rule WHERE ';
    array_pop($input);
    $rule_input=array();
    foreach ($input as $where) {
      $qry.=$where."=1 and ";
      array_push($rule_input,$where);
    }
    $qry.="1=1";

    $data = $this->db->query($qry)->row();

    $rule=array(
      array("G01","G02","G03","G04","G05","G06","G07","G08"),
      array("G02","G07","G09","G04","G10","G11","G12","G13","G14","G15","G18","G19"),
      array("G02","G10","G16","G18","G20","G21"));
    
    $status=false;
    for ($i=0; $i <1 ; $i++) {
      $result=($rule_input==$rule[$i]);
      if ($result) {
        $status=true;
      }
    }
    // return $data;

    if($status == true){
      $id = $data->id_rule;
      $cari_penyakit="SELECT * FROM penyakit WHERE id_penyakit=$id";
      $penyakit = $this->db->query($cari_penyakit)->row();
      return array(
        'diagnosa' => 'berhasil',
        'penyakit' => $penyakit
      );

    } else {
        $result =array();
        for ($i=0; $i< count($rule); $i++) {
          $sama=array_intersect($rule[$i],$input);
          $jumlah = count($sama)/count($rule[$i])*100;
          array_push($result,$jumlah);
        }
        $query = "SELECT nama_penyakit FROM penyakit";
        $penyakit = $this->db->query($query)->result_array();

        return array(
          'diagnosa' => 'gagal',
          'result' => $result,
          'penyakit' => $penyakit
        );
    }
    
  }

}