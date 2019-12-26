<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <?= '<center><div id="loadering" class="lds-css ng-scope animated fadeIn"><div style="width:100%;height:100%" class="lds-facebook"><div></div><div></div><div></div></div><style type="text/css">@keyframes lds-facebook_1{0%{top: 36px; height: 128px;}50%{top: 60px; height: 80px;}100%{top: 60px; height: 80px;}}@-webkit-keyframes lds-facebook_1{0%{top: 36px; height: 128px;}50%{top: 60px; height: 80px;}100%{top: 60px; height: 80px;}}@keyframes lds-facebook_2{0%{top: 41.99999999999999px; height: 116.00000000000001px;}50%{top: 60px; height: 80px;}100%{top: 60px; height: 80px;}}@-webkit-keyframes lds-facebook_2{0%{top: 41.99999999999999px; height: 116.00000000000001px;}50%{top: 60px; height: 80px;}100%{top: 60px; height: 80px;}}@keyframes lds-facebook_3{0%{top: 48px; height: 104px;}50%{top: 60px; height: 80px;}100%{top: 60px; height: 80px;}}@-webkit-keyframes lds-facebook_3{0%{top: 48px; height: 104px;}50%{top: 60px; height: 80px;}100%{top: 60px; height: 80px;}}.lds-facebook{position: relative;}.lds-facebook div{position: absolute; width: 30px;}.lds-facebook div:nth-child(1){left: 35px; background: #1d3f72; -webkit-animation: lds-facebook_1 1s cubic-bezier(0, 0.5, 0.5, 1) infinite; animation: lds-facebook_1 1s cubic-bezier(0, 0.5, 0.5, 1) infinite; -webkit-animation-delay: -0.2s; animation-delay: -0.2s;}.lds-facebook div:nth-child(2){left: 85px; background: #5699d2; -webkit-animation: lds-facebook_2 1s cubic-bezier(0, 0.5, 0.5, 1) infinite; animation: lds-facebook_2 1s cubic-bezier(0, 0.5, 0.5, 1) infinite; -webkit-animation-delay: -0.1s; animation-delay: -0.1s;}.lds-facebook div:nth-child(3){left: 135px; background: #d8ebf9; -webkit-animation: lds-facebook_3 1s cubic-bezier(0, 0.5, 0.5, 1) infinite; animation: lds-facebook_3 1s cubic-bezier(0, 0.5, 0.5, 1) infinite;}.lds-facebook{width: 200px !important; height: 200px !important; -webkit-transform: translate(-100px, -100px) scale(1) translate(100px, 100px); transform: translate(-100px, -100px) scale(1) translate(100px, 100px);}</style></div></center>' ?>
            <div id="panel-1" class="panel d-none">
                <div class="panel-hdr">
                    <h2>
                        <i class="far fa-plus-hexagon"></i> Ubah <span class="fw-300"><i>Berita</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form id="edit-berita" method="post" action="<?=base_url('admin/berita/update')?>" enctype="multipart/form-data">
                            <input type="hidden" name="xid" id="xid">
                            <div class="form-group">
                                <label class="form-label">Judul Berita</label>
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Berita">
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    Bidang
                                </label>
                                <select class="select2 form-control" name="id_bidang" id="id_bidang">
                                    <option value="0" selected="" disabled="">Pilih Bidang</option>
                                    <?php $bidang = $this->db->get('bidang')->result_array(); ?>
                                    <?php foreach ($bidang as $t): ?>
                                        <option value="<?=$t['id']?>"><?=$t['nama_bidang']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Readmore</label>
                                <textarea class="js-readmore form-control" name="readmore" id="readmore" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Isi Berita</label>
                                <textarea class="js-sambutan form-control" name="isi" id="isi" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    Tags
                                </label>
                                <select class="select2 form-control" multiple="multiple" name="tags[]" id="tags">
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
                                <select class="select2 form-control" name="status" id="status">
                                    <option value="x" selected="" disabled="">Pilih Status</option>
                                    <option value="0">Disembunyikan</option>
                                    <option value="1">Ditampilkan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail Berita</label>
                                <input type="file" class="form-control" name="userFiles[]" multiple="">
                                <div class="help-block">Bila tidak ingin mengganti thumbnail berita, biarkan saja kolom ini!</div>
                            </div>
                            <div class="form-group mb-0">
                                <label>Attachmnent Berita</label>
                                <input type="file" class="form-control" name="attachments[]" multiple="">
                                <div class="help-block">Bila tidak ingin mengubah attachment berita, biarkan saja kolom ini!</div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-block btn-info waves-effect waves-themed">
                                <span class="fal fa-check mr-1"></span>
                                Perbarui
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>