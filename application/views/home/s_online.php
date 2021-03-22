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
                                    <h3 class="section-subheading text-muted">Pengajuan Surat Online</h3>
                                    <p class="section-subheading text-muted">Isi Form Pengajuan Surat Dibawah:</p>
                                </div>
                                <div class="text-justify pl pr">
                                    <?= form_open_multipart('suratonline/ajukan', 'id="ajukanSurat"') ?>
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
                                        <label for="file">File Berkas/Lampiran <sup class="text-danger">*PDF Recommended! | Max 5MB</sup></label>
                                        <?= form_upload(['name' => 'file', 'id' => 'file', 'class' => 'form-control']) ?>
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
                            <svg id="mute-audio" xmlns="<?= base_url('assets/img/undraw/') ?>/undraw_Project_completed_re_pqqq.svg" width="100%" height="100%" viewBox="-10 -10 68 68">
                                <path class="on" transform="scale(0.6), translate(17,18)" d="M38 22h-3.4c0 1.49-.31 2.87-.87 4.1l2.46 2.46C37.33 26.61 38 24.38 38 22zm-8.03.33c0-.11.03-.22.03-.33V10c0-3.32-2.69-6-6-6s-6 2.68-6 6v.37l11.97 11.96zM8.55 6L6 8.55l12.02 12.02v1.44c0 3.31 2.67 6 5.98 6 .45 0 .88-.06 1.3-.15l3.32 3.32c-1.43.66-3 1.03-4.62 1.03-5.52 0-10.6-4.2-10.6-10.2H10c0 6.83 5.44 12.47 12 13.44V42h4v-6.56c1.81-.27 3.53-.9 5.08-1.81L39.45 42 42 39.46 8.55 6z" fill="white" />

                                <path class="off" transform="scale(0.6), translate(17,18)" d="M24 28c3.31 0 5.98-2.69 5.98-6L30 10c0-3.32-2.68-6-6-6-3.31 0-6 2.68-6 6v12c0 3.31 2.69 6 6 6zm10.6-6c0 6-5.07 10.2-10.6 10.2-5.52 0-10.6-4.2-10.6-10.2H10c0 6.83 5.44 12.47 12 13.44V42h4v-6.56c6.56-.97 12-6.61 12-13.44h-3.4z" fill="white" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    </main><!-- End #main -->