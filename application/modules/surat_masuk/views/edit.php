<style>
    .main-content {
        height: auto;
    }

    .subtitle-menu {
        top: 10px;
        left : 15px;
        position: absolute;
    }
    label {
        color: #fff;
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
            <form action="<?= site_url('surat_masuk/simpanedit_suratmasuk/').$detail->no_agenda ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="no_agenda" class="col-sm-3 col-form-label">No Agenda</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_agenda" name="no_agenda" value="<?= ltrim($detail->no_agenda, '0') ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_surat" class="col-sm-3 col-form-label">No Surat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $detail->no_surat ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="">--Kategori Surat--</option>
                            <option value="Telegram" <?= ($detail->kategori)  == "Telegram" ? 'selected' : '' ?>>Telegram</option>
                            <option value="Biasa" <?= ($detail->kategori)  == "Biasa" ? 'selected' : '' ?>>Biasa</option>
                            <option value="Rahasia" <?= ($detail->kategori)  == "Rahasia" ? 'selected' : '' ?>>Rahasia</option>
                            <option value="Surat Perintah" <?= ($detail->kategori)  == "Surat Perintah" ? 'selected' : '' ?>>Surat Perintah</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jns_surat" class="col-sm-3 col-form-label">Jenis Surat</label>
                    <div class="col-sm-9">
                        <input type="hidden" name="" id="jns_surat_val" value="<?= $detail->jns_surat ?>">
                        <select name="jns_surat" id="jns_surat" class="form-control" required value="">
                            <option value="">--Jenis Surat--</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="asal_surat" class="col-sm-3 col-form-label">Asal Surat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="asal_surat" name="asal_surat" value="<?= $detail->asal_surat ?>" placeholder="Asal Surat" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-9">
                        <input placeholder="Tanggal Surat"
                            value="<?= $detail->tgl_surat ?>"
                            type="text"
                            onfocus="(this.type='date')"
                            onblur="(this.type='text')"
                            id="tgl_surat" name="tgl_surat" class="form-control textbox-n" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tujuan_surat" class="col-sm-3 col-form-label">Tujuan Surat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tujuan_surat" name="tujuan_surat" value="<?= $detail->tujuan_surat ?>" placeholder="Tujuan Surat" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_kategori" class="col-sm-3 col-form-label">Perihal</label>
                    <div class="col-sm-9">
                        <textarea name="perihal" id="perihal" class="form-control" required><?= $detail->perihal ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="disposisi" class="col-sm-3 col-form-label">Disposisi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="disposisi" name="disposisi" value="<?= $detail->disposisi ?>" placeholder="Disposisi" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="file" class="col-sm-3 col-form-label">Berkas Surat</label>
                    <div class="col-sm-9">
                        <a href="<?= site_url('upload/').$detail->file ?>" class="text-warning text-lg" target="_blank"><i class="icofont-download"></i> <?= $detail->file ?></a> 
                        <input type="file" class="form-control" id="file" name="file" value="<?= $detail->file ?>" accept="application/pdf">
                        <small>*Upload format pdf</small>
                    </div>
                </div>
                <div class="form-group row">
                    <button type="reset" class="col-sm-2 offset-sm-5 btn btn-light rounded mr-2">CLEAR</button>
                    <a href="javascript:history.back()" type="" class="col-sm-2 btn btn-light mr-2">BATAL</a>
                    <button type="SUBMIT" class="col-sm-2 btn btn-light">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // SET NO AGENDA
    $(document).ready(function() {
        // SET KATEGORI SURAT
        var mySelect = document.getElementById('kategori');
        mySelect.onchange = (event) => {
            var inputText = event.target.value;
            console.log(inputText)
            var kategori = $('#kategori').val()
            $("#jns_surat").find('option').remove();
            $.ajax({
                url: base + 'surat_masuk/generate_jeniskategori/' + kategori,
                type: 'get',
                dataType: 'json',
            })
            .done(function(data) {
                let option = "";
                if(data.length > 0 ) {
                    $('#jns_surat').append("<option value=''>--Jenis Surat--</option>")
                    for (let i = 0; i < data.length; i++) {
                         $('#jns_surat').append("<option value="+data[i]['jenis_kategori'] +">" + data[i]['jenis_kategori'] + "</option>");
                    }
                } else {
                    $('#jns_surat').append("<option value=''>--Jenis Surat--</option>")
                }
                
            })
            .fail(function() {
                console.log("error");
            });
        }

        var value = $('#kategori').val()
        if(value != "")
        {
            $.ajax({
                url: base + 'surat_masuk/generate_jeniskategori/' + value,
                type: 'get',
                dataType: 'json',
            })
            .done(function(data) {
                let option = "";
                for (let i = 0; i < data.length; i++) {
                    
                    $('#jns_surat').append("<option value="+data[i]['jenis_kategori'] +">" + data[i]['jenis_kategori'] + "</option>");
                }
                let jns_value = $('#jns_surat_val').val()
                $(`#jns_surat option[value=${jns_value}]`).attr('selected','selected');
            })
            .fail(function() {
                console.log("error");
            });
        }
    });
    
    
</script>