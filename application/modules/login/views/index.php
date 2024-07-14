<style>
    .card {
        border-radius: 3rem;
        border: 3px solid #8080809e;
    }
</style>
<div class="" style="">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong">
            <form action="<?= site_url('login/admin_verifikasi') ?>" method="post">
                <div class="card-body p-5 text-center">
                    <h1 class="mb-4 text-dark">LOG IN</h1>
                    <div class="w-25 m-auto pb-5">
                        <img src="<?= base_url() ?>assets/img/logo.jpg" alt="" class="img-fluid">
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="username" class="form-control form-control-lg" name="username" placeholder="Username" />
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="password" class="form-control form-control-lg"  name="password" placeholder="Password"/>
                    </div>
                    <!-- BUTTON LOGIN -->
                    <button class="btn btn-dark btn-lg w-50 m-auto rounded-pill" type="submit">LOGIN</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
