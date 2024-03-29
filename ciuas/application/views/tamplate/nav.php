<!-- WRAPPER -->
<div id="wrapper">
	<!-- NAVBAR -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="brand">
			<img src="<?php echo base_url('assets/img/polinema.png'); ?>"style="width:2rem; margin-right:1rem"><a href="#"><b>Pendaftaran Unit Kegiatan Mahasiswa </b></a>
		</div>
		<div class="container-fluid">
			<div class="navbar-btn">
				<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
			</div>

			<div id="navbar-menu">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('login/signout'); ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- LEFT SIDEBAR -->
	<div id="sidebar-nav" class="sidebar">
		<div class="sidebar-scroll">
			<nav>
				<ul class="nav">
					<?php if ($this->session->userdata('role') == 1) { ?>
						<li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-home fa-lg"></i> <span>Dashboard</span></a></li>
						<li><a href="<?php echo site_url('admin/mahasiswa'); ?>"><i class="fa fa-users fa-lg"></i> <span>Data Mahasiiswa</span></a></li>
						<li><a href="<?php echo site_url('admin/pengguna'); ?>"><i class="fa fa-user fa-lg"></i> <span>Data Pengguna</span></a></li>
						<li><a href="<?php echo site_url('admin/ukm'); ?>"><i class="fa fa-tags fa-lg"></i><span>Data UKM</span></a></li>
						<li><a href="<?php echo site_url('admin/galeri'); ?>"><i class="fa fa-image fa-lg"></i><span>Galeri UKM</span></a></li>
					<?php } else { ?>
						<li><a href="<?php echo site_url('user/register'); ?>"><i class="fa fa-list fa-lg"></i><span>Registrasi UKM</span></a></li>
						<li><a href="<?php echo site_url('user/galeri'); ?>"><i class="fa fa-image fa-lg"></i><span>Galeri UKM</span></a></li>
					<?php } ?>
				</ul>
			</nav>
		</div>
	</div>
	<!-- END LEFT SIDEBAR -->