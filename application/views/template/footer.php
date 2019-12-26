
	<!--footer-->
	<div class="footer mt-0">
		<div class="container">
			<div class="row py-1 py-md-2 px-lg-0">
				<div class="col-lg-4 footer-col1">
					<div class="row flex-column flex-md-row flex-lg-column">
						<div class="col-md col-lg-auto">
							<div class="footer-logo">
								<img height="80" src="<?=base_url('assets/')?>images/logo.png" alt="">
							</div>
							<div class="mt-2 mt-lg-0"></div>
							<div class="footer-social d-none d-md-block d-lg-none">
								<a href="https://www.facebook.com/" target="blank" class="hovicon"><i class="icon-facebook-logo"></i></a>
								<a href="https://www.twitter.com/" target="blank" class="hovicon"><i class="icon-twitter-logo"></i></a>
								<a href="https://www.instagram.com/" target="blank" class="hovicon"><i class="icon-instagram"></i></a>
							</div>
						</div>
						<div class="col-md">
							<div class="footer-text mt-1 mt-lg-2">
								<p>To receive email releases, simply provide
									<br>us with your email below</p>
								<form action="#" class="footer-subscribe">
									<div class="input-group">
										<input name="subscribe_mail" type="text" class="form-control" placeholder="Your Email" />
										<span><i class="icon-black-envelope"></i></span>
									</div>
								</form>
							</div>
							<div class="footer-social d-md-none d-lg-block">
								<a href="https://www.facebook.com/" target="blank" class="hovicon"><i class="icon-facebook-logo"></i></a>
								<a href="https://www.twitter.com/" target="blank" class="hovicon"><i class="icon-twitter-logo"></i></a>
								<a href="https://www.instagram.com/" target="blank" class="hovicon"><i class="icon-instagram"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<h3>Berita Terpopuler</h3>
					<div class="h-decor"></div>
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
					<div class="footer-post d-flex">
						<div class="footer-post-photo"><img src="<?=base_url('assets/images/posts/'.$d['thumbnail'])?>" alt="" class="img-fluid"></div>
						<div class="footer-post-text">
							<div class="footer-post-title"><a href="<?=base_url('berita/detail/').$d['link']?>"><?=$d['judul']?></a></div>
							<p><i class="icon icon-calendar"></i> <?=tanggal_indo(date('Y-m-d', strtotime($d['tanggal']))).', '.date('H.i',strtotime($d['tanggal'])).' WIB'?></p>
						</div>
					</div>
				<?php endforeach ?>
					<a href="<?=base_url('berita/kategori/?k=semua')?>"><p class="theme-color mb-0 mr-4 pull-right float-right">Lihat Semua</p></a>
				</div>
				<div class="col-sm-6 col-lg-4">
					<h3>Kontak Kami</h3>
					<div class="h-decor"></div>
					<ul class="icn-list">
						<li><i class="icon-placeholder2"></i>1560 Holden Street San Diego, CA 92139
							<br>
							<a href="<?=base_url('kontak')?>" class="btn btn-xs btn-gradient"><i class="icon-placeholder2"></i><span>Lokasi</span><i class="icon-right-arrow"></i></a>
						</li>
						<li><i class="icon-telephone"></i><b><span class="phone"><span class="text-nowrap">(0285) 382037</span></span></b></li>
						<li><i class="icon-black-envelope"></i><a href="mailto:dindikbud@pekalongankab.go.id">dindikbud@pekalongankab.go.id</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row text-center text-md-left">
					<div class="col-sm">Copyright © 2019 <a href="javascript:void(0)">Dinas Pendidikan dan Kebudayaan Kab. Pekalongan</a></div>
					<div class="col-sm-auto ml-auto"><span class="d-none d-sm-inline">Telepon &nbsp;&nbsp;&nbsp;</span><i class="icon-telephone"></i>&nbsp;&nbsp;<b>(0285)  382037</b></div>
				</div>
			</div>
		</div>
	</div>
	<!--//footer-->
	<div class="backToTop js-backToTop">
		<i class="icon icon-up-arrow"></i>
	</div>
	<!-- Vendors -->
	<script src="<?=base_url('assets/')?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/jquery-migrate/jquery-migrate-3.0.1.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/cookie/jquery.cookie.js"></script>
	<script src="<?=base_url('assets/')?>vendor/bootstrap-datetimepicker/moment.js"></script>
	<script src="<?=base_url('assets/')?>vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/popper/popper.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/bootstrap/bootstrap.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/waypoints/jquery.waypoints.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/waypoints/sticky.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/slick/slick.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/scroll-with-ease/jquery.scroll-with-ease.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/countTo/jquery.countTo.js"></script>
	<script src="<?=base_url('assets/')?>vendor/form-validation/jquery.form.js"></script>
	<script src="<?=base_url('assets/')?>vendor/form-validation/jquery.validate.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@8.15.1/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/packery/1.4.3/packery.pkgd.min.js"></script>
	<script src="<?=base_url('assets/')?>vendor/photoswipe/jquery.photoswipe-global.js"></script>


	<!-- Custom Scripts -->
	<script src="<?=base_url('assets/')?>js/app.js"></script>
	<script src="<?=base_url('assets/')?>js/app-shop.js"></script>
	<script src="<?=base_url('assets/')?>form/forms.js"></script>

	<custom>
		
	</custom>

	<script type="text/javascript">

		function tambah_dl(id){
			$.post('<?=base_url('media/tambah_dl')?>',
            {
              id:id
            },
            function(data){
            	location.reload();
            });
		}

		$(function(){
			$('#example').DataTable({
				responsive: true
			});

			if ($('#js-gallery').length > 0) {
				$('img').css('cursor','zoom-in')
				$('#js-gallery')
	            .packery({
	                itemSelector: '.slide',
	                gutter: 10
	            })
	            .photoSwipe('.slide', {bgOpacity: 0.8, shareEl: false}, {
	                close: function () {
	                    console.log('closed');
	                }
	            });	
			}

		});

		function reload_js(src) {
	        $('script[src="' + src + '"]').remove();
	        $('<script>').attr('src', src).appendTo('custom');
	    }

		var page = 0;

        $('#btn-load-more').on('click',function(e){
          page++;
          loadMoreData(page);
        })

        $('#btn-message').click(function(e){
        	e.preventDefault();
        	if ($('#nama').val() == '' | $('#email').val() == '' | $('#no_hp').val() == '' | $('#message').val() == '' ) {
        		Swal.fire(
				  'Peringatan!',
				  'Semua Kolom harus diisi!',
				  'warning'
				)
        	}else{
        		$.post('<?=base_url('kontak/message')?>',
	            {
	              nama:$('#nama').val(),
	              email:$('#email').val(),
	              no_hp:$('#no_hp').val(),
	              message:$('#message').val()
	            },
	            function(data){
	            	Swal.fire(
					  'Terima Kasih!',
					  data.respon,
					  'success'
					)

					$('#nama').val('')
		            $('#email').val('')
		            $('#no_hp').val('')
		            $('#message').val('')

	            });	
        	}

        	
        })

        function loadMoreData(page){
        	var pageURL = $(location).attr("href");
        	$('#img-load').removeClass('d-none');
            $('#btn-load-more').addClass('d-none');
        	$.post(pageURL,
            {
              page:page
            },
            function(data){
            	$('#modal-ubah-password').modal('toggle');
            	if(data == ""){
	                $('#img-load').addClass('d-none');
	                $('#btn-load-more').addClass('d-none');
	                return;
	            }
	            $('#img-load').addClass('d-none');
	            $('#btn-load-more').removeClass('d-none');
	            $("#blog-posts").append(data);
	            reload_js('<?=base_url('assets/')?>js/app.js');
            });
        }
	</script>
	<!-- GALERI -->
	<script type="text/javascript">
		let modalId = $('#image-gallery');

		$(document)
		  .ready(function () {

		    loadGallery(true, 'a.thumbnail');

		    //This function disables buttons when needed
		    function disableButtons(counter_max, counter_current) {
		      $('#show-previous-image, #show-next-image')
		        .show();
		      if (counter_max === counter_current) {
		        $('#show-next-image')
		          .hide();
		      } else if (counter_current === 1) {
		        $('#show-previous-image')
		          .hide();
		      }
		    }

		    /**
		     *
		     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
		     * @param setClickAttr  Sets the attribute for the click handler.
		     */

		    function loadGallery(setIDs, setClickAttr) {
		      let current_image,
		        selector,
		        counter = 0;

		      $('#show-next-image, #show-previous-image')
		        .click(function () {
		          if ($(this)
		            .attr('id') === 'show-previous-image') {
		            current_image--;
		          } else {
		            current_image++;
		          }

		          selector = $('[data-image-id="' + current_image + '"]');
		          updateGallery(selector);
		        });

		      function updateGallery(selector) {
		        let $sel = selector;
		        current_image = $sel.data('image-id');
		        $('#image-gallery-title')
		          .text($sel.data('title'));
		        $('#image-gallery-image')
		          .attr('src', $sel.data('image'));
		        disableButtons(counter, $sel.data('image-id'));
		      }

		      if (setIDs == true) {
		        $('[data-image-id]')
		          .each(function () {
		            counter++;
		            $(this)
		              .attr('data-image-id', counter);
		          });
		      }
		      $(setClickAttr)
		        .on('click', function () {
		          updateGallery($(this));
		        });
		    }
		  });

		// build key actions
		$(document)
		  .keydown(function (e) {
		    switch (e.which) {
		      case 37: // left
		        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
		          $('#show-previous-image')
		            .click();
		        }
		        break;

		      case 39: // right
		        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
		          $('#show-next-image')
		            .click();
		        }
		        break;

		      default:
		        return; // exit this handler for other keys
		    }
		    e.preventDefault(); // prevent the default action (scroll / move caret)
		  });
	</script>
</body>

</html>