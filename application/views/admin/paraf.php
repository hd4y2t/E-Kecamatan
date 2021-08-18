<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title">Lokasi <?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <?= form_error('surat', '<div class="text-danger" surat="alert">', '</div>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Link paraf</label>
                                                    <input type="text" class="form-control" id="paraf" name="paraf" value="<?= $profile['paraf']; ?>">
                                                </div>
                                                <button type="Submit" class="btn btn-warning">Perbarui</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title   ?> Dokumen</h3>
                            </div>
                            <div class="card-body">
                                <iframe width=" 100%" height="800px" src="<?= $profile['paraf']; ?>" style="min-height: 600;"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</body>