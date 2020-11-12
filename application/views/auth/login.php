<body class="bg-gradient-primary">

    <div class="content">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card o-hidden border-0 shadow-lg mx-auto">
                    <div class="card-body p-0">
                        <div class="card-header card-header-success">
                            <h3 class="card-title text-center">E-Kecamatan Sematang Borang</h3>
                            <p class="card-category">Login</p>
                        </div>
                        <br>
                        <div class="card-body">
                            <form>
                                <div class="row center">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">NIP/NIK</label>
                                            <input type="number" class="form-control" id="ni" name="ni">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Password</label>
                                            <input type="password" id="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success pull-right">Login</button>

                                        <div class="text-center">
                                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                                            <br>
                                            <a class="small" href="<?= base_url('auth/registration'); ?>">Buat Akun!</a>
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