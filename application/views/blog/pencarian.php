	<div class="page-content animated fadeIn">
		<!--section-->
		<div class="section mt-0">
			<div class="breadcrumbs-wrap">
				<div class="container">
					<div class="breadcrumbs">
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
							<?php $this->load->view('blog/data',$post) ?>
						</div>
						<div class="clearfix mb-4"></div>
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
									<a href="<?=base_url('berita/detail/').$d['link']?>">
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
					</div>
				</div>
			</div>
		</div>
		<!--//section-->
	</div>