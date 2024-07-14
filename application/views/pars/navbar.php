<style>
	#header {
		background-color: #fff;
		height: auto;
	}
	#sub-header {
		position: absolute;
		width: 100%;
		background-color: #fff;
		top: 3.7em;
	}
	.sub-navbar {
		z-index: 2;
	}
	.sub-navbar li {
		margin-right: 1em;
		list-style-type: none;
	}
	.sub-navbar a {
		transition: all 0.3s;
		color: #000;
		font-weight: 700;
	}
	.sub-navbar a:hover,
	.sub-navbar a.active {
		color: #ff7f00;
		font-weight: 700;
	}
	.dropdown-menu a:hover,
	.dropdown-menu a.active {
		background: #ff7f00;
		color: #fff;
	}
	.search {
		padding: 8px 18px;
		border-radius: 17px;
		width: 50%;
		border: 2px solid #dee2e6;
	}
</style>
<header id="header" class="fixed">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1 p-0">
				<div class="logo p-2">
					<a href="<?= site_url('') ?>"><img src="<?= base_url() ?>assets/img/logo.jpg" alt="" class="img-fluid w-100"></a>
				</div>
			</div>
			<div class="col-md-11">
				<div class="row mt-3">
					<div class="col-md-6 offset-md-6 text-center">
						<input type="text" class="search form-control" placeholder="Search..">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-6">
						<nav id="navbar" class="navbar sub-navbar" style="line-height: 1">
							<li><a class="nav-item <?= $active == 'surat_masuk' ? 'active' : '' ?>" href="<?= site_url('surat_masuk') ?>">Surat Masuk</a></li>
							<li><a class="nav-item <?= $active == 'surat_keluar' ? 'active' : '' ?>" href="<?= site_url('surat_keluar') ?>">Surat Keluar</a></li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Kategori Surat
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item <?= $active == 'kategori_surat_masuk' ? 'active' : '' ?>" href="<?= site_url('kategori/kategori_surat_masuk') ?>">Surat Masuk</a>
									<a class="dropdown-item <?= $active == 'kategori_surat_keluar' ? 'active' : '' ?>" href="<?= site_url('kategori/kategori_surat_keluar') ?>">Surat Keluar</a>
								</div>
							</li>
							<li><a class="nav-item <?= $active == 'pelaporan' ? 'active' : '' ?>" href="<?= site_url('pelaporan') ?>">Pelaporan</a></li>
						</nav>
					</div>
					<div class="col-md-6">
						<ul class="text-right" style="list-style-type: none;">
							<?php if ($this->session->userdata('ses_daily_akses') != null) : ?>
								<li class="mr-4 text-dark text-capitalize">Welcome <?= $this->session->userdata('ses_daily_level')?>,  
								<a class="text-danger font-weight-bold" href="<?= site_url('login/logout') ?>" id="btn-login"><i class="icofont-exit"></i> Logout</a>
							</li>
							<?php endif ?>
							<?php if ($this->session->userdata('ses_daily_akses') == null) : ?>
								<li><a class="text-uppercase text-dark font-weight-bold" href="<?= base_url('login') ?>" id="btn-login">Login</a></li>
							<?php endif ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
	