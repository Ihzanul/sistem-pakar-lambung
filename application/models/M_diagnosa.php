<?php

class M_diagnosa extends CI_Model {
  
  function get_daftar_gejala() {
    $this->db->select('*');
    $this->db->from('gejala');
    return $this->db->get();
  }

  function get_daftar_kondisi() {
    $this->db->select("*");
    $this->db->from("t_kondisi");
    return $this->db->get();
  }

  function forward($input) {
    $qry='SELECT id_rule FROM rule WHERE ';
    array_pop($input);
    
    $j = 1;
    $rule_input=array();
    for ($i = 0; $i < count($input['kondisi']); $i++) {
      $new_input = explode("_", $input['kondisi'][$i]);
      
      if ($j < 10) {
        $kondisi = "G0$j";
      } else {
        $kondisi = "G$j";
      }

      //cari cara bagaimana mengecek apakah di dalam suatu index array terdapat karakter yang diinginkan
      if(in_array($kondisi, $new_input)) {
        $qry.=$new_input[0]."=1 and ";
        array_push($rule_input,$new_input[0]);
      }
      $j++;
      // print_r($new_input);
    }
    $qry.="1=1";
    
    // print_r($rule_input);
    // echo $qry;
    // die();
    $data = $this->db->query($qry)->row();

    $rule=array(
      array("G01","G02","G03","G04","G05","G06","G07","G08"),
      array("G02","G07","G09","G04","G10","G11","G12","G13","G14","G15","G18","G19"),
      array("G02","G10","G16","G18","G20","G21"),
      array("G02","G18","G22","G23","G24"),
      array("G07","G12","G16","G25","G26", "G33"),
      array("G06","G27","G28","G29","G34"),
      array("G02","G05","G27","G30","G31","G32")
    );
    
    $status=false;
    for ($i=0; $i < count($rule) ; $i++) {
      $result = ($rule_input == $rule[$i]);
      if ($result) {
        $status = true;
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

      //mulai algoritma CF
    } else {
      date_default_timezone_set("Asia/Jakarta");
      $inptanggal = date('Y-m-d H:i:s');

      $arbobot = array('0', '0', '0.3','0.6', '1.0');
      $argejala = array();

      for ($i = 0; $i < count($_POST['kondisi']); $i++) {
        $arkondisi = explode("_", $_POST['kondisi'][$i]);
        if (strlen($_POST['kondisi'][$i]) > 1) {
          $argejala += array($arkondisi[0] => $arkondisi[1]);
        }
      }
      
      $sqlPenyakit = "SELECT * FROM penyakit ORDER by id_penyakit";
      $dataPenyakit = $this->db->query($sqlPenyakit)->result_array();
      
      $arpenyakit = array();

      foreach($dataPenyakit as $rpenyakit) {
        $cftotal_temp = 0;
        $cf = 0;

        $sqlGejala = "SELECT * FROM t_diagnosa where kode_penyakit = $rpenyakit[id_penyakit]";
        $dataGejala = $this->db->query($sqlGejala)->result_array();
        $cflama = 0;

        foreach($dataGejala as $rgejala) {
          $arkondisi = explode("_", $_POST['kondisi'][0]);
          $gejala = $arkondisi[0];

          // print_r($rgejala);

          for ($i = 0; $i < count($_POST['kondisi']); $i++) {
            $arkondisi = explode("_", $_POST['kondisi'][$i]);
            // print_r($_POST['kondisi']);
            $gejala = $arkondisi[0];
    
            if ($rgejala['kode_gejala'] == $gejala) {
              $cf = ($rgejala['mb'] - $rgejala['md']) * $arbobot[$arkondisi[1]];
              // echo $cf;
              if (($cf >= 0) && ($cf * $cflama >= 0)) {
                $cflama = $cflama + ($cf * (1 - $cflama));
              }
              if ($cf * $cflama < 0) {
                $cflama = ($cflama + $cf) / (1 - Math . Min(Math . abs($cflama), Math . abs($cf)));
              }
              if (($cf < 0) && ($cf * $cflama >= 0)) {
                $cflama = $cflama + ($cf * (1 + $cflama));
              }
            }
          }
        }
        // echo $cflama;
        if ($cflama > 0) {
          $arpenyakit += array($rpenyakit["id_penyakit"] => number_format($cflama, 4));
        }
        // print_r($arpenyakit);
        // die();
      }

      arsort($arpenyakit);
  
      $inpgejala = serialize($argejala);
      $inppenyakit = serialize($arpenyakit);
      // echo $inpgejala;
      // die();
  
      $np1 = 0;
      foreach ($arpenyakit as $key1 => $value1) {
        $np1++;
        $idpkt1[$np1] = $key1;
        $vlpkt1[$np1] = $value1;
      }
      $kd_daftar = $this->session->userdata('id');
      $this->db->query("INSERT INTO t_hasil (tanggal,gejala,penyakit,hasil_id,nilai_cf,kd_daftar) 
      VALUES ('$inptanggal','$inpgejala','$inppenyakit','$idpkt1[1]','$vlpkt1[1]','$kd_daftar')");
      return array(
        'diagnosa' => 'gagal',
        // 'result' => $vlpkt1,
        'penyakit' => $arpenyakit
      );
    }
  }
}