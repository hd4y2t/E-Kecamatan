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
                                                                                <!-- <a class="btn btn-simple btn-info btn-sm text-white" data-toggle="modal" data-target="#lihatSurat<?= $isi_surat['pengaju_id']; ?>"><i class="material-icons">remove_red_eye</i></a> -->
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Nomor Surat</label>
                                                                                    <input type="text" class="form-control" id="no_surat" name="no_surat">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <a>Isi Surat</a>
                                                                                    <textarea type="text" class="form-control" id="isi_surat" name="isi_surat"></textarea>
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