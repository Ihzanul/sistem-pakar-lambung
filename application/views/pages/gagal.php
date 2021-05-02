<?php $this->load->view('header') ?>
<body>

	<div id="wrapper">
		<?php $this->load->view('navbar') ?>

		<div id="page-wrapper">

			<div class="row">
				<div class="col-lg-12">
					<h1>SISTEM PAKAR PENYAKIT LAMBUNG</h1>
					<ol class="breadcrumb">
						<li><a href="index.html"><i class="icon-dashboard"></i> Sistem pakar lambung</a></li>
						<li class="active"><i class="icon-file-alt"></i> Data Penyakit</li>
					</ol>
				</div>
			</div><!-- /.row -->

			<div class="row">
				<div class="col-lg-12">
					<h2>Daftar Penyakit</h2>
					<div class="table-responsive">
						<table class="table table-bordered table-hover tablesorter">
							<thead>
								<tr>
									<th>No. </th>
									<th>Nama Penyakit </th>
									<th>Presentase </th>
								</tr>
							</thead>
							<tbody>
								<?php $j = 1; for ($i = 0; $i < count($daftar_penyakit); $i++) {
											
											$perintah = "SELECT * from penyakit where id_penyakit = '".$daftar_penyakit[$i]."'";
											$data = $this->db->query($perintah)->row();	
								?>
									
									<tr>
										<td><?= $j++ ?></td>
										<td><?= $data->nama_penyakit ?></td>
										<td><?= round($nilai_cf[$i], 2) ?> %</td>
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
    const menu = document.getElementById("diagnosa")
    menu.className += "active"
  </script>
</body>

</html>
