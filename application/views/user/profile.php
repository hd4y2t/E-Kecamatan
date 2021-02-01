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
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <img src="<?= base_url('assets/img/profile/' . $user['foto']); ?>" alt="..." class="img-thumbnail">
                                            <div class="card-header card-header">
                                                <h3 class="card-title"> Nama : <?= $user['nama']; ?></h3>

                                                <h4 class="card-title"> Nik : <?= $user['ni']; ?></h4>
                                            </div>

                                        </div>
                                        Tanggal mendaftar : <h4 class="card-title"><?= date('d F Y', $user['date_create']); ?></h4>
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