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
                                <?= form_error('kategori', '<div class="text-danger" kategori="alert">', '</div>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Nama Kategori</label>
                                                    <input type="text" class="form-control" id="nm_kategori" name="nm_kategori" value="<?= $edit_kategori['nm_kategori']; ?>">
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