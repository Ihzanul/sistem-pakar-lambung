<?php $this->load->view('header') ?>

<body>

	<div id="wrapper">
		<?php $this->load->view('navbar') ?>

		<div id="page-wrapper">

			<div class="row">
				<div class="col-lg-12">
					<h1>SELAMAT DATANG <small>SISTEM PAKAR PENYAKIT LAMBUNG</small></h1>
					<ol class="breadcrumb">
						<li><a href="index.html"><i class="icon-dashboard"></i> Sistem pakar lambung</a></li>
						<li class="active"><i class="icon-file-alt"></i> Data Penyakit</li>
					</ol>
				</div>
			</div><!-- /.row -->

      <div class="row">
        <div class="col-lg-7">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-clock-o"></i> Pasien atas nama <?= $pasien->nama ?></h3>
            </div>
            <div class="panel-body">
              <div class="list-group">
                <form action="Diagnosa/diagnosa" method="post">
                    <?php foreach($gejala as $b => $d) { ?>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group" style="display: flex">
                            <input style="margin: 10px 10px 10px 5px" type="checkbox" id="check<?=$d['kode_gejala']?>" value="<?=$d['kode_gejala']?>" name="<?=$d['id_gejala']?>">
                            <label class="form-control" for="check<?=$d['kode_gejala']?>"><?=$d['nama_gejala']?></label>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="text-right">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="kirim" value="submit">
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>

		</div><!-- /#page-wrapper -->

	</div><!-- /#wrapper -->

	<?php $this->load->view('footer') ?>
	<script>
		const menu = document.getElementById("diagnosa")
		menu.className += "active"

	</script>
</body>

</html>
