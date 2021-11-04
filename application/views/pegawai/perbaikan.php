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
                                                                            <label class="bmd-label-floating">ID Pengaju : <?= $isi_surat['pengaju_id']; ?></label>
                                                                            <!-- <a class="btn btn-simple btn-info btn-sm text-white" data-toggle="modal" data-target="#lihatSurat<?= $isi_surat['pengaju_id']; ?>"><i class="material-icons">remove_red_eye</i></a> -->
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Nomor Surat</label>
                                                                                <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $isi_surat['no_surat']; ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="label-control">File Surat</label>
                                                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                                    <div class="fileinput-new thumbnail">
                                                                                        <!-- <img src="<?= base_url() ?>assets/save.png" alt="..."> -->
                                                                                    </div>
                                                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                                    <div>
                                                                                        <span class="btn btn-danger btn-file">
                                                                                            <i class="material-icons">cloud_upload</i>
                                                                                            <span class="fileinput-new">Select File</span>
                                                                                            <span class="fileinput-exists">Change</span>
                                                                                            <input type="file" name="file_surat" id="file_surat" />
                                                                                        </span>
                                                                                        <!-- <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i></a> -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?= form_error('file_surat', '<div class="text-danger">', '</div>'); ?>
                                                                            <!-- <div class="form-group">
                                                                                <a>Isi Surat</a>
                                                                                <textarea type="text" class="form-control" id="isi_surat" name="isi_surat"></textarea>
                                                                            </div> -->
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
                                            <div class="col-sm-5">
                                                <div class="content">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <label class="bmd-label-floating">Berkas Pengaju : <?= $isi_surat['pengaju_id']; ?></label>
                                                            <embed type="application/pdf" width="100%" height="580px;" src="<?= base_url('upload/berkas/') . $isi_surat['file'] ?>"></embed>
                                                            <!-- <iframe width="100%" height="800" src="https://www.ilovepdf.com/id/tanda-tangani-pdf"></iframe> -->
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