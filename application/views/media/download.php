	<div class="page-content">
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
						<div class="blog-posts animated fadeIn" id="blog-posts">
							<div class="container">
								<div class="text-center mb-2  mb-md-3 mb-lg-4">
									<div class="h-sub theme-color">Download Data <br>Dinas Pendidikan dan Kebudayaan Kabupaten Pekalongan</div>
									<div class="h-decor"></div>
								</div>
							</div>
							<div class="table-responsive">
						        <table id="example" class="table table-hover dt-responsive display nowrap" cellspacing="0">
						            <thead>
						            <tr>
						                <th>Nomor</th>
						                <th>Keterangan</th>
						                <th>Tanggal Upload</th>
						                <!-- <th>Nama File</th> -->
						                <th>Jumlah Unduhan</th>
						                <th>Aksi</th>
						            </tr>
						            </thead>
						            <tbody>
						            	<?php $no = 1; foreach ($data as $d): ?>
						            		<tr>
						            			<td><?=$no?></td>
						            			<td><?=nl2br($d['keterangan'])?></td>
						            			<td><?=tanggal_indo(date('Y-m-d', strtotime($d['tgl_input']))).', '.date('H.i', strtotime($d['tgl_input'])).' WIB'?></td>
						            			<!-- <td><?=$d['nama_unduhan']?></td> -->
						            			<td><?=$d['hit_count']?></td>
						            			<td><a download="" href="<?=base_url('assets/download/').$d['nama_unduhan']?>" class="btn btn-xs btn-gradient" onclick="tambah_dl('<?=$d['id']?>')"><i class="far fa-cloud-download"></i> Download</a></td>
						            		</tr>
						            	<?php $no++; endforeach ?>
						            </tbody>
						        </table>
					        </div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-lg-3 aside-left mt-5 mt-lg-0">
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
										<a href="#"><img src="<?=base_url('assets/images/posts/'.$d['thumbnail'])?>" alt=""></a>
									</a>
								</div>
								<div>
									<h4 class="post-title"><a href="blog-post-page.html"><?=$d['judul']?></a></h4>
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