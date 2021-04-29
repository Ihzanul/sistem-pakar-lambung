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
						<li class="active"><i class="icon-file-alt"></i> Diagnosa</li>
					</ol>
				</div>
			</div><!-- /.row -->

			<div class="row">
				<div class="col-lg-12">
					<form action="Data/tambah_pasien" method="post" enctype="multipart/form-data">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama_pasien">
							</div>
							<div class="form-group col-md-12">
								<label for="alamat">Alamat</label>
								<input type="text" class="form-control" id="alamat" name="alamat">
							</div>
							<div class="form-group col-md-6">
								<label for="umur">Umur</label>
								<input type="number" min="0" class="form-control" id="umur" name="umur">
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary" name="diagnosa">Diagnosa</button>
							</div>
						</div>
					</form>
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
