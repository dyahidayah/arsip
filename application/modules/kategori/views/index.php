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
        <div class="col-md-12">
            <div class="text-right">
                <a href="<?= site_url('kategori/tambah_').$active ?>" class="btn btn-success mb-4">Tambah Data <i class="icofont-ui-add"></i></a>
            </div>
            <table id="table_target" class="table table-bordered bg-white">
                <thead class="align-items-center">
                    <tr class="text-center">
                        <th>No kategori</th>
                        <th>Kategori Surat</th>
                        <th>Jenis Surat</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_kategori as $data) :?>
                        <tr>
                            <td class="no_kategori text-center"><?= $data->id_kategori?></td>
                            <td class="nama_kategori text-center"><?= $data->nama_kategori?></td>
                            <td class="jenis_kategori"><?= $data->jenis_kategori?></td>
                            <td class="action text-center">
                                <a href="<?= site_url('kategori/edit_').$active.'/'.$data->id_kategori ?>" class="text-success text-lg edit-data" data-id="<?= $data->id_kategori?>"><i class="icofont-ui-edit"></i></a>
                                <a href="#" onclick="delete_kategori('<?= $data->id_kategori ?>')" class="text-danger text-lg"><i class="icofont-ui-delete"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // edit data ketergori

    // hapus data kategori
    function delete_kategori(id_kategori)
    {
        Swal.fire({
            title: 'Delete data?',
            text: "Anda Yakin akan menghapus data kategori surat ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                var active = $('#active').val()
                $.ajax({
                    url: base+'kategori/delete_kategori/'+active,
                    type: 'post',
                    dataType: 'json',
                    data: {id_kategori: id_kategori},
                })
                .done(function(data) {
                    location.href = base+'kategori/'+active;
                })
                .fail(function() {
                    Swal.fire(
                        'OPSS',
                        'GAGAL',
                        'error'
                        )
                });
            }
        })
    }

</script>