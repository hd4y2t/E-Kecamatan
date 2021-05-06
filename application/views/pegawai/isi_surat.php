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
                                            <div class="col-sm">
                                                <div class="content">
                                                    <div class="container-fluid">
                                                        <div class="card">
                                                            <!-- <div class="card-header card-header-success">
                                                                        <h3 class="card-title">Seksi Kecamatan</h3>
                                                                    </div> -->
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="table-responsive">
                                                                            <!-- <iframe width="100%" height="800" src="https://www.ilovepdf.com/id/tanda-tangani-pdf"></iframe> -->
                                                                            <form action="" method="post">
                                                                                <div class="modal-body">
                                                                                    <label class="bmd-label-floating">ID Pengaju : <?= $isi_surat['pengaju_id']; ?></label>
                                                                                    <button class="btn btn-simple btn-info btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $isi_surat['pengaju_id']; ?>"><i class="material-icons">remove_red_eye</i></button>
                                                                                    <div class="form-group">
                                                                                        <label class="bmd-label-floating">Nomor Surat</label>
                                                                                        <input type="text" class="form-control" id="no_surat" name="no_surat">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="bmd-label-floating">Tujuan Surat</label>
                                                                                        <input type="text" class="form-control" id="tujuan" name="tujuan">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="bmd-label-floating">Jenis Surat</label>
                                                                                        <input type="text" class="form-control" id="jenis" name="jenis">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Isi Surat</label>
                                                                                        <textarea name="editor" type="text" class="form-control" id="isi_surat" name="isi_surat"></textarea>
                                                                                    </div>
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
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <div class="content">
                                                    <div class="container-fluid">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <label class="bmd-label-floating">Berkas Pengaju : <?= $isi_surat['pengaju_id']; ?></label>
                                                                <embed type="application/pdf" width="100%" height="580px;" src="<?= base_url('upload/berkas/') . $isi_surat['file'] ?>"></embed>
                                                                <iframe width="100%" height="800" src="https://www.ilovepdf.com/id/tanda-tangani-pdf"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
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
<div class="modal fade" id="lihatSurat<?= $isi_surat['pengaju_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class=" modal-content" style="width:75%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title text-center" id="myModalLabel"> ID Pengaju: <?= $isi_surat['pengaju_id']; ?></h5>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-8">
                            <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/berkas/') . $isi_surat['file'] ?>"></embed>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


</body>