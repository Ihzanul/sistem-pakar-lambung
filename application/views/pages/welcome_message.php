<?php $this->load->view('header') ?>
<body>

  <div id="wrapper">
    <?php $this->load->view('navbar') ?>

    <div id="page-wrapper">

      <div class="row">
        <div class="col-lg-12">
          <ol class="breadcrumb">
            <li><a href="index.html"><i class="icon-dashboard"></i> Sistem pakar lambung</a></li>
            <li class="active"><i class="icon-file-alt"></i> Beranda</li>
          </ol>
        </div>
      </div><!-- /.row -->

      <div class="row">
        <div class="col-lg-12">
          <h1 style="text-align: center">SELAMAT DATANG <br> SISTEM PAKAR PENYAKIT LAMBUNG</h1>
        </div>
        <div class="col-lg-12">
          <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Welcome to SB Admin by <a class="alert-link" href="http://startbootstrap.com">Start Bootstrap</a>! Feel
            free to use this template for your admin needs! We are using a few different plugins to handle the dynamic
            tables and charts, so make sure you check out the necessary documentation links provided.
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading"><?= $pasien ?></p>
                  <p class="announcement-text">Jumlah Pasien</p>
                </div>
              </div>
            </div>
            <a href="Data/pasien">
              <div class="panel-footer announcement-bottom">
                <div class="row">
                  <div class="col-xs-6">
                    Data Pasien
                  </div>
                  <div class="col-xs-6 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="panel panel-success">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-medkit fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading"><?= $penyakit ?></p>
                  <p class="announcement-text">Jumlah Penyakit</p>
                </div>
              </div>
            </div>
            <a href="Data">
              <div class="panel-footer announcement-bottom">
                <div class="row">
                  <div class="col-xs-6">
                    Data Penyakit
                  </div>
                  <div class="col-xs-6 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-tasks fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading"><?= $gejala ?></p>
                  <p class="announcement-text">Jumlah Gejala</p>
                </div>
              </div>
            </div>
            <a href="Data/gejala">
              <div class="panel-footer announcement-bottom">
                <div class="row">
                  <div class="col-xs-6">
                    Data Gejala
                  </div>
                  <div class="col-xs-6 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div><!-- /#page-wrapper -->

  </div><!-- /#wrapper -->
  <?php $this->load->view('footer') ?>
  <script>
    const menu = document.getElementById("beranda")
    menu.className += "active"
  </script>
</body>

</html>
