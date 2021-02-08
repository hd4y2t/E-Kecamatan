<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-6">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <?= $this->session->flashdata('message'); ?>

                                <form action="<?= base_url('user/changepassword'); ?>" method="post">
                                    <h2>Error insert ke database</h2>
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Password Saat ini</label>
                                        <input type="text" class="form-control" id="current_password" name="current_password" ">
                                        <?= form_error('current_password', '<small class="text-danger-pl-3">', '</small'); ?>
                                    </div>
                                    <div class=" form-group">
                                        <label class="bmd-label-floating">Password Baru</label>
                                        <input type="text" class="form-control" id="new_passsword1" name="new_passsword1" ">
                                        <?= form_error('new_password1', '<small class="text-danger-pl-3">', '</small'); ?>
                                    </div>
                                    <div class=" form-group">
                                        <label class="bmd-label-floating">Password Saat ini</label>
                                        <input type="text" class="form-control" id="new_password2" name="new_password2" ">
                                        <?= form_error('new_password2', '<small class="text-danger-pl-3">', '</small'); ?>
                                    </div>
                                    <br>
                                    <div class=" col-sm 10">
                                        <button type="submit" class="btn btn-success">Ganti Password</button>
                                    </div>

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