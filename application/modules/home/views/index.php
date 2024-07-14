<div class="p-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h4 class="text-white mb-5">
                SISTEM INFORMASI PENGARSIPAN SURAT MASUK DAN SURAT KELUAR <br/>
                DI SATHARMATTIM DINAS MATERIEL ANGKATAN LAUT
            </h4>
        </div>
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="card text-white">
                        <div class="card-body bg-success">
                            <h4><?= $count_masuk ?></h4>
                            <h5>Surat Masuk</h5>
                        </div>
                        <div class="card-footer text-center bg-dark text-white">
                            <a href="<?= site_url('surat_masuk')?>">Selengkapnya >> </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white">
                        <div class="card-body bg-danger">
                            <h4><?= $count_keluar ?></h4>
                            <h5>Surat Keluar</h5>
                        </div>
                        <div class="card-footer text-center bg-dark text-white">
                            <a href="<?= site_url('surat_keluar')?>">Selengkapnya >> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>