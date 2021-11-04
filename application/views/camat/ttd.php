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
                                            <div class="col-sm-4">
                                                <div class="content">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="table-responsive">
                                                                        <?php echo form_open_multipart(); ?>
                                                                        <div class="modal-body">
                                                                            <label class="bmd-label-floating">Unduh file :<a class="btn btn-success btn-sm" href="<?= base_url('camat/download/' . $surat_keluar['id']); ?>"><i class="material-icons">download</i></a></label>
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Nomor Surat : <?= $surat_keluar['no_surat'] ?></label>
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
                                                                                            <input type="file" name="file_surat" id="file_surat" />
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?= form_error('file_surat', '<div class="text-danger">', '</div>'); ?>
                                                                            <button class="btn btn-success" type="Submit"> Simpan </button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="content">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label class="bmd-label-floating">Nomor surat : <?= $surat_keluar['no_surat']; ?></label>
                                                            <iframe width=" 100%" height="600px" src="<?= $profile['paraf'] ?>" style="min-height: 600;"></iframe>
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