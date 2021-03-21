  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">

      <img src="<?= base_url('assets/'); ?>img/favicon.gif" class="img-fluid" alt="">

      <h1>E-Kecamatan Sematang Borang</h1>
      <h2>Website Pengajuan Persyaratan Online</h2>
      <a href="<?= base_url('home/s_online') ?>" class="btn-get-started scrollto">Ajukan Persyaratan Surat</a>
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
              Kecamatan S<?= $profile['kecamatan']; ?> Memiliki 4 kelurahan
              <br>
              antaranya :
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Karya Mulya</li>
              <li><i class="ri-check-double-line"></i> Lebong/Lebung Gajah</li>
              <li><i class="ri-check-double-line"></i> Srimulya</li>
              <li><i class="ri-check-double-line"></i> Suka Mulya</li>
            </ul>
            <!-- <p class="font-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p> -->
          </div>
        </div>

      </div>
    </section><!-- End profile Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container-center">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $surat; ?></span>
            <p>Surat yang dapat diajukan</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $penduduk; ?></span>
            <p>Penduduk yang menggunakan sistem</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $antrian; ?></span>
            <p>Jumlah Antrian Surat</p>
          </div>


          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $user; ?></span>
            <p>Admin Sistem</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
            <div class="content">
              <h3>Tata cara mengajukan persyayratan di sistem</h3>
              <p>
                Perhatikan Tata cara agar dapat mengajukan persyaratan dengan benar
              </p>
              <!-- <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div> -->
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Perhatikan Persyaratan Surat</h4>
                    <p>Persyaratan dapat dilihat dihalaman pengajuan surat</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Scan Berkas dengan Camscanner</h4>
                    <p>Camscanner dapat di unduh di playstore/Appstore</p>
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

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="text-center" data-aos="zoom-in">
          <h3>Pengajuan Surat</h3>
          <p> Sistem ini dibuat agar mempermudah warga kecamatan dalam mengajukan persyaratan dan menghindari human error</p>
          <a class="cta-btn" href="#">Ajukan</a>
        </div>

      </div>
    </section><!-- End Cta Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-left">
          <h2>API INSTAGRAM KECAMATAN</h2>
          <p>Galery pada instagram Kecamatan Sematang Borang</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?= base_url(''); ?>assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="<?= base_url(''); ?>assets/img/portfolio/portfolio-1.jpg" class="venobox"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="<?= base_url(''); ?>assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="<?= base_url(''); ?>assets/img/portfolio/portfolio-2.jpg" class="venobox"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?= base_url(''); ?>assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="<?= base_url(''); ?>assets/img/portfolio/portfolio-3.jpg" class="venobox"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">

      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>Pimpinan Kecamatan</h2>
            </div>
          </div>
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
            <div class="owl-carousel testimonials-carousel">
              <div class="testimonial-item">
                <h3><?= $profile['camat']; ?></h3>
                <h4>Kepala Kecamatan</h4>

                <!-- <div class="member" data-aos="zoom-in" data-aos-delay="100"> -->
                <img src="<?= base_url('assets/') ?>img/testimonials/<?= $profile['f_camat']; ?>" class="testimonial-image" alt="">
                <!-- </div> -->
                <!-- <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p> -->
              </div>

              <div class="testimonial-item">
                <h3><?= $profile['sekcam']; ?></h3>
                <h4>Sekretaris Kecamatan</h4>
                <!-- <div class="member" data-aos="zoom-in" data-aos-delay="100"> -->
                <img src="<?= base_url('assets/') ?>img/testimonials/<?= $profile['f_sekcam']; ?>" class="testimonial-image" alt="">
                <!-- </div> -->
                <!-- <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>Seksi Kecamatan</h2>

            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">

              <div class="col-lg-6">
                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                  <div class="pic"><img src="<?= base_url('assets/') ?>img/testimonials/<?= $profile['f_pemerintahan']; ?>" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4><?= $profile['s_pemerintahan']; ?></h4>
                    <span>Seksi Pemerintahan</span>
                    <!-- <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p> -->
                    <!-- <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div> -->
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="member" data-aos="zoom-in" data-aos-delay="200">
                  <div class="pic"><img src="<?= base_url('assets/') ?>img/testimonials/<?= $profile['f_trantib']; ?>" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4><?= $profile['s_trantib']; ?></h4>
                    <span>Seksi Trantib</span>
                    <!-- <p>Aut maiores voluptates amet et quis praesentium qui senda para</p> -->
                    <!-- <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div> -->
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4">
                <div class="member" data-aos="zoom-in" data-aos-delay="300">
                  <div class="pic"><img src="<?= base_url('assets/') ?>img/testimonials/<?= $profile['f_pelindung']; ?>" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4><?= $profile['s_pelindung']; ?></h4>
                    <span>Seksi Perlindungan Masyarakat</span>
                    <!-- <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p> -->
                    <!-- <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div> -->
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4">
                <div class="member" data-aos="zoom-in" data-aos-delay="400">
                  <div class="pic"><img src="<?= base_url('assets/') ?>img/testimonials/<?= $profile['f_sosial']; ?>" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4><?= $profile['s_sosial']; ?></h4>
                    <span>Seksi Kesejahteraan Sosial</span>
                    <!-- <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p> -->
                    <!-- <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div> -->
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4">
                <div class="member" data-aos="zoom-in" data-aos-delay="400">
                  <div class="pic"><img src="<?= base_url('assets/') ?>img/testimonials/<?= $profile['f_pembangunan']; ?>" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4><?= $profile['s_pembangunan']; ?></h4>
                    <span>Seksi Pembangunan</span>
                    <!-- <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p> -->
                    <!-- <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div> -->
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- End Why
    <!-- ======= Contact Section ======= -->
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
              <div class="info mt-4">
                <i class="icofont-google-map"></i>
                <h4>Lokasi:</h4>
                <p><?= $profile['lokasi']; ?></p>
              </div>
              <div class="row">
                <div class="col-lg-6 mt-4">
                  <div class="info">
                    <i class="icofont-envelope"></i>
                    <h4>Email:</h4>
                    <p><?= $profile['email']; ?></p>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="info w-100 mt-4">
                    <i class="icofont-phone"></i>
                    <h4>Telpon/WhatsApp:</h4>
                    <p><?= $profile['no']; ?></p>
                  </div>
                </div>
              </div>

              <!-- <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col-md-6 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form> -->
            </div>

          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->