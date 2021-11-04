<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg">
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
                                            <div class="col-sm-7">
                                                <div class="content">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="table-responsive">
                                                                        <?php echo form_open_multipart(); ?>
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Nomor Surat</label>
                                                                                <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $masuk['no_surat'] ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Jenis Surat</label>
                                                                                <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $masuk['jenis'] ?>">
                                                                            </div>
                                                                            <div class=" form-group">
                                                                                <label class="bmd-label-floating">Nama Surat</label>
                                                                                <input type="text" class="form-control" id="nm_surat_masuk" name="nm_surat_masuk" value="<?= $masuk['nm_surat_masuk'] ?>">
                                                                            </div>
                                                                            <div class=" form-group">
                                                                                <label class="bmd-label-floating">Keterangan</label>
                                                                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $masuk['keterangan'] ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">File Surat</label>
                                                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                                    <div class="fileinput-new thumbnail">
                                                                                    </div>
                                                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                                    <div>
                                                                                        <span class="btn btn-danger btn-file">
                                                                                            <i class="material-icons">cloud_upload</i>
                                                                                            <span class="fileinput-new">Select File</span>
                                                                                            <span class="fileinput-exists">Change</span>
                                                                                            <input type="file" name="file_surat" id="file_surat">
                                                                                        </span>
                                                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?= form_error('file_surat', '<div class="text-danger">', '</div>'); ?>
                                                                            <div class="modal-footer">
                                                                                <a href="<?= base_url('loket/surat_masuk') ?>" class="btn btn-secondary" data-dismiss="modal">Keluar</a>
                                                                                <button type="Submit" class="btn btn-primary">Edit</button>
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
                                            <div class="col-sm-5">
                                                <div class="content">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label class="bmd-label-floating">Berkas Surat : <?= $masuk['no_surat']; ?></label>
                                                            <embed type="application/pdf" width="100%" height="580px;" src="<?= base_url('upload/surat_masuk/') . $masuk['file'] ?>"></embed>
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
            </div>
        </div>
    </div>
</div>



</body>