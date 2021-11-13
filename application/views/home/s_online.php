<div id="hero">
    <section class="page-section">
        <div class="container-fluid">
            <div class="row">
                <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
                    <div class="card">
                        <div class="col">
                            <div class="card-body text-justify pl-5 pr-5">
                                <?php if ($this->session->flashdata('success') == TRUE) : ?>
                                    <?= $this->session->flashdata('success'); ?>
                                <?php endif; ?>
                                <div class="text-center">
                                    <h1 class="section-subheading text-muted">Pengajuan Surat Online</h1>
                                    <p class="section-subheading text-muted">Isi Form Pengajuan Surat Dibawah:</p>
                                </div>
                                <div class="text-justify pl pr">
                                    <?= form_open_multipart('home/s_online', 'id="ajukanSurat"') ?>
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <input type="number" name="nik" class="form-control" id="nik" placeholder="Nomor Induk Kependudukan" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                            <div class="validate"></div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" data-rule="minlen:4" data-msg="Please enter a valid email" />
                                            <div class="validate"></div>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Hp/W.a" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                            <div class="validate"></div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select name="surat" id="surat" class="form-control">
                                                <option value="">Pilih Surat</option>
                                                <?php foreach ($surat as $s) : ?>
                                                    <option value="<?= $s['id_surat']; ?>"><?= $s['nm_surat']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="file">File Berkas/Lampiran <sup class="text-danger">*PDF Recommended! | Max 5MB</sup></label>
                                            <?= form_upload(['name' => 'file', 'id' => 'file', 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                            <div class="validate"></div>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <div class="loading">Persyaratan :</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>
                                    </div>

                                    <div class="get-started text-center"><button class="btn btn-success" type="submit">Kirim Permohonan</button></div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <section class="page-section">

    </section>
    </main><!-- End #main -->