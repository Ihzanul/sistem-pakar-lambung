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
				<div class="col-lg-12">
					<h2>Daftar Rule</h2>
					<!-- <button style="float: right; margin: 10px" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah</button> -->
					<div class="table-responsive">
						<table class="table table-bordered table-hover tablesorter">
							<thead>
								<tr>
									<th>No. </th>
									<?php for ($i=1; $i < count($rule[1]); $i++) { ?>
                    <th>G<?= $i ?> </th>
                  <?php } ?>
                  </tr>
							</thead>
							<tbody>
								<?php foreach($rule as $b => $row) { ?>
									<tr>
										<td><?= $row['id_rule'] ?></td>
										<?php for ($i=1; $i < count($rule[1]); $i++) { 
											if($i <=9) { ?>
												<td><?= $row["G0$i"] ?></td>
                  		<?php } else { ?>
												<td><?= $row["G$i"] ?></td>
                  		<?php } } ?>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- /.row -->

		</div><!-- /#page-wrapper -->

		<div id="tambah" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-tittle">Tambah Data Rule</h4>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label class="control-label" for="nama">Nama gejala</label>
								<input type="text" name="nama_gejala" class="form-control" id="nama">
							</div>
              <div class="form-group">
                <label class="control-label" for="kode">Kode Gejala</label>
                <input type="text" name="kode_gejala" class="form-control" id="kode">
              </div>
						</div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger">Reset</button>
              <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
            </div>
          </form>
        </div>
      </div>
    </div>

	</div><!-- /#wrapper -->
	<?php $this->load->view('footer') ?>
	<script>
    const menu = document.getElementById("drop")
    menu.className += " active"
  </script>
</body>

</html>
