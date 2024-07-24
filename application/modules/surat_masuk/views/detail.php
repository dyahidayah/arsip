<style>
    .main-content {
        height: auto;
    }

    .subtitle-menu {
        top: 10px;
        left : 15px;
        position: absolute;
    }
</style>
<div class="p-5 w-100">
    <div class="subtitle-menu">
        <h6 class="text-white">
            Homepage   >   <?= $main_menu ?>   >   <?= $sub_menu ?>
        </h6>
        <input type="hidden" name="" id="active" value="<?= $active ?>">
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <h4 class="text-white mb-5 text-uppercase">
                <?= $sub_menu ?>
            </h4>
        </div>
        <div class="col-md-6 offset-md-3">
            <div class="rounded bg-white p-5">
                <div class="form-group row">
                    <label for="no_surat" class="col-sm-4 col-form-label">No Surat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $detail->no_surat ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_surat" class="col-sm-4 col-form-label">Tgl Surat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $detail->tgl_surat ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_surat" class="col-sm-4 col-form-label">Kategori Surat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $detail->kategori ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_surat" class="col-sm-4 col-form-label">Jenis Surat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $detail->jns_surat ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_surat" class="col-sm-4 col-form-label">Asal Surat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $detail->asal_surat ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_surat" class="col-sm-4 col-form-label">Perihal</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $detail->perihal ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_surat" class="col-sm-4 col-form-label">Disposisi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $detail->disposisi ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_surat" class="col-sm-4 col-form-label">File</label>
                    <div class="col-sm-8">
                    <a href="<?= site_url('upload/masuk/').$detail->file ?>" class="text-dark text-lg" target="_blank"><i class="icofont-download"></i></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>