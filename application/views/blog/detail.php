	<div class="page-content animated fadeIn">
		<!--section-->
		<div class="section mt-0">
			<div class="breadcrumbs-wrap">
				<div class="container">
					<div class="breadcrumbs">
						<a style="color: #1e76bd !important" href="<?=base_url()?>">Beranda</a>
						<span class="theme-color"><?=$breadcumbs?></span>
					</div>
				</div>
			</div>

		</div>
		<!--//section-->
		<!--section-->
		<div class="section page-content-first">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 aside">
						<div class="blog-posts" id="blog-posts">
							<div class="blog-post">
								<div class="blog-post-info">
									<div>
										<h2 class="post-title"><a href="<?=base_url('berita/detail/').$p['link']?>"><?=$p['judul']?></a></h2>
										<div class="post-meta">
											<div class="post-meta-author"><i class="fa fa-user"></i> <?=$p['nama_bidang']?> |</div>
											<div class="post-meta-social">
												<i class="icon icon-calendar"></i><?=tanggal_indo(date('Y-m-d', strtotime($p['tanggal']))).', '.date('H.i',strtotime($p['tanggal'])).' WIB'?>
											</div>
										</div>
									</div>
								</div>
								<div class="post-image">
									<?php if (count($p['thumbnail']) > 1) { ?>
										<div class="slider-gallery post-carousel js-post-carousel">
											<?php foreach ($p['thumbnail'] as $t): ?>
												<a href="<?=base_url('assets/images/posts/'.$t['nama_file'])?>"><img src="<?=base_url('assets/images/posts/'.$t['nama_file'])?>" alt=""></a>	
											<?php endforeach ?>
										</div>
									<?php } else { ?>
										<?php foreach ($p['thumbnail'] as $t): ?>
											<a href="<?=base_url('assets/images/posts/'.$t['nama_file'])?>"><img src="<?=base_url('assets/images/posts/'.$t['nama_file'])?>" alt=""></a>
										<?php endforeach ?>
									<?php } ?>
								</div>
								<div class="post-text mt-2"><?=$p['isi']?></div>
								<?php if (count($p['attachment']) > 0): ?>
								<div class="row">
									<div class="col-12">
										<p class="mb-0">Attachments :</p>
										<ol>
											<?php foreach ($p['attachment'] as $a): ?>
												<li><a href="<?=base_url('assets/attachment/').$a['nama_file']?>"><?=$a['nama_file']?></a></li>
											<?php endforeach ?>
										</ol>
									</div>
								</div>	
								<?php endif ?>
								<ul class="tags-list">
									<p class="mb-0">Tags :</p>
									<?php $x = explode(";", $p['tags']) ?>
									<?php foreach ($x as $d): ?>
										<li><a href="<?=base_url('berita/tags?t=').$d?>"><?=$d?></a></li>
									<?php endforeach ?>
									<!-- <li><a href="#">Dental Implants</a></li>
									<li><a href="#">Orthodontics</a></li> -->
								</ul>
							</div>
						</div>
						<div class="clearfix mt-4"></div>
						
					</div>
					<div class="col-lg-3 aside-left mt-5 mt-lg-0">
						<div class="side-block">
							<form action="<?=base_url('berita/pencarian')?>" method="GET" class="content-search d-flex">
								<div class="input-wrap">
									<input type="text" class="form-control" placeholder="Pencarian" name="s">
								</div>
								<button type="submit"><i class="icon-search"></i></button>
							</form>
						</div>
						<div class="side-block">
							<h3 class="side-block-title">Berita Terpopuler</h3>
							<?php 
								$data = $this->db->select('bidang.*, posts.*')
										->from('posts')
										->join('bidang','bidang.id=posts.id_bidang')
										->where('status','1')
										->order_by('hit_count','desc')
										->order_by('tanggal','desc')
										->limit(3)
										->get()->result_array();
								$z = 0;
							    while ($z < count($data)) {
						      		$resp = $this->db->where('id_post',$data[$z]['id'])->limit(1)->get('thumbnail')->row_array();

						      		$data[$z]['thumbnail'] = $resp['nama_file'];

						        	$z += 1;
							    }
							?>
							<?php foreach ($data as $d): ?>
							<div class="blog-post post-preview">
								<div class="post-image">
									<a href="blog-post-page.html">
										<a href="<?=base_url('berita/detail/').$d['link']?>"><img src="<?=base_url('assets/images/posts/'.$d['thumbnail'])?>" alt=""></a>
									</a>
								</div>
								<div>
									<h4 class="post-title"><a href="<?=base_url('berita/detail/').$d['link']?>"><?=$d['judul']?></a></h4>
									<div class="post-meta">
										<div class="post-meta-author text-nowrap"><i><?=$d['nama_bidang']?></i></div>
										<div class="post-meta-date text-nowrap"><i class="icon icon-clock3"></i><?=tanggal_indo(date('Y-m-d', strtotime($d['tanggal'])))?></div>
									</div>
								</div>
							</div>
							<?php endforeach ?>
						</div>
						<div class="side-block">
							<h3 class="side-block-title">Tags</h3>
							<ul class="tags-list">
							<?php $tag = $this->db->get('tags')->result_array(); ?>
							<?php foreach ($tag as $t): ?>
								<li><a href="<?=base_url('berita/tags?t=').$t['tags']?>"><?=$t['tags']?></a></li>
							<?php endforeach ?>
							</ul>
						</div>
						<script type="text/javascript" src=//widget.kominfo.go.id/gpr-widget-kominfo.min.js></script>
						<div class="side-block d-sm-none d-md-block" style="display:block; width:100%; float:right;  max-height: 400px; overflow: auto;">
							<div id="gpr-kominfo-widget-container"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--//section-->
	</div>