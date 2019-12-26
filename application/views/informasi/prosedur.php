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
							<div class="faq-wrap mt-0 pt-0 px-0">
								<div class="title-wrap">
									<h2 class="h1">Prosedur <span class="theme-color">Layanan Umum</span></h2>
								</div>
								<div id="tab-content" class="tab-content mt-sm-1">
									<div id="tab-A" class="tab-pane fade show active" role="tabpanel">
										<div id="faqAccordion1" class="faq-accordion" data-children=".faq-item">
										<?php $no=1; $a='A'; foreach ($data as $d): ?>
											<div class="faq-item">
												<a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem<?=$no?>" aria-expanded="false"><span><?=$a?>.</span><span><?=$d['judul_layanan']?></span></a>
												<div id="faqItem<?=$no?>" class="collapse <?= ($no=='1') ? 'show' : '' ?> faq-item-content" role="tabpanel">
													<div>
														<?=$d['deskripsi_layanan']?>
													</div>
												</div>
											</div>
										<?php $no++; $a++; endforeach ?>

											
											<!-- <div class="faq-item">
												<a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem2" aria-expanded="false" class="collapsed"><span>2.</span><span>Why are regular dental assessments so important?</span></a>
												<div id="faqItem2" class="collapse faq-item-content" role="tabpanel">
													<div>
														<p>
															Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
														</p>
													</div>
												</div>
											</div> -->
											<!-- <div class="faq-item">
												<a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem3" aria-expanded="false" class="collapsed"><span>3.</span><span>How do I know if my teeth are healthy?</span></a>
												<div id="faqItem3" class="collapse faq-item-content" role="tabpanel">
													<div>
														<p>
															Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
														</p>
													</div>
												</div>
											</div>
											<div class="faq-item">
												<a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem4" aria-expanded="false" class="collapsed"><span>4.</span><span>How can I improve my oral hygiene?</span></a>
												<div id="faqItem4" class="collapse faq-item-content" role="tabpanel">
													<div>
														<p>
															Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
														</p>
													</div>
												</div>
											</div> -->
										</div>
									</div>
									<!-- <div id="tab-B" class="tab-pane fade" role="tabpanel">
										<div id="faqAccordion2" class="faq-accordion" data-children=".faq-item">
											<div class="faq-item">
												<a data-toggle="collapse" data-parent="#faqAccordion2" href="#faqItem21" aria-expanded="true"><span>1.</span><span>How can I improve my oral hygiene?</span></a>
												<div id="faqItem21" class="collapse show faq-item-content" role="tabpanel">
													<div>
														<p>
															Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
														</p>
													</div>
												</div>
											</div>
											<div class="faq-item">
												<a data-toggle="collapse" data-parent="#faqAccordion2" href="#faqItem22" aria-expanded="false" class="collapsed"><span>2.</span><span>How do I know if my teeth are healthy?</span></a>
												<div id="faqItem22" class="collapse faq-item-content" role="tabpanel">
													<div>
														<p>
															Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
														</p>
													</div>
												</div>
											</div>
											<div class="faq-item">
												<a data-toggle="collapse" data-parent="#faqAccordion2" href="#faqItem23" aria-expanded="false" class="collapsed"><span>3.</span>Why are regular dental assessments so important?</a>
												<div id="faqItem23" class="collapse faq-item-content" role="tabpanel">
													<div>
														<p>
															Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
														</p>
													</div>
												</div>
											</div>
											<div class="faq-item">
												<a data-toggle="collapse" data-parent="#faqAccordion2" href="#faqItem24" aria-expanded="false" class="collapsed"><span>4.</span><span>How often 1 should I visit my dentist?</span></a>
												<div id="faqItem24" class="collapse faq-item-content" role="tabpanel">
													<div>
														<p>
															Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
														</p>
													</div>
												</div>
											</div>
										</div>
									</div> -->
								</div>
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