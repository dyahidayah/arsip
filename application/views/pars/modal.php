<form action="<?= site_url('leader/admin_verifikasi') ?>" method="post">
    <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Please Login To Continue</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="icofont-close-line-circled"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label font-weight-bold">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-round-orange" data-dismiss="modal"><i class="icofont-close-line-circled"></i> Close</button>
                    <button type="submit" class="btn btn-round-primary"><i class="icofont-login"></i> Login</button>
                </div>
            </div>
        </div>
    </div>
</form>