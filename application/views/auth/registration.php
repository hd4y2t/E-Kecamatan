<body class="bg-gradient-primary">
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card o-hidden border-0 shadow-lg mx-auto">
                    <div class="card-body p-0">
                        <div class="card-header card-header-success">
                            <h3 class="scard-title text-center">E-Kecamatan Sematang Borang</h3>
                            <p class="card-category">Registrasi</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= base_url('auth'); ?>">
                                <div class="col center">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">NIP/NIK</label>
                                            <input type="number" class="form-control" id="ni" name="ni" value="<?= set_value('ni'); ?>">
                                            <?= form_error('ni', '<small class="text-danger-pl-3">', '</small'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                                            <?= form_error('nama', '<small class="text-danger-pl-3">', '</small'); ?>
                                        </div>
                                        <div class="row-lg-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Password</label>
                                                <input type="password" id="password1" name="password1" class="form-control">
                                                <?= form_error('password1', '<small class="text-danger-pl-3">', '</small'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Ulangi Password</label>
                                                <input type="password" id="password2" name="password2" class="form-control">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success pull-right">Registrasi</button>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Lupa Password?</a>
                                        <br>
                                        <a class="small" href="<?= base_url('auth'); ?>">Sudah Punya Akun? Login!</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>