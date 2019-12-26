<main id="js-page-content" role="main" class="page-content">
    <div class="modal fade" id="modal-edit" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="far fa-edit"></i> Ubah Data Struktur Organisasi
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="js-summernote"></div> -->
                    <form method="post" action="<?=base_url('admin/profil/update_struktur')?>">
                        <input type="hidden" name="xid" id="xid">
                        <div class="form-group">
                            <label class="form-label">Struktur Organisasi</label>
                            <textarea class="js-sambutan form-control" name="isi" id="struktur" required=""></textarea>
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
            <!-- Header options -->
            <div id="panel-9" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Struktur Organisasi
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- <div class="panel-tag">
                            Display of some example optional "stuff" you can add to <code>.card-header</code>
                        </div> -->
                        <a href="javascript:;" class="btn btn-primary mb-3" onclick="edit_struktur('<?=$data['id']?>')"><i class="far fa-edit"></i> Ubah Data Struktur Organisasi</a>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card border mb-4 mb-xl-0">
                                    <!-- notice the additions of utility paddings and display properties on .card-header -->
                                    <div class="card-header bg-trans-gradient py-2 pr-2 d-flex align-items-center flex-wrap">
                                        <!-- we wrap header title inside a span tag with utility padding -->
                                        <div class="card-title text-white">Struktur Organisasi - Dinas Pendidikan dan Kebudayaan Kab. Pekalongan</div>
                                        <!-- <div class="d-flex position-relative ml-auto" style="max-width: 10rem;">
                                            <i class="fal fa-search position-absolute pos-left fs-lg px-3 py-2 mt-1"></i>
                                            <input type="text" class="form-control bg-subtlelight pl-6" placeholder="Search">
                                        </div> -->
                                    </div>
                                    <div class="card-body">
                                        <div class="card-text"><?=$data['isi']?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>