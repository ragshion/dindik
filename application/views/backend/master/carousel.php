<main id="js-page-content" role="main" class="page-content">
    <div class="modal fade" id="modal-tambah" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="far fa-plus-hexagon"></i> Tambah Data Carousel
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="js-summernote"></div> -->
                    <form method="post" action="<?=base_url('admin/carousel/save')?>" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label class="form-label">Keterangan</label>
                            <textarea class="js-summernote form-control" name="keterangan" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Link</label>
                            <input type="text" name="link" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" required="" name="status">
                                <option value="1">Ditampilkan</option>
                                <option value="0">Disembunyikan</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edit" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="far fa-plus-hexagon"></i> Edit Data Carousel
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="js-summernote"></div> -->
                    <form method="post" action="<?=base_url('admin/carousel/update')?>" enctype='multipart/form-data'>
                        <input type="hidden" name="xid" id="xid">
                        <div class="form-group">
                            <label class="form-label">Keterangan</label>
                            <textarea class="js-summernote form-control" name="keterangan" id="keterangan" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Link</label>
                            <input type="text" name="link" class="form-control" required="" id="link">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select class="form-control" required="" name="status" id="status">
                                <option value="1">Ditampilkan</option>
                                <option value="0">Disembunyikan</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Tutup</button>
                        <button type="submit" class="btn btn-info"><i class="far fa-save"></i> Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <i class="far fa-image"></i> Tabel <span class="fw-300"><i>Carousel</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="panel-tag">
                            This example shows DataTables and the Responsive extension being used with the Bootstrap framework providing the styling. The DataTables / Bootstrap integration provides seamless integration for DataTables to be used in a Bootstrap page. <strong>Note</strong> that the <code>.dt-responsive</code> class is used to indicate to the extension that it should be enabled on this page, as responsive has special meaning in Bootstrap. The responsive option could also be used if required
                        </div>
                        <?= $this->session->flashdata('alert'); ?>
                        <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-primary"><i class="far fa-plus-hexagon"></i> Tambah Carousel</button>
                        <hr>
                        <!-- datatable start -->
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Link</th>
                                    <th>Foto</th>
                                    <th>Tanggal Input</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($data as $d): ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$d['keterangan']?></td>
                                        <td><a href="<?=$d['link']?>" target="_blank"><?=$d['link']?></a></td>
                                        <td><a href="<?=base_url('assets/images/carousel/').$d['foto']?>" target="_blank"><img height="100" src="<?=base_url('assets/images/carousel/').$d['foto']?>"></a></td>
                                        <td><?=tanggal_indo(date('Y-m-d', strtotime($d['tgl_input'])))?></td>
                                        <td>
                                            <?php if ($d['status']== '1') : ?>
                                                Ditampilkan
                                            <?php endif ?>
                                            <?php if ($d['status']== '0') : ?>
                                                Disembunyikan
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-secondary btn-icon rounded-circle" onclick="edit_carousel('<?=$d['id']?>')"><i class="far fa-edit"></i></a>
                                            <a href="javascript:;" class="btn btn-danger btn-icon rounded-circle del" rel="<?=base_url('admin/carousel/hapus/').$d['id']?>"><i class="far fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php $no++; endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Link</th>
                                    <th>Foto</th>
                                    <th>Tanggal Input</th>
                                    <th>Status</th>
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