<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-5">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <?= $this->session->flashdata('message'); ?>

                                <form action="<?= base_url('user/changepassword'); ?>" method="post">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Password Saat ini</label>
                                        <input type="password" class="form-control" id="current_password" name="current_password" ">
                                        <!-- <i id=" pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword()"></i> -->
                                        <?= form_error('current_password', '<small class="text-danger-pl-3">', '</small'); ?>
                                    </div>
                                    <div class=" form-group">
                                        <label class="bmd-label-floating">Password Baru</label>
                                        <input type="password" class="form-control" id="new_password1" name="new_password1" ">
                                        <!-- <i id=" pass-status1" class="fa fa-eye" aria-hidden="true" onClick="viewPassword1()"></i> -->
                                        <?= form_error('new_password1', '<small class="text-danger-pl-3">', '</small'); ?>
                                    </div>
                                    <!-- <div class=" form-group">
                                        <label class="bmd-label-floating">Password Baru</label>
                                        <input type="text" class="form-control" id="new_password1" name="" ">
                                        <?= form_error('new_password1', '<small class="text-danger-pl-3">', '</small'); ?>
                                    </div> -->
                                    <div class=" form-group">
                                        <label class="bmd-label-floating">Ulangi Password</label>
                                        <input type="password" class="form-control" id="new_password2" name="new_password2" ">
                                        <!-- <i id=" pass-status2" class="fa fa-eye" aria-hidden="true" onClick="viewPassword2()"></i> -->
                                    </div>
                                    <!-- <input class="form-check-input" type="checkbox" onclick="viewPassword()">Show Password -->
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" onclick="viewPassword()">Tampilkan Passowrd
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <br>
                                    <div class=" col-sm 10">
                                        <button type="submit" class="btn btn-success">Ganti Password</button>
                                    </div>
                                    <!-- <input type="password" id="password-field">
                                    <i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword()"></i> -->
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>