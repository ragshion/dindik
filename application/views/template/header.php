<?php $page = strtolower($this->uri->segment(1)); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="Website Dinas Pendidikan dan Kebudayaan Kab.Pekalongan">
	<meta name="author" content="Abdur Rozaq, WA : 0857 4188 0658">
	<meta name="format-detection" content="telephone=no">
	<title>Dinas Pendidikan dan Kebudayaan Kab. Pekalongan</title>
	<!-- Stylesheets -->

	<link href="<?=base_url('assets/')?>vendor/slick/slick.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>vendor/animate/animate.min.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>icons/style.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.15.1/dist/sweetalert2.min.css">
	<link href="<?=base_url('assets/')?>css/style.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>vendor/zmdi/css/material-design-iconic-font.min.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>vendor/fontawesome-pro/css/all.min.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>vendor/photoswipe/photoswipe.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>vendor/photoswipe/default-skin/default-skin.css" rel="stylesheet">




	<style type="text/css">
		.ajax-load{
            padding: 5px 0px;
            width: 100%;
        }

        body{
        	table-layout: fixed !important;
        }

        #image-gallery .modal-footer{
		  display: block;
		}

		.thumb{
		  margin-top: 15px;
		  margin-bottom: 15px;
		}
	</style>

	<!--Favicon-->
	<link rel="icon" href="<?=base_url('assets/')?>images/favicon.png" type="image/x-icon">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
	<!-- Google map -->
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpTTVmx8QPO3XDiOR_Jy0dNAnTeCwDN_c"></script> -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpTTVmx8QPO3XDiOR_Jy0dNAnTeCwDN_c&v=3.exp&signed_in=true&libraries=places"></script>
</head>

<body class="shop-page">
	<!--header-->
	<header class="header">
		<div class="header-quickLinks js-header-quickLinks d-lg-none">
			<div class="quickLinks-top js-quickLinks-top"></div>
			<div class="js-quickLinks-wrap-m">
			</div>
		</div>
		<div class="header-topline d-none d-lg-flex">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-auto d-flex align-items-center">
						<div class="header-info"><i class="icon-calendar2"></i><?=tanggal_indo(date('Y-m-d'))?></div>
						<div class="header-phone"><i class="icon-telephone"></i>(0285) 382037</div>
						<div class="header-info"><i class="icon-placeholder2"></i>Kajen</div>
						<div class="header-info"><i class="icon-black-envelope"></i><a href="mailto:info@dentco.net">dindikbud@pekalongankab.go.id</a></div>
					</div>
					<div class="col-auto ml-auto d-flex align-items-center">
						<span class="header-social">
							<a href="#" class="hovicon"><i class="icon-facebook-logo-circle"></i></a>
							<a href="#" class="hovicon"><i class="icon-twitter-logo-circle"></i></a>
							<a href="#" class="hovicon"><i class="icon-instagram-circle"></i></a>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="header-content">
			<div class="container">
				<div class="row align-items-lg-center">
					<button class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarNavDropdown">
						<span class="icon-menu"></span>
					</button>
					<div class="col-lg-auto col-lg-2 d-flex align-items-lg-center">
						<a href="<?=base_url()?>" class="header-logo"><img src="<?=base_url('assets/')?>images/logo.png" alt="" class="img-fluid"></a>
					</div>
					<div class="col-lg ml-auto header-nav-wrap">
						<div class="header-nav js-header-nav">
							<nav class="navbar navbar-expand-lg btco-hover-menu">
								<div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
									<ul class="navbar-nav">
										<li class="nav-item <?= ($page=='') ? 'active' : '' ?>">
											<a class="nav-link" href="<?=base_url()?>"><i class="fas fa-home"></i> Beranda</a>
										</li>
										<li class="nav-item <?= ($page=='profil') ? 'active' : '' ?>">
											<a href="services.html" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-building"></i> Profil</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="<?=base_url('profil/sambutan')?>">Sambutan</a></li>
												<!-- <li><a class="dropdown-item" href="service-page.html">Visi Misi</a></li> -->
												<li><a class="dropdown-item" href="<?=base_url('profil/struktur_organisasi')?>">Struktur Organisasi</a></li>
											</ul>
										</li>
										<li class="nav-item <?= ($page=='berita') ? 'active' : '' ?>">
											<a href="javascript:;" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-newspaper"></i> Berita</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="<?=base_url('berita/kategori/?k=semua')?>">Semua</a></li>
												<li><a class="dropdown-item" href="<?=base_url('berita/kategori/?k=sekretariat')?>">Sekretariat</a></li>
												<li><a class="dropdown-item" href="<?=base_url('berita/kategori/?k=bidang paud')?>">Bidang PAUD</a></li>
												<li><a class="dropdown-item" href="<?=base_url('berita/kategori/?k=bidang dikdas')?>">Bidang Dikdas</a></li>
												<li><a class="dropdown-item" href="<?=base_url('berita/kategori/?k=bidang sarpras')?>">Bidang Sarpras</a></li>
												<li><a class="dropdown-item" href="<?=base_url('berita/kategori/?k=bidang kebudayaan')?>">Bidang Kebudayaan</a></li>
											</ul>
										</li>
										<li class="nav-item">
											<a href="https://www.ult.lpmpjateng.go.id/masuk_user" target="_blank" class="nav-link"><i class="fas fa-users-cog"></i> Layanan</a>
											<!-- <ul class="dropdown-menu">
												<li><a class="dropdown-item" href="our-specialist.html">Umum</a></li>
												<li><a class="dropdown-item" href="gallery-simple.html">Bidang PAUD</a></li>
												<li><a class="dropdown-item" href="gallery-simple.html">Bidang Dikdas</a></li>
												<li><a class="dropdown-item" href="gallery-simple.html">Bidang Sarpras</a></li>
												<li><a class="dropdown-item" href="gallery-simple.html">Bidang Kebudayaan</a></li>
											</ul> -->
										</li>
										<li  class="nav-item <?= ($page=='informasi') ? 'active' : '' ?>">
											<a href="blog.html" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-info-circle"></i> Informasi Publik</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="<?=base_url('informasi/renstra')?>">Renstra</a></li>
												<li><a class="dropdown-item" href="<?=base_url('informasi/lkpj')?>">LKPJ</a></li>
												<li><a class="dropdown-item" href="<?=base_url('informasi/layanan_umum')?>">Prosedur Layanan</a></li>
											</ul>
										</li>
										<li class="nav-item <?= ($page=='media') ? 'active' : '' ?>">
											<a href="javascript:;" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-cloud-download-alt"></i> Media</a>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="<?=base_url('media/download')?>">Download</a></li>
												<li><a class="dropdown-item" href="<?=base_url('media/galeri')?>">Album/ Galeri</a></li>
											</ul>
										</li>
										<li class="nav-item <?= ($page=='kontak') ? 'active' : '' ?>">
											<a class="nav-link" href="<?=base_url('kontak')?>"><i class="fas fa-address-card"></i> Kontak</a>
										</li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--//header-->