<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-10">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card mb-3">
                            <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="row">
                                    <div class="row-md-2">
                                        <div class="card">
                                            <img height="30%" width="30%" src="<?= base_url('assets/img/profile/' . $user['foto']); ?>" class="img-thumbnail">
                                            <h1>perbaiki tata letak</h1>
                                            <h3 class="card-title"> Nama : <?= $user['nama']; ?></h3>
                                            <h4 class="card-title"> Nik : <?= $user['username']; ?></h4>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <p>Tanggal mendaftar :</p>
                            <h4 class="card-title"><?= date('d F Y', $user['date_create']); ?></h4>
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