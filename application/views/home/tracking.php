<div id="hero">
    <section class="page-section">
        <div class="container-fluid">
            <div class="row">
                <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
                    <div class="card">
                        <?php if ($this->session->flashdata('message') == TRUE) : ?>
                            <?= $this->session->flashdata('message'); ?>
                        <?php endif; ?>
                        <div class="card-body text-center pl-5 pr-5">

                            <div class="text-center pl pr">
                                <div class="text-center">
                                    <h1 class="section-subheading text-muted">Cek Status Surat Online</h1>
                                </div>
                                <p class="section-subheading text-muted">Masukkan ID Surat untuk Pengecekan</p>

                                <div class="form-col">
                                    <?= form_open('home/cariSurat', 'id="tracking", class="card card-sm"') ?>

                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" name="trackid" placeholder="Masukkan ID Pengajuan Anda">

                                        <button class="btn btn-lg btn-success" type="submit">Cari</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                                <?= form_close() ?>
                            </div>


                            <!-- <div class="get-started text-center"><button class="get-started" type="submit">Kirim Permohonan</button></div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

</section><!-- End Hero -->

</main><!-- End #main -->