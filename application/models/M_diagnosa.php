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
      $cfRule = array();
      foreach ($input as $g) {
        if ($g == 'submit')
          continue;
        $gejalaExplode = explode('G', $g);
        $gejalaNumber = $gejalaExplode[1];
        $cfRule[strval(intval($gejalaNumber))] = true;
      }

      $cfRule['submit'] = '';

      $sql = '';
      $i = 0;

      
      foreach($cfRule as $cf => $val) {
        if ($val == 1)
        {
          if ($sql == '')
          {
            $sql = "'$cf'";
          }
          else
          {
            $sql = $sql.",'$cf'";
          }
        }
        $i++;
      }
      
      empty($daftar_penyakit);
      empty($daftar_cf);
      
      if ($sql != '') {
        //mencari kode_penyakit di tabel pengetahuan yang gejalanya dipilih
        $perintah = "SELECT kode_penyakit FROM t_diagnosa WHERE kode_gejala IN ($sql) GROUP BY kode_penyakit ORDER BY kode_penyakit";
        //echo "<br/>".$perintah."<br/>";
        $minta = $this->db->query($perintah)->result_array();
        $id_penyakit_terbesar = '';
        $kode_penyakit_terbesar = '';
        $nama_penyakit_terbesar = '';
        $c = 0;
        
        // print_r($minta);
        // while($hs=mysqli_fetch_array($minta))
        foreach($minta as $hs) {
          //memproses id penyakit satu persatu
          $kode_penyakit = $hs['kode_penyakit'];
          $qryi = "SELECT * FROM penyakit WHERE id_penyakit = '$kode_penyakit'";
          // $qry =mysqli_query($mysqli,$qryi);
          // $dt = mysqli_fetch_array($qry);
          $dt = $this->db->query($qryi)->result_array();
          $nama_penyakit = $dt[0]['nama_penyakit'];

          $daftar_penyakit[$c] = $hs['kode_penyakit'];
          $p = "SELECT kode_penyakit, mb, md, kode_gejala FROM t_diagnosa WHERE kode_gejala IN ($sql) AND kode_penyakit = '$kode_penyakit'";
          //echo $p.'<br/>';
          // $m =mysqli_query($mysqli,$p);
          //mencari jumlah gejala yang ditemukan
          // $jml = mysqli_num_rows($m);
          $jml = $this->db->query($p)->num_rows();
          //jika gejalanya 1 langsung ketemu CF nya

          // echo $jml;
          if ($jml == 1)
          {
            // $h=mysqli_fetch_array($m);
            $h = $this->db->query($p)->result_array();
            $mb = $h[0]['mb'];
            $md = $h[0]['md'];
            $cf = $mb - $md;
            $daftar_cf[$c] = $cf;
            //cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
            if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
            {
              $cf_terbesar = $cf;
              $id_penyakit_terbesar = $kode_penyakit;
              $nama_penyakit_terbesar = $nama_penyakit;
            }
            //jika jumlah gejala cuma dua maka CF ketemu	
          }
          else if ($jml > 1)
          {
            $i = 1;
            $m = $this->db->query($p)->result_array();
            //proses gejala satu persatu
            foreach($m as $h)
            // while($h=mysqli_fetch_array($m))
            {
              //pada gejala yang pertama masukkan MB dan MD menjadi MBlama dan MDlama
              if ($i == 1)
              {
                $mblama = $h['mb'];
                $mdlama = $h['md'];
                }
              //pada gejala yang nomor dua masukkan MB dan MD menjadi MBbaru dan MB baru kemudian hitung MBsementara dan MDsementara
              else if ($i == 2)
              {
                $mbbaru = $h['mb'];
                $mdbaru = $h['md'];
                $mbsementara = $mblama + ($mbbaru * (1 - $mblama));
                $mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
                //jika jumlah gejala cuma dua maka CF ketemu
                if ($jml == 2)
                {
                  $mb = $mbsementara;
                  $md = $mdsementara;
                  $cf = $mb - $md;
                  $daftar_cf[$c] = $cf;
                  //cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
                  if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
                  {
                    $cf_terbesar = $cf;
                    $id_penyakit_terbesar = $id_penyakit;
                    $nama_penyakit_terbesar = $nama_penyakit;
                  }
                }
              }
              //pada gejala yang ke 3 dst proses MBsementara dan MDsementara menjadi MBlama dan MDlama
              //MB dan MD menjadi MBbaru dan MDbaru
              //hitung MBsementara dan MD sementara yg sekarang
              else if ($i >= 3)
              {
                $mblama = $mbsementara;
                $mdlama = $mdsementara;
                $mbbaru = $h['mb'];
                $mdbaru = $h['md'];
                $mbsementara = $mblama + ($mbbaru * (1 - $mblama));
                $mdsementara = $mdlama + ($mdbaru * (1 - $mdlama));
                //jika ini adalah gejala terakhir berarti CF ketemu
                if ($jml == $i)
                {
                  $mb = $mbsementara;
                  $md = $mdsementara;
                  $cf = $mb - $md;
                  $daftar_cf[$c] = $cf;
                  //cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
                  if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
                  {
                    $cf_terbesar = $cf;
                    $id_penyakit_terbesar = $kode_penyakit;
                    $nama_penyakit_terbesar = $nama_penyakit;
                  }
                }
              }
              $i++;
            }
          }
          $c++;
        }
      }
      //urutkan daftar gejala berdasarkan besar CF
      for ($i = 0; $i < count($daftar_penyakit); $i++)
      {
        for ($j = $i + 1; $j < count($daftar_penyakit); $j++)
        {
          if ($daftar_cf[$j] > $daftar_cf[$i])
          {
            $t = $daftar_cf[$i];
            $daftar_cf[$i] = $daftar_cf[$j];
            $daftar_cf[$j] = $t;

            $t = $daftar_penyakit[$i];
            $daftar_penyakit[$i] = $daftar_penyakit[$j];
            $daftar_penyakit[$j] = $t;
          }
        }
      }
      // return var_dump($input);

      // return var_dump($daftar_penyakit);
      // print_r($daftar_penyakit);
      // $perintah = "SELECT * from penyakit where nama_penyakit = '$nama_penyakit_terbesar'";
      // $diagnosa = $this->db->query($perintah)->row();

      return array(
        'diagnosa' => 'gagal',
        // 'penyakit' => $diagnosa,
        'daftar_penyakit' => $daftar_penyakit,
        'nilai_cf' => $daftar_cf
      );
    }
    
  }

}