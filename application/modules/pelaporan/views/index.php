<style>
    .subtitle-menu {
        top: 10px;
        left : 15px;
        position: absolute;
    }
    .main-content {
        height: auto;
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
                        <!-- <option value="semua">Semua</option> -->
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
                        <option value="semua">Semua Kategori Surat</option>
                        <!-- <option value="Telegram">Telegram</option>
                        <option value="Biasa">Biasa</option>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Surat Perintah">Surat Perintah</option> -->
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jns_surat" class="col-sm-4 col-form-label">Jenis Surat</label>
                <div class="col-sm-8">
                    <select name="jns_surat" id="jns_surat" class="form-control" required>
                        <option value="semua">Semua Jenis Surat</option>
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
            <div class="hasil d-none p-5">
                <div class="text-right">
                    <a href="<?= site_url('pelaporan/printPDF') ?>" target="_blank" class="text-lg text-dark">
                        <i class="icofont-print"></i>
                    </a>
                </div>
                <div class="judul"></div>
                <table id="table_hasil" class="table table-bordered bg-white">
                    <thead class="align-items-center">
                        <tr class="text-center">
                            <th>No</th>
                            <th>No Surat</th>
                            <th>Kategori Surat</th>
                            <th>Jenis Surat</th>
                            <th>Perihal</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
     var mySelect = document.getElementById('data_surat');
        mySelect.onchange = (event) => {
            var inputText = event.target.value;
            // console.log(inputText)
            var data_surat = $('#data_surat').val()
            $('#kategori').find('option').remove();
            $.ajax({
                url: base + 'pelaporan/generate_kategori/' + data_surat,
                type: 'get',
                dataType: 'json',
            })
            .done(function(data) {
                let option = "";
                $('#kategori').append('<option value="semua">Semua Kategori</option>')
                for (let i = 0; i < data.length; i++) {
                    $('#kategori').append("<option value="+data[i]['nama_kategori'] +">" + data[i]['nama_kategori'] + "</option>");
                }
            })
            .fail(function() {
                console.log("error");
            });
        }

    var mySelect = document.getElementById('kategori');
        mySelect.onchange = (event) => {
            var inputText = event.target.value;
            // console.log(inputText)
            var kategori = $('#kategori').val()
            $('#jns_surat').find('option').remove();
            $.ajax({
                url: base + 'pelaporan/generate_jeniskategori/' + kategori,
                type: 'get',
                dataType: 'json',
            })
            .done(function(data) {
                let option = "";
                $('#jns_surat').append('<option value="semua">Semua Janis Surat</option>')
                for (let i = 0; i < data.length; i++) {
                    $('#jns_surat').append("<option value="+data[i]['jenis_kategori'] +">" + data[i]['jenis_kategori'] + "</option>");
                }
            })
            .fail(function() {
                console.log("error");
            });
        }

    $('.btn-cari').click(function (e) {
        $('.result-section.d-none').fadeIn('slow').removeClass('d-none')
        // parameter: tgl_awal, tgl_akhir, kategori, jenis_surat, datasurat
        let tgl_awal    = $('#tgl_awal').val()
        let tgl_akhir   = $('#tgl_akhir').val()
        let data_surat  = $('#data_surat').val()
        let kategori    = $('#kategori').val()
        let jns_surat   = $('#jns_surat').val()
        
        $('#tbody').find('tr').remove()
        $('.judul').find('h5').remove()
        $.ajax({
            url: base + 'pelaporan/filter/' + tgl_awal + '/' + tgl_akhir + '/'+ data_surat + '/'+ kategori + '/'+ jns_surat + '/',
            type: 'get',
            dataType: 'json',
        })
        .done(function(data) {
           console.log(data)
           $(".loader").fadeOut()
           if(data.lenght < 1) {
                console.log('kosong')
                $('.result-section').append('<h5 class="m-5 p-5">Maaf Data Surat Tidak ditemukan</h5>')
           } else  {
                $('.hasil.d-none').fadeIn('slow').removeClass('d-none')
                $('.judul').append(`
                <h5>LAPORAN SURAT MASUK DAN KELUAR SATHARMATTIM <br/>
                DARI TANGGAL ${tgl_awal} s/d ${tgl_akhir}
                </h5>
                `)
                let html='';
                for (let i = 0; i < data.length; i++) {
                    $('#tbody').append(
                        `
                        <tr>
                            <td>${i+1}</td>
                            <td>${data[i]['no_surat']}</td>
                            <td>${data[i]['kategori']}</td>
                            <td>${data[i]['jns_surat']}</td>
                            <td>${data[i]['perihal']}</td>
                        <tr>
                        `
                    );
                }
           }
        })
        .fail(function() {
           
        });
    });

</script>