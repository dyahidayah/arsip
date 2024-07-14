<style>
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
            <form action="<?= site_url('kategori/simpan_') . $active ?>" method="post">
                <div class="form-group row">
                    <label for="id_kategori" class="col-sm-3 col-form-label">No Kategori*</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="" placeholder="------" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kategori_surat" class="col-sm-3 col-form-label">Kategori Surat*</label>
                    <div class="col-sm-9">
                        <!-- <input type="text" class="form-control" id="kategori_surat" name="kategori_surat" value="" placeholder="Kategori Surat"> -->
                        <select name="nama_kategori" id="nama_kategori" class="form-control" required>
                            <option value="">Kategori Surat</option>
                            <option value="Telegram">Telegram</option>
                            <option value="Biasa">Biasa</option>
                            <option value="Rahasia">Rahasia</option>
                            <option value="Surat Perintah">Surat Perintah</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_surat" class="col-sm-3 col-form-label">Jenis Surat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jenis_kategori" name="jenis_kategori" value="" placeholder="Jenis Surat">
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
    var base = $('#base_url').data('id')
    $(document).ready(function() {
        var mySelect = document.getElementById('nama_kategori');
        mySelect.onchange = (event) => {
            var inputText = event.target.value;
            console.log(inputText)
            var active = $('#active').val()
            console.log(active)
            $.ajax({
                url: base + 'kategori/generate_number/' + active + '/' + inputText,
                type: 'get',
                dataType: 'json',
            })
            .done(function(data) {
                console.log(data)
                $('#id_kategori').val(data)
            })
            .fail(function() {
                console.log("error");
            });
        }
    });
</script>