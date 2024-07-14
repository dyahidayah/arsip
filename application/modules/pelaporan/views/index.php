<style>
    .subtitle-menu {
        top: 10px;
        left : 15px;
        position: absolute;
    }
</style>
<div class="p-5 w-100">
    <div class="subtitle-menu">
        <h6 class="text-white">
            Homepage   >   <?= $sub_menu ?>
        </h6>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <h4 class="text-white mb-5 text-uppercase">
                DATA <?= $sub_menu ?>
            </h4>
            <input type="hidden" name="" id="active" value="<?= $active ?>">
        </div>
        <div class="col-md-5">
            <div class="form-group row">
                <label for="tgl_surat" class="col-sm-4 col-form-label">Tanggal Awal</label>
                <div class="col-sm-8">
                    <input placeholder="Tanggal Awal"
                        type="text"
                        onfocus="(this.type='date')"
                        onblur="(this.type='text')"
                        id="tgl_awal" name="tgl_awal" class="form-control textbox-n" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_surat" class="col-sm-4 col-form-label">Tanggal Akhir</label>
                <div class="col-sm-8">
                    <input placeholder="Tanggal Akhir"
                        type="text"
                        onfocus="(this.type='date')"
                        onblur="(this.type='text')"
                        id="tgl_akhir" name="tgl_akhir" class="form-control textbox-n" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="data_surat" class="col-sm-4 col-form-label">Data Surat</label>
                <div class="col-sm-8">
                    <select name="data_surat" id="data_surat" class="form-control" required>
                        <option value="semua">Semua</option>
                        <option value="surat_masuk">Surat Masuk</option>
                        <option value="surat_keluar">Surat Keluar</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group row">
                <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                <div class="col-sm-8">
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">--Kategori Surat--</option>
                        <option value="Telegram">Telegram</option>
                        <option value="Biasa">Biasa</option>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Surat Perintah">Surat Perintah</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jns_surat" class="col-sm-4 col-form-label">Jenis Surat</label>
                <div class="col-sm-8">
                    <select name="jns_surat" id="jns_surat" class="form-control" required>
                        <option value="">--Jenis Surat--</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-2 text-center">
            <button type="" class="w-50 btn btn-light mb-3 btn-cari">Cari</button>
            <a href="<?= site_url('home') ?>" type="" class="w-50 m-auto btn btn-light">BATAL</a>
        </div>
        <div class="col-md-12 text-center bg-white rounded result-section d-none">
            <div class="loader">
                <img style="width:140px" src="<?= site_url('assets/img/spinner.svg')?>" alt="">
            </div>
        </div>
    </div>
</div>

<script>
    var mySelect = document.getElementById('kategori');
        mySelect.onchange = (event) => {
            var inputText = event.target.value;
            console.log(inputText)
            var kategori = $('#kategori').val()
            $.ajax({
                url: base + 'pelaporan/generate_jeniskategori/' + kategori,
                type: 'get',
                dataType: 'json',
            })
            .done(function(data) {
                let option = "";
                for (let i = 0; i < data.length; i++) {
                    $('#jns_surat').append("<option value="+data[i]['jenis_kategori'] +">" + data[i]['jenis_kategori'] + "</option>");
                }
            })
            .fail(function() {
                console.log("error");
            });
        }

    $('.btn-cari').click(function (e) {
    //    $('.result-section.d-none').fadeIn('slow').removeClass('d-none')
    });

</script>