<main id="js-page-content" role="main" class="page-content">
    <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="far fa-plus-hexagon"></i> Tambah Data Tag
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?=base_url('admin/tags/save')?>">
                        <div class="form-group">
                            <label class="form-label">Tags</label>
                            <input type="text" name="tags" class="form-control" required="">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="far fa-plus-hexagon"></i> Edit Data Tag
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?=base_url('admin/tags/update')?>">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label class="form-label">Tags</label>
                            <input type="text" id="tags" name="tags" class="form-control">
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
                        <i class="far fa-table"></i> Tabel <span class="fw-300"><i>Tags</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="panel-tag">
                            This example shows DataTables and the Responsive extension being used with the Bootstrap framework providing the styling. The DataTables / Bootstrap integration provides seamless integration for DataTables to be used in a Bootstrap page. <strong>Note</strong> that the <code>.dt-responsive</code> class is used to indicate to the extension that it should be enabled on this page, as responsive has special meaning in Bootstrap. The responsive option could also be used if required
                        </div>
                        <?= $this->session->flashdata('alert'); ?>
                        <button data-toggle="modal" data-target="#modal-tambah" type="button" class="btn btn-primary"><i class="far fa-plus-hexagon"></i> Tambah Tags</button>
                        <hr>
                        <!-- datatable start -->
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th width="10%">No</th>
                                    <th>Tags</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($data as $d): ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$d['tags']?></td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-info btn-icon rounded-circle" onclick="edit_tag('<?=$d['id']?>')"><i class="far fa-edit"></i></a>
                                            <a href="javascript:;" class="btn btn-danger btn-icon rounded-circle del" rel="<?=base_url('admin/tags/hapus/').$d['id']?>"><i class="far fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php $no++; endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="10%">No</th>
                                    <th>Tags</th>
                                    <th width="15%">Aksi</th>
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