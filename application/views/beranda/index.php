
	<div class="page-content">
		<!--section slider-->
		<div class="section mt-0">
			<div id="mainSliderWrapper">
				<div class="loading-content">
					<div class="inner-circles-loader"></div>
				</div>
				<div class="main-slider mb-0 arrows-white arrows-bottom" id="mainSlider" data-slick='{"arrows": false, "dots": true}'>
				<?php foreach ($carousel as $c): ?>
					<div class="slide">
						<div class="img--holder" data-bg="<?=base_url('assets/images/carousel/').$c['foto']?>"></div>
						<div class="slide-content center">
							<div class="vert-wrap container">
								<div class="vert">
									<div class="container">
										<div class="slide-txt1" data-animation="fadeInDown" data-animation-delay="1s">
											<?=$c['keterangan']?>
										</div>
										<div class="slide-btn">
											<a target="_blank" href="<?=$c['link']?>" class="btn btn-white" data-animation="fadeInUp" data-animation-delay="2s"><i class="icon-right-arrow"></i><span>Buka</span><i class="icon-right-arrow"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
				</div>
			</div>
		</div>
		<!--//section slider-->
		<!--section welcome-->
		<div class="section mt-4 mb-0">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 d-none d-lg-block text-center">
						<img src="<?=base_url('assets/')?>images/kadindikbud.jpg" alt="" class="img-fluid">
					</div>
					<div class="col-lg-6">
						<div class="title-wrap text-center text-lg-left mt-15 d-none d-md-block">
							<!-- <div class="h-sub">Selamat Datang di Website DINDIKBUD Kab. Pekalongan</div> -->
							<h2 class="h1"><span class="theme-color">Hj. Sumarwati, S.Pd., MAP</span></h2>
							<div class="h-sub">Kepala Dinas Pendidikan dan Kebudayaan Kab. Pekalongan</div>
						</div>
						<div class="row">
							<div class="d-lg-none col-8 col-sm-6 col-lg-5 mx-auto"><img src="<?=base_url('assets/')?>images/kadindikbud.jpg" alt="" class="img-fluid"></div>
							<div class="col-sm">
								<div class="title-wrap text-center text-lg-left mt-3 mt-sm-0 d-md-none">
									<div class="h-sub">Selamat Datang di Website DINDIKBUD Kab. Pekalongan</div>
									<h2 class="h1">Meet <span class="theme-color">Dr. Anderson</span></h2>
								</div>
								<div class="text-left mt-3 mt-sm-0">
									<p class="p-lg">Semoga Website Dinas Pendidikan dan Kebudayaan Kabupaten Pekalongan ini dapat meningkatkan layanan pendidikan kepada siswa, orangtua, dan masyarakat.</p>
									<div class="mt-0 mt-lg-15 mt-xl-3"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--//section welcome-->
		<!--section under slider-->
		<div class="section mt-2 shadow-bot pt-2 pb-0 py-sm-4 mb-4">
			<div class="container">
				<div class="row js-icn-text-alt-carousel">
					<?php foreach ($bidang as $b): ?>
						<div class="col-md-6 col-lg-4 col-sm-12 col-xs-12">
							<div class="icn-text-alt">
								<div class="icn-text-alt-icn"><i class="icon-first-aid-kit"></i></div>
								<div>
									<h4 class="icn-text-alt-title"><?=$b['nama_bidang']?></h4>
									<p><?=$b['keterangan']?></p>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<!--//section under slider-->
		<!--section services-->
		<div class="section mt-4 mb-4">
			<div class="container-fluid px-0">
				<div class="title-wrap text-center">
					<div class="h-sub theme-color">Website/ Aplikasi</div>
					<h2 class="h1">Dinas Pendidikan dan Kebudayaan Kab. Pekalongan</h2>
					<div class="h-decor"></div>
				</div>
				<div class="row no-gutters services-box-wrap services-box-wrap-desktop">
				<?php foreach ($aplikasi as $a): ?>
					<div class="col-4">
						<div class="service-box service-box-greybg service-box--hiddenbtn">
							<div class="service-box-caption text-center">
								<div class="service-box-icon"><img height="100" src="<?=base_url('assets/images/aplikasi/').$a['foto']?>"></div>
								<div class="service-box-icon-bg"><img height="250" src="<?=base_url('assets/images/aplikasi/').$a['foto']?>"></div>
								<h3 class="service-box-title"><?=$a['nama_aplikasi']?></h3>
								<p><?=$a['keterangan']?></p>
								<div class="btn-wrap"><a href="<?=$a['link_aplikasi']?>" target="_blank" class="btn"><i class="icon-right-arrow"></i><span>Buka</span><i class="icon-right-arrow"></i></a></div>
							</div>
						</div>
					</div>
				<?php endforeach ?>					
				</div>
				<div class="row no-gutters services-box-wrap services-box-wrap-mobile">
					<div class="service-box-rotator js-service-box-rotator">
					<?php foreach ($aplikasi as $a): ?>
						<div class="service-box service-box-greybg service-box--hiddenbtn" onclick="window.open('<?=$a['link_aplikasi']?>','_blank');">
							<div class="service-box-caption text-center">
								<div class="service-box-icon"><img src="<?=base_url('assets/images/aplikasi/').$a['foto']?>"></div>
								<div class="service-box-icon-bg"><img src="<?=base_url('assets/images/aplikasi/').$a['foto']?>"></i></div>
								<h3 class="service-box-title"><?=$a['nama_aplikasi']?></h3>
								<p>The general surgical team encompasses a full range of emergency and elective inpatient and day case surgery</p>
								<div class="btn-wrap"><a href="<?=$a['link_aplikasi']?>" target="_blank" class="btn"><i class="icon-right-arrow"></i><span>Buka</span><i class="icon-right-arrow"></i></a></div>
							</div>
						</div>
					<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
		<!--//section services-->
		<!--section-->
		<div class="section mt-4 mb-4 bg-grey">
			<div class="container">
				<div class="title-wrap text-center">
					<h2 class="h1">Visi Misi</h2>
					<div class="h-decor"></div>
				</div>
				<div class="row js-icn-carousel icn-carousel flex-column flex-sm-row text-center text-sm-left" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}]}'>
					<div class="col-md">
						<div class="icn-text">
							<div class="icn-text-circle pt-2"><i class="fas fa-eye fa-2x"></i></div>
							<div>
								<h5 class="icn-text-title">Visi</h5>
								<p>Terwujudnya Pendidikan yang Bermutu, Berkeadilan, Berkarakter dan Berbudaya</p>
							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="icn-text">
							<div class="icn-text-circle pt-2"><i class="fas fa-bullseye fa-2x"></i></div>
							<div>
								<h5 class="icn-text-title">Misi</h5>
								<p>
									1.  Meningkatkan Layanan Pendidikan yang Merata dan Bermutu.<br>
									2. Mewujudkan Pendidikan yang Berkarakter dan Berbudaya.<br/>
									3. Meningkatkan Mutu Tata Kelola Penyelenggaraan Pendidikan.<br/>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--//section-->
		<!--section blog posts -->
		<div class="section mt-4 mb-4">
			<div class="container">
				<div class="title-wrap text-center">
					<h2 class="h1">Berita Terbaru</h2>
					<div class="h-decor"></div>
				</div>
				<div class="blog-grid-full blog-grid-carousel-full js-blog-grid-carousel-full mt-3 mb-0 row">
				<?php foreach ($terbaru as $t): ?>
					<div class="col-md-6 col-lg-4">
						<div class="blog-post">
							<!-- <div class="post-image">
								<a href="blog-post-page.html"><img src="<?=base_url('assets/')?>images/content/news-01.jpg" alt=""></a>
							</div> -->
							<div class="post-image">
								<?php if (count($t['thumbnail']) > 1) { ?>
									<div class="slider-gallery post-carousel js-post-carousel">
										<?php foreach ($t['thumbnail'] as $x): ?>
											<a href="<?=base_url('berita/detail/').$t['link']?>"><img height="207" src="<?=base_url('assets/images/posts/'.$x['nama_file'])?>" alt=""></a>	
										<?php endforeach ?>
									</div>
								<?php } else { ?>
									<?php foreach ($t['thumbnail'] as $x): ?>
										<a href="<?=base_url('berita/detail/').$t['link']?>"><img height="207" src="<?=base_url('assets/images/posts/'.$x['nama_file'])?>" alt=""></a>
									<?php endforeach ?>
								<?php } ?>
							</div>
							<div class="blog-post-info">
								<div>
									<h2 class="post-title"><a href="<?=base_url('berita/detail/').$t['link']?>"><?=$t['judul']?></a></h2>
									<small><i class="icon icon-calendar"></i> <?=tanggal_indo(date('Y-m-d', strtotime($t['tanggal']))).', '.date('H.i',strtotime($t['tanggal'])).' WIB'?></small>
								</div>
							</div>
							<div class="post-teaser mt-1"><?=$t['readmore']?>...</div>
							<div class="mt-2"><a href="<?=base_url('berita/detail/').$t['link']?>" class="btn btn-sm btn-hover-fill"><i class="icon-right-arrow"></i><span>Read more</span><i class="icon-right-arrow"></i></a></div>
						</div>
					</div>
				<?php endforeach ?>
				</div>
			</div>
		</div>
		<!--//section blog posts -->
	</div>