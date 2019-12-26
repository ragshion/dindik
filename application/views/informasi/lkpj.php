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
		<div class="section page-content-first mt-4 animated fadeIn">
			<div class="container">
				<div class="text-center mb-2  mb-md-3 mb-lg-4">
					<div class="h-sub theme-color">Data LKPJ <br>Dinas Pendidikan dan Kebudayaan Kabupaten Pekalongan</div>
					<div class="h-decor"></div>
				</div>
			</div>
			<div class="container">
				<div class="row">
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
				<div class="clearfix mb-4"></div>
			</div>
		</div>
	</div>