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
					<h2>Daftar Pasien</h2>
					<!-- <button style="float: right; margin: 10px" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah</button> -->
					<div class="table-responsive">
						<table class="table table-bordered table-hover tablesorter">
							<thead>
								<tr>
									<th>No. </th>
									<th>Nama Pasien </th>
									<th>Alamat </th>
									<th>Umur </th>
									<th>Hasil Diagnosa </th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach($pasien as $b => $row) { ?>
									<tr>
										<td><?= $i++ ?></td>
										<td><?= $row['nama'] ?></td>
										<td><?= $row['alamat'] ?></td>
										<td><?= $row['umur'] ?></td>
										<td><?= $row['hasil_diagnosa'] ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- /.row -->

		</div><!-- /#page-wrapper -->

	</div><!-- /#wrapper -->
	<?php $this->load->view('footer') ?>
	<script>
    const menu = document.getElementById("drop")
    menu.className += " active"
  </script>
</body>

</html>
