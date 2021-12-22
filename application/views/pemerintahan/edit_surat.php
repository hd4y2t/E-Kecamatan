<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-7">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <?= form_error('surat', '<div class="text-danger" surat="alert">', '</div>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Nama Surat</label>
                                                    <input type="text" class="form-control" id="nm_surat" name="nm_surat" value="<?= $edit_surat['nm_surat']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <select name="kategori" id="kategori" class="form-control">
                                                        <option value="">Pilih Kategori</option>
                                                        <?php foreach ($kategori as $k) : ?>
                                                            <?php if ($edit_surat['id_kategori'] == $k['id_kategori']) : ?>
                                                                <option value="<?= $k['id_kategori']; ?>" selected><?= $k['nm_kategori']; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $k['id_kategori']; ?>"><?= $k['nm_kategori']; ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <select name="bidang" id="bidang" class="form-control">
                                                        <option value="">Pilih Bidang</option>
                                                        <?php foreach ($bidang as $b) : ?>
                                                            <?php if ($edit_surat['id_bidang'] == $b['id']) : ?>
                                                                <option value="<?= $b['id']; ?>" selected><?= $b['nm_bidang']; ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $b['id']; ?>"><?= $b['nm_bidang']; ?></option>
                                                            <?php endif; ?>

                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Persyaratan</label>
                                                    <input type="text" class="form-control" id="syarat" name="syarat" value="<?= $edit_surat['syarat']; ?>">
                                                </div>
                                                <button type="Submit" class="btn btn-warning">Edit</button>
                                            </div>
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

</div>
</div>



</body>