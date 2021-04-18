<div class="content" data-color="#d6fad6" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">

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
                                                        <input type="text" class="form-control" id="s_pemerintahan" name="s_pemerintahan" value="<?= $profile['s_pemerintahan']; ?>">

                                                        <div class=" form-group row">
                                                            <div class="col-sm-2">Foto</div>
                                                            <div class="col-sm-10">
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <img id="gambar" src="<?= base_url('assets/img/testimonials/') . $profile['f_pemerintahan']; ?>" class="img-thumbnail">
                                                                    </div>
                                                                    <div class="col-sm-9">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="foto" name="foto">
                                                                            <label class="custom-file-label" id="pilih" for="foto">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Nama Seksi Trantib</label>
                                                        <input type="text" class="form-control" id="s_trantib" name="s_trantib" value="<?= $profile['s_trantib']; ?>">

                                                        <div class=" form-group row">
                                                            <div class="col-sm-2">Foto</div>
                                                            <div class="col-sm-10">
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <img id="gambar" src="<?= base_url('assets/img/testimonials/') . $profile['f_trantib']; ?>" class="img-thumbnail">
                                                                    </div>
                                                                    <div class="col-sm-9">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="foto" name="foto">
                                                                            <label class="custom-file-label" id="pilih" for="foto">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Nama Seksi Perlindungan Masyarakat</label>
                                                        <input type="text" class="form-control" id="s_perlindung" name="s_perlindung" value="<?= $profile['s_pelindung']; ?>">

                                                        <div class=" form-group row">
                                                            <div class="col-sm-2">Foto</div>
                                                            <div class="col-sm-10">
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <img id="gambar" src="<?= base_url('assets/img/testimonials/') . $profile['f_pelindung']; ?>" class="img-thumbnail">
                                                                    </div>
                                                                    <div class="col-sm-9">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="foto" name="foto">
                                                                            <label class="custom-file-label" id="pilih" for="foto">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Nama Seksi Pemberdayaan Sosial</label>
                                                        <input type="text" class="form-control" id="s_sosial" name="s_sosial" value="<?= $profile['s_sosial']; ?>">
                                                        <div class=" form-group row">
                                                            <div class="col-sm-2">Foto</div>
                                                            <div class="col-sm-10">
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <img id="gambar" src="<?= base_url('assets/img/testimonials/') . $profile['f_sosial']; ?>" class="img-thumbnail">
                                                                    </div>
                                                                    <div class="col-sm-9">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="foto" name="foto">
                                                                            <label class="custom-file-label" id="pilih" for="foto">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Nama Seksi Pembangungan</label>
                                                        <input type="text" class="form-control" id="s_pembangunan" name="s_pembangunan" value="<?= $profile['s_pembangunan']; ?>">

                                                        <div class=" form-group row">
                                                            <div class="col-sm-2">Foto</div>
                                                            <div class="col-sm-10">
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <img id="gambar" src="<?= base_url('assets/img/testimonials/') . $profile['f_pembangunan']; ?>" class="img-thumbnail">
                                                                    </div>
                                                                    <div class="col-sm-9">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="foto" name="foto">
                                                                            <label class="custom-file-label" id="pilih" for="foto">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $profile['kecamatan']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Detail Kecamatan</label>
                                                        <textarea class="form-control" id="detail" name="detail" rows="3"><?= $profile['detail']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Lokasi</label>
                                                        <textarea class="form-control" id="lokasi" name="lokasi" rows="2"><?= $profile['lokasi']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Email Kecamatan</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="<?= $profile['email']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">No Telp</label>
                                                        <input type="text" class="form-control" id="no" name="no" value="<?= $profile['no']; ?>">
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
</body>