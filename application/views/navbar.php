<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo base_url('Welcome');?>">Lambung</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav side-nav">
			<li id="beranda"><a href="<?php echo base_url('Welcome');?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
			<li id="diagnosa"><a href="<?php echo base_url('Diagnosa');?>"><i class="fa fa-table"></i> Diagnosa</a></li>
			<li id="drop" class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Data <b
						class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url('Data');?>">Data Penyakit</a></li>
					<li><a href="<?php echo base_url('Data/gejala');?>">Data Gejala</a></li>
					<li><a href="<?php echo base_url('Data/rule');?>">Data Rule</a></li>
					<li><a href="<?php echo base_url('Data/pasien');?>">Data Pasien</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-right navbar-user">
			<li class="dropdown user-dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Petugas Kesehatan <b
						class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
					<!-- <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li> -->
					<li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
					<li class="divider"></li>
					<li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
				</ul>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>
