<body class="bg-gradient-primary">

    <div class="content h-100 mt-8">
        <!-- <div class="content-fluid"> -->
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-lg-4 mt-5">
                <div class="card o-hidden border-0 shadow-lg mx-auto">
                    <div class="card-body p-0">
                        <div class="card-header card-header-success">
                            <h3 class="card-title text-center">E-Kecamatan Sematang Borang</h3>
                            <p class="card-category">Login</p>
                        </div>
                        <br>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('auth'); ?>">
                                <div class="row center">
                                    <div class="col-md">
                                        <?= $this->session->flashdata('message'); ?>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>">
                                            <?= form_error('username', '<small class="text-danger-pl-3">', '</small'); ?>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label class="bmd-label-floating">Password </label>
                                                <input type="password" id="password" name="password" class="form-control">
                                                <!-- <i id=" pass" class="fa fa-eye" aria-hidden="true" onClick="viewPassword2()"> </i> -->
                                                <?= form_error('password', '<small class="text-danger-pl-3">', '</small'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success pull-right mt-3 mb-3 mr-3 ml-3">Login</button>

                                        <div class="text-center">
                                            <!-- <a class="small" href="<?= base_url('auth/dashboard'); ?>">Lupa Password?</a> -->
                                            <br>
                                            <!-- <a class="small" href="<?= base_url('auth/register'); ?>">Buat Akun!</a> -->
                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>