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
                            <div class="card-body" align='center'>
                                <?= form_open_multipart('user/edit_profile'); ?>
                                <div class="form-group row">
                                    <label for="ni" class="col-sm-2 col-form-label">Nomor Induk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="ni" name="ni" value="<?= $user['ni']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                                        <?= form_error('nama', '<small class="text-danger-pl-3">', '</small'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">Foto</div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img id="gambar" src="<?= base_url('assets/img/profile/') . $user['foto']; ?>" class="img-thumbnail">
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
                                <div class=" form-group row">
                                    <div class="col-sm 10">
                                        <button type="submit" class="btn btn-success">Edit</button>
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
<script type="text/javascript">
    // $('foto').on('change', function() {
    //     let fileName = $(this).val().split('\\').pop();
    //     $(this).next('pilih').addClass("selected").html(fileName);
    // });
    var tm_pilih = document.getElementById('pilih');
    var file = document.getElementById('foto');
    tm_pilih.addEventListener('click', function() {
        file.click();
    })
    file.addEventListener('change', function() {
        gambar(this);
    })

    function gambar(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar').src = e.target.result;
            }
            reader.readAsDataURL(a.files[0]);
        }

    }
    // $("#foto").change(function() {
    //     bacaGambar(this);
    // });

    // function bacaGambar(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function(e) {
    //             $('#gambar').attr('src', e.target.result);
    //         }

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
</script>