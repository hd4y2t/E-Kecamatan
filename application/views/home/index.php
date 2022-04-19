  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative mt-5" data-aos="fade-in" data-aos-delay="200">

      <img src="<?= base_url('assets/'); ?>img/favicon.gif" class="img-fluid mt-5" alt="">

      <h1>E-Kecamatan <?= $profile['kecamatan'] ?></h1>
      <h2>Web Portal Kecamatan <?= $profile['kecamatan'] ?></h2>
      <a href="<?= base_url('home/s_online') ?>" class="btn-get-started scrollto">Ajui Surat</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= profile Section ======= -->
    <section id="profile" class="profile">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <h2>Kecamatan <?= $profile['kecamatan']; ?></h2>
            <h3><?= $profile['detail']; ?></h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <p>
              Kecamatan <?= $profile['kecamatan']; ?> Memiliki <?= $n_kelurahan; ?> kelurahan
              <br>
              antaranya :
            </p>
            <ul>
              <?php foreach ($kelurahan as $m) : ?>
                <li><i class="ri-check-double-line"></i> <?= $m['nm_kelurahan']; ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End profile Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container-center">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $antrian; ?></span>
            <p>Jumlah Antrian Surat</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $surat; ?></span>
            <p>Surat yang dapat diajukan</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $n_kelurahan; ?></span>
            <p>Jumlah Kelurahan</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $user; ?></span>
            <p>Admin Sistem</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
    <section id="team" class="team">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>Pimpinan Kecamatan</h2>

            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">

              <div class="col-lg-6">
                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                  <div class="pic">
                    <img src="<?= base_url('assets/') ?>img/testimonials/<?= $profile['f_camat']; ?>" class="img-fluid" alt="">
                  </div>
                  <div class="member-info">
                    <h4><?= $profile['camat']; ?></h4>
                    <span>Pimpinan Kecamatan</span>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="member" data-aos="zoom-in" data-aos-delay="200">
                  <div class="pic">
                    <img src="<?= base_url('assets/') ?>img/testimonials/<?= $profile['f_sekcam']; ?>" class="img-fluid" alt="">
                  </div>
                  <div class="member-info">
                    <h4><?= $profile['sekcam']; ?></h4>
                    <span>Sekretaris Kecamatan</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Team Section -->
    <!-- ======= Why Us Section ======= -->


    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center" data-aos="zoom-in">
          <h3>Pengajuan Surat</h3>
          <p> Sistem ini dibuat agar mempermudah warga kecamatan dalam mengajukan persyaratan dan menghindari human error</p>
          <a class="cta-btn" href="<?= base_url('home/s_online') ?>">Ajukan</a>
        </div>

      </div>
    </section><!-- End Cta Section -->
    <!-- End Testimonials Section -->

    <!-- ======= Cta Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
            <div class="content">
              <h3>Tata cara mengajukan persyaratan di sistem</h3>
              <p>
                Perhatikan Tata cara agar dapat mengajukan persyaratan dengan benar
              </p>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Perhatikan Persyaratan Surat</h4>
                    <p>Persyaratan dapat dilihat dihalaman Info Layanan</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Scan Berkas dengan Camscanner</h4>
                    <p>Camscanner dapat di unduh di </p>
                    <p><a class="btn btn-outline-success btn-sm" target="blank" href="https://play.google.com/store/apps/details?id=com.intsig.camscanner&hl=en&gl=US">Playstore</a>
                    </p><a class="btn btn-outline-primary btn-sm" target="blank" href="https://apps.apple.com/us/app/camscanner-pdf-scanner-app/id388627783">Appstore</a>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Upload berkas di website pengajuan persyaratan</h4>
                    <p>Isi identitas diri dengan benar dan pilih surat yang ingin dibuat lalu pilih berkas dan ajukan surat</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Team Section ======= -->

    <!-- End Why
    ======= Contact Section ======= -->
    <section class="section-bg">
      <div class="contact" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-lg-4" data-aos="fade-right">
              <div class="section-title">
                <h2>Kontak</h2>
                <p>Kontak Kecamatan yang dapat dihubungi</p>
              </div>
            </div>

            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
              <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.5477922222744!2d104.80676301538426!3d-2.945343540518121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b771ac0026635%3A0x10e2896ca36953df!2sKantor%20Camat%20Sematang%20Borang!5e0!3m2!1sid!2sbg!4v1616248775092!5m2!1sid!2sbg" frameborder="0" allowfullscreen></iframe>
              <!-- <iframe src="https://docs.google.com/document/d/1rsJwH7sYnOm1XJ-J_Up1F3Kk0poSU_Zng3bxf_sUWZM/edit&embedded=true" width="600" height="780" style="border: none;"></iframe> -->
              <div class="info">
                <i class="icofont-google-map"></i>
                <h4>Lokasi:</h4>
                <p><?= $profile['lokasi']; ?></p>

                <div class="mt-4 mb-4">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p><?= $profile['email']; ?></p>
                </div>

                <i class="icofont-phone"></i>
                <h4>WhatsApp:</h4>
                <p><a target="blank" href="https://wa.me/<?= $profile['no']; ?>"> <?= $profile['no']; ?></a></p>
              </div>
            </div>
          </div>

        </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->