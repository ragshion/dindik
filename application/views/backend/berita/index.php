<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <i class="far fa-newspaper"></i> Data <span class="fw-300"><i>Berita</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <?= $this->session->flashdata('alert'); ?>
                        <a href="<?=base_url('admin/berita/tambah')?>" class="btn btn-primary"><i class="far fa-plus-hexagon"></i> Tambah Berita</a>
                        <hr>
                        <!-- datatable start -->
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Link</th>
                                    <th>Bidang</th>
                                    <th>Teaser</th>
                                    <th>Status</th>
                                    <th>Tags</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah View</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($post as $d): ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$d['judul']?></td>
                                        <td><a href="<?=base_url('berita/detail/').$d['link']?>" target="_blank"><?=$d['link']?></a></td>
                                        <td><?=$d['nama_bidang']?></td>
                                        <td><?=$d['readmore']?></td>
                                        <td>
                                            <?php if ($d['status']== '1') : ?>
                                                <a class="btn btn-sm btn-info waves-effect waves-themed stat" href="javascript:;" rel="<?=base_url('admin/berita/status/0/').$d['id']?>">Ditampilkan</a>
                                            <?php endif ?>
                                            <?php if ($d['status']== '0') : ?>
                                                <a class="btn btn-sm btn-warning text-white waves-effect waves-themed stat" href="javascript:;" rel="<?=base_url('admin/berita/status/1/').$d['id']?>">Disembunyikan</a>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                        <?php $x = explode(";", $d['tags']) ?>
                                        <?php foreach ($x as $z): ?>
                                             <span class="badge badge-primary"><?=$z?></span>
                                         <?php endforeach ?> 
                                        </td>
                                        <td><?=tanggal_indo(date('Y-m-d', strtotime($d['tanggal'])))?></td>
                                        <td><?=$d['hit_count']?></td>
                                        
                                        <td>
                                            <a href="<?=base_url('admin/berita/edit/').$d['link']?>" class="btn btn-secondary btn-icon rounded-circle"><i class="far fa-edit"></i></a>
                                            <a href="javascript:;" class="btn btn-danger btn-icon rounded-circle del" rel="<?=base_url('admin/berita/hapus/').$d['id']?>"><i class="far fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php $no++; endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Link</th>
                                    <th>Bidang</th>
                                    <th>Teaser</th>
                                    <th>Status</th>
                                    <th>Tags</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah View</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>