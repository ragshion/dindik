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
		<div class="section page-content-first mt-4">
			<div class="container">
				<div class="text-center mb-2  mb-md-3 mb-lg-4">
					<div class="h-sub theme-color">Gallery</div>
					<div class="h-decor"></div>
				</div>
			</div>
			<div class="container">
				<div class="text-center mb-3 mb-md-4 max-900">
					<p>We love to see our patients smile! Here are some of our best before-and-after pictures,<br>all in one fantastic Smile Gallery</p>
				</div>
				<div class="row">
					<div class="row">
					<?php $data = $this->db->get('galeri')->result_array(); ?>
					<?php foreach ($data as $d): ?>
						<div class="col-lg-3 col-md-4 col-xs-6 thumb waves-effect">
			                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
			                   data-image="<?=base_url('assets/images/galeri/').$d['nama_foto']?>"
			                   data-target="#image-gallery">
			                    <img class="img-thumbnail"
			                         src="<?=base_url('assets/images/galeri/').$d['nama_foto']?>"
			                         alt="Another alt text">
			                </a>
			            </div>
					<?php endforeach ?>
						<!-- <div class="col-lg-3 col-md-4 col-xs-6 thumb">
			                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
			                   data-image="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
			                   data-target="#image-gallery">
			                    <img class="img-thumbnail"
			                         src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
			                         alt="Another alt text">
			                </a>
			            </div> -->
			        </div>
			        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			            <div class="modal-dialog modal-lg">
			                <div class="modal-content">
			                    <div class="modal-header">
			                        <h4 class="modal-title" id="image-gallery-title"></h4>
			                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
			                        </button>
			                    </div>
			                    <div class="modal-body">
			                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
			                    </div>
			                    <div class="modal-footer">
			                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
			                        </button>

			                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
			                        </button>
			                    </div>
			                </div>
			            </div>
			        </div>
				</div>
				<div class="clearfix mb-4"></div>
			</div>
		</div>
	</div>