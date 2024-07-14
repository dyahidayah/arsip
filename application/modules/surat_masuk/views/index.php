<style>
    .subtitle-menu {
        top: 10px;
        left : 15px;
        position: absolute;
    }
    .view_detail:focus {
        color: #ff7f00;
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
                <?php if($this->session->userdata('ses_daily_username') != 'superadmin'): ?>
                    <a href="<?= site_url('surat_masuk/riwayat') ?>" class="btn btn-dark mb-4">Riwayat Surat Masuk <i class="icofont-history"></i></a>
                    <a href="<?= site_url('surat_masuk/tambah_suratmasuk') ?>" class="btn btn-success mb-4">Tambah Data <i class="icofont-ui-add"></i></a>
                <?php endif;?>
            </div>
            <table id="table_target" class="table table-bordered bg-white">
                <thead class="align-items-center">
                    <tr class="text-center">
                        <th>No Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Perihal</th>
                        <th>Kategori Surat</th>
                        <th>Jenis Surat</th>
                        <th>Disposisi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if($data_suratmasuk):
                foreach($data_suratmasuk as $data) :?>
                        <tr>
                            <td class="no_kategori text-center">
                                <a class="view_detail text-dark font-weight-bold" href="<?= site_url('surat_masuk/detail_surat/').$data->no_agenda ?>" alt="Detail Surat">
                                    <?= $data->no_surat?>
                                </a>
                            </td>
                            <td class="nama_kategori text-center"><?= date("d-m-Y", strtotime($data->tgl_surat))?></td>
                            <td class="jenis_kategori"><?= $data->perihal?></td>
                            <td class="jenis_kategori"><?= $data->kategori?></td>
                            <td class="jenis_kategori"><?= $data->jns_surat?></td>
                            <td class="jenis_kategori"><?= $data->disposisi?></td>
                            <td class="action text-center">
                                <?php 
                                    if($main_page == "main_pagesurat") {
                                ?>
                                    <?php if($this->session->userdata('ses_daily_username') != 'superadmin'): ?>
                                        <a href="<?= site_url('surat_masuk/edit_suratmasuk/').$data->no_agenda ?>" class="text-success text-lg edit-data" data-id="<?= $data->no_agenda?>"><i class="icofont-ui-edit"></i></a>
                                        <a href="#" onclick="delete_surat('<?= $data->no_agenda ?>')" class="text-danger text-lg"><i class="icofont-ui-delete"></i></a>
                                    <?php endif; ?>
                                        <a href="<?= site_url('upload/').$data->file ?>" class="text-dark text-lg" target="_blank"><i class="icofont-download"></i></a> 
                                <?php 
                                    } else {
                                        ?>
                                    <a href="#" onclick="recovery('<?= $data->no_agenda ?>')" class="text-success text-lg edit-data" data-id="<?= $data->no_agenda?>"><i class="icofont-history"></i></a>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; 
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function delete_surat(no_agenda)
    {
        Swal.fire({
            title: 'Delete data?',
            text: "Anda Yakin akan menghapus data surat ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                var active = $('#active').val()
                $.ajax({
                    url: base+'surat_masuk/delete_surat',
                    type: 'post',
                    dataType: 'json',
                    data: {no_agenda: no_agenda},
                })
                .done(function(data) {
                    location.href = base+'surat_masuk/';
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

    function recovery(no_agenda)
    {
        Swal.fire({
            title: 'Recovery data?',
            text: "Anda Yakin akan mengembalikan data surat ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'green',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, recovery Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                var active = $('#active').val()
                $.ajax({
                    url: base+'surat_masuk/recovery',
                    type: 'post',
                    dataType: 'json',
                    data: {no_agenda: no_agenda},
                })
                .done(function(data) {
                    location.href = base+'surat_masuk/';
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