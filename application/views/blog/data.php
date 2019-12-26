<?php foreach ($post as $p): ?>
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
						<a href="<?=base_url('berita/detail/').$p['link']?>"><img src="<?=base_url('assets/images/posts/'.$t['nama_file'])?>" alt=""></a>	
					<?php endforeach ?>
				</div>
			<?php } else { ?>
				<?php foreach ($p['thumbnail'] as $t): ?>
					<a href="<?=base_url('berita/detail/').$p['link']?>"><img src="<?=base_url('assets/images/posts/'.$t['nama_file'])?>" alt=""></a>
				<?php endforeach ?>
			<?php } ?>
		</div>
		<div class="post-teaser mt-2"><?=$p['readmore']?>[…]</div>
		<div class="mt-1 mt-lg-2"><a href="<?=base_url('berita/detail/').$p['link']?>" class="btn btn-sm btn-hover-fill"><i class="icon-right-arrow"></i><span>Baca Semua</span><i class="icon-right-arrow"></i></a></div>
	</div>
<?php endforeach ?>
