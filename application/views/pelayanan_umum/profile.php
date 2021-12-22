<div class="content" data-color="#d6fad6" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <?php if ($this->session->flashdata('success') == TRUE) : ?>
            <div class="alert alert-success">
                <span><?= $this->session->flashdata('success'); ?></span>
            </div>
        <?php endif; ?>
        <?php echo form_open_multipart('admin/profile'); ?>

        <div class="row ">

            <div class="col-sm-6">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title">Pimpinan Kecamatan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">

                                        <div class="table-responsive">

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Nama Pimpinan Camat</label>
                                                    <input type="text" class="form-control" id="camat" name="camat" value="<?= $profile['camat']; ?>">

                                                    <div class=" form-group row">
                                                        <div class="col-sm-2">Foto</div>
                                                        <div class="col-sm-10">
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <img id="f_camat" src="<?= base_url('assets/img/testimonials/') . $profile['f_camat']; ?>" class="img-thumbnail">
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="foto_camat" name="foto_camat" value="<?= $profile['f_camat']; ?>">
                                                                        <label class="btn btn-outline-success btn-sm" id="pilih" for="foto_camat"><i class="material-icons">search</i></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Nama Sekretaris Camat</label>
                                                    <input type="text" class="form-control" id="sekcam" name="sekcam" value="<?= $profile['sekcam']; ?>">

                                                    <div class=" form-group row">
                                                        <div class="col-sm-2">Foto</div>
                                                        <div class="col-sm-10">
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <img id="f_sekcam" src="<?= base_url('assets/img/testimonials/') . $profile['f_sekcam']; ?>" class="img-thumbnail">
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="foto_sekcam" name="foto_sekcam" value="<?= $profile['f_sekcam']; ?>">
                                                                        <label class="btn btn-outline-success btn-sm" id="pilih1" for="foto_sekcam"><i class="material-icons">search</i></label>
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
            <div class="col-sm-6">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">

                                        <div class="table-responsive">

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
                                                <!-- <div class="modal-footer">
                                                        <button type="Submit" class="btn btn-success">Simpan</button>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="Submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
    $('foto_camat').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('pilih').addClass("selected").html(fileName);
    });

    var tm_pilih = document.getElementById('pilih');
    var file = document.getElementById('foto_camat');
    tm_pilih.addEventListener('click', function() {
        file.click();
    })
    file.addEventListener('change', function() {
        f_camat(this);
    })

    $('foto_sekcam').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('pilih1').addClass("selected").html(fileName);
    });

    var tm_pilih = document.getElementById('pilih1');
    var file = document.getElementById('foto_sekcam');
    tm_pilih.addEventListener('click', function() {
        file.click();
    })
    file.addEventListener('change', function() {
        f_sekcam(this);
    })


    // function gambar(a) {
    //     if (a.files && a.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function(e) {
    //             document.getElementById('foto_camat').src = e.target.result;
    //         }
    //         reader.readAsDataURL(a.files[0]);
    //     }

    // }

    // function gambar(b) {
    //     if (b.files && b.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function(i) {
    //             document.getElementById('foto_sekcam').src = i.target.result;
    //         }
    //         reader.readAsDataURL(b.files[0]);
    //     }

    // }
</script>
</body>