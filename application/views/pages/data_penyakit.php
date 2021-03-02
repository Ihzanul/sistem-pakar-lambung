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
					<h2>Daftar Penyakit</h2>
					<button style="float: right; margin: 10px" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah</button>
					<div class="table-responsive">
						<table class="table table-bordered table-hover tablesorter">
							<thead>
								<tr>
									<th>No. <i class="fa fa-sort"></i></th>
									<th>Nama Penyakit <i class="fa fa-sort"></i></th>
									<th>Info <i class="fa fa-sort"></i></th>
									<th>Solusi <i class="fa fa-sort"></i></th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach($penyakit as $b => $row) { ?>
									<tr>
										<td><?= $i++ ?></td>
										<td>
											<a href="" id="ubah" data-toggle="modal" data-target="#edit"
													data-id = "<?= $row['id_penyakit'] ?>"
													data-nama_penyakit = "<?= $row['nama_penyakit'] ?>"
													data-info_penyakit = "<?= $row['info'] ?>"
													data-solusi_penyakit = "<?= $row['solusi'] ?>"
											><?= $row['nama_penyakit'] ?></a>
										</td>
										<td><?= $row['info'] ?></td>
										<td><?= $row['solusi'] ?></td>
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
            <h4 class="modal-tittle">Tambah Data Penyakit</h4>
          </div>
          <form action="crud_penyakit" method="post" enctype="multipart/form-data">
            <div class="modal-body">
							<div class="form-group">
								<label class="control-label" for="id_penyakit">ID</label>
								<input type="text" name="id_penyakit" class="form-control" id="id_penyakit">
							</div>
							<div class="form-group">
								<label class="control-label" for="nama">Nama Penyakit</label>
								<input type="text" name="nama_penyakit" class="form-control" id="nama">
							</div>
							<div class="form-group">
								<label class="control-label" for="info">Info Penyakit</label>
								<textarea class="form-control" rows="6" name="info_penyakit" class="form-control" id="info"></textarea>
							</div>
							<div class="form-group">
								<label class="control-label" for="solusi">Solusi Penyakit</label>
								<textarea class="form-control" rows="6" name="solusi_penyakit" class="form-control" id="solusi"></textarea>
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

		<div id="edit" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-tittle">Ubah Data Penyakit</h4>
          </div>
          <form action="Data/crud_penyakit" method="post" enctype="multipart/form-data">
            <div class="modal-body">
							<div class="form-group">
								<label class="control-label" for="id_edit">ID</label>
								<input type="text" name="id_penyakit" class="form-control" id="id_edit">
							</div>
							<div class="form-group">
								<label class="control-label" for="nama_edit">Nama Penyakit</label>
								<input type="text" name="nama_penyakit" class="form-control" id="nama_edit">
							</div>
							<div class="form-group">
								<label class="control-label" for="info_edit">Info Penyakit</label>
								<!-- <input type="text" name="nama_penyakit" class="form-control" id="info_edit"> -->
								<textarea class="form-control" rows="6" name="info_penyakit" class="form-control" id="info_edit"></textarea>
							</div>
							<div class="form-group">
								<label class="control-label" for="solusi_edit">Solusi Penyakit</label>
								<textarea class="form-control" rows="6" name="solusi_penyakit" class="form-control" id="solusi_edit"></textarea>
							</div>
						</div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger">Reset</button>
              <input type="submit" class="btn btn-success" name="ubah" value="Simpan">
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

		$(document).on("click", "#ubah", function () {
			var id = $(this).data('id');
			var namaPenyakit = $(this).data('nama_penyakit');
			var info = $(this).data('info_penyakit');
			var solusi = $(this).data('solusi_penyakit');

			console.log(info)
			$(".modal-body #id_edit").val(id);
			$(".modal-body #nama_edit").val(namaPenyakit);
			$(".modal-body #info_edit").val(info);
			$(".modal-body #solusi_edit").val(solusi);
  	});
  </script>
</body>

</html>
