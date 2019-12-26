<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <i class="far fa-plus-hexagon"></i> Tambah <span class="fw-300"><i>Berita</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form method="post" action="<?=base_url('admin/berita/save')?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-label">Judul Berita</label>
                                <input type="text" class="form-control" name="judul" placeholder="Judul Berita">
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    Bidang
                                </label>
                                <select class="select2 form-control" name="id_bidang">
                                    <option value="0" selected="" disabled="">Pilih Bidang</option>
                                    <?php $bidang = $this->db->get('bidang')->result_array(); ?>
                                    <?php foreach ($bidang as $t): ?>
                                        <option value="<?=$t['id']?>"><?=$t['nama_bidang']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Readmore</label>
                                <textarea class="js-readmore form-control" name="readmore" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Isi Berita</label>
                                <textarea class="js-sambutan form-control" name="isi" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    Tags
                                </label>
                                <select class="select2 form-control" multiple="multiple" name="tags[]">
                                    <?php $tags = $this->db->get('tags')->result_array(); ?>
                                    <?php foreach ($tags as $t): ?>
                                        <option value="<?=$t['tags']?>"><?=$t['tags']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    Status
                                </label>
                                <select class="select2 form-control" name="status">
                                    <option value="x" selected="" disabled="">Pilih Status</option>
                                    <option value="0">Disembunyikan</option>
                                    <option value="1">Ditampilkan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail Berita</label>
                                <input type="file" class="form-control" name="userFiles[]" multiple="">
                            </div>
                            <div class="form-group mb-0">
                                <label>Attachments</label>
                                <input type="file" class="form-control" name="attachments[]" multiple="">
                                <div class="help-block">Bila ingin menambahkan attachment pada berita....</div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-themed">
                                <span class="fal fa-check mr-1"></span>
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>