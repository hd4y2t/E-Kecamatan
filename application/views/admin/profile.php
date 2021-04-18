<div class="content" data-color="#d6fad6" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-6">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <?= form_error('bidang', '<div class="text-danger" bidang="alert">', '</div>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <div class="row">
                                    <div class="col">

                                        <div class="table-responsive">

                                            <form action="<?= base_url('pegawai/bidang'); ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Nama Kecamatan</label>
                                                        <input type="text" class="form-control" id="bidang" name="bidang" value="<?= $profile['kecamatan']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Detail Kecamatan</label>
                                                        <textarea class="form-control" id="bidang" name="bidang" rows="4"><?= $profile['detail']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Lokasi</label>
                                                        <textarea class="form-control" id="bidang" name="bidang" rows="2"><?= $profile['lokasi']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Email Kecamatan</label>
                                                        <input type="text" class="form-control" id="bidang" name="bidang" value="<?= $profile['email']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">No Telp</label>
                                                        <input type="text" class="form-control" id="bidang" name="bidang" value="<?= $profile['no']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="Submit" class="btn btn-success">Simpan</button>
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
            <div class="col-sm-6">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title">Seksi Kecamatan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">

                                        <div class="table-responsive">

                                            <form action="<?= base_url('pegawai/bidang'); ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Nama Seksi Pemerintahan</label>
                                                        <input type="text" class="form-control" id="bidang" name="bidang" value="<?= $profile['s_pemerintahan']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Nama Seksi Trantib</label>
                                                        <input type="text" class="form-control" id="bidang" name="bidang" value="<?= $profile['s_trantib']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Nama Seksi Perlindungan Masyarakat</label>
                                                        <input type="text" class="form-control" id="bidang" name="bidang" value="<?= $profile['s_pelindung']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Nama Seksi Pemberdayaan Sosial</label>
                                                        <input type="text" class="form-control" id="bidang" name="bidang" value="<?= $profile['s_sosial']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Nama >Seksi Pembangungan</label>
                                                        <input type="text" class="form-control" id="bidang" name="bidang" value="<?= $profile['s_pembangunan']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="Submit" class="btn btn-success">Simpan</button>
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
    </div>
</div>


<div class="modal fade" id="lihatSurat<?= $profile['f_camat']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title text-center" id="myModalLabel">Kepala Kecamatan</h5>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('assets/img/testimonials') ?>/<?= $profile['f_camat'] ?>"></embed>
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
<div class="modal fade" id="lihatSurat<?= $profile['f_sekcam']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title text-center" id="myModalLabel">Kepala Kecamatan</h5>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('assets/img/testimonials') ?>/<?= $profile['f_sekcam'] ?>"></embed>
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
<div class="modal fade" id="lihatSurat<?= $profile['f_pemerintahan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title text-center" id="myModalLabel">Kepala Kecamatan</h5>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('assets/img/testimonials') ?>/<?= $profile['f_pemerintahan'] ?>"></embed>
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
<div class="modal fade" id="lihatSurat<?= $profile['f_trantib']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title text-center" id="myModalLabel">Kepala Kecamatan</h5>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('assets/img/testimonials') ?>/<?= $profile['f_trantib'] ?>"></embed>
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
<div class="modal fade" id="lihatSurat<?= $profile['f_pelindung']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title text-center" id="myModalLabel">Kepala Kecamatan</h5>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('assets/img/testimonials') ?>/<?= $profile['f_pelindung'] ?>"></embed>
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
<div class="modal fade" id="lihatSurat<?= $profile['f_sosial']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title text-center" id="myModalLabel">Kepala Kecamatan</h5>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('assets/img/testimonials') ?>/<?= $profile['f_sosial'] ?>"></embed>
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
<div class="modal fade" id="lihatSurat<?= $profile['f_pembangunan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title text-center" id="myModalLabel">Kepala Kecamatan</h5>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('assets/img/testimonials') ?>/<?= $profile['f_pembangunan'] ?>"></embed>
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