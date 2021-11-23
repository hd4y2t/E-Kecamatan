 <section class="breadcrumbs">
     <div class="container">

         <div class="d-flex justify-content-between align-items-center">
             <h2>Info Layanan</h2>
             <ol>
                 <li><a href="<?= base_url('home') ?>">Home</a></li>
                 <li>Info Layanan</li>
             </ol>
         </div>

     </div>
 </section><!-- End Breadcrumbs -->

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
                                 <p>Persyaratan dapat dilihat dihalaman pengajuan surat</p>
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

 <section class="section-bg">
     <div class="contact" id="contact">
         <div class="container">
             <div class="row">
                 <div class="col-lg-4" data-aos="fade-right">
                     <div class="section-title">
                         <h2>Surat Perizinan</h2>
                         <p>Layanan Rekomendasi atau pengesahan yang dapat warga ajukan di kantor kecamatan</p>
                     </div>
                 </div>

                 <div class="col-lg-8 mb-3" data-aos="fade-up" data-aos-delay="100">
                     <div class="info">
                         <?php foreach ($suratIzin as $si) : ?>
                             <i class="icofont-file-alt"></i>
                             <h4><?= $si['nm_surat'] ?></h4>
                             <p class="font-weight-bold">Persyaratan : </p>
                             <p class="mb-3"><?= $si['syarat'] ?></p>
                         <?php endforeach ?>
                     </div>
                 </div>
                 <div class="col-lg-4 mt-3" data-aos="fade-right">
                     <div class="section-title">
                         <h2>Surat Non Perizinan</h2>
                         <p>Layanan Rekomendasi atau pengesahan yang dapat warga ajukan di kantor kecamatan</p>
                     </div>
                 </div>

                 <div class="col-lg-8 mt-3" data-aos="fade-up" data-aos-delay="100">
                     <div class="info">
                         <?php foreach ($suratNonIzin as $si) : ?>
                             <i class="icofont-file-alt"></i>
                             <h4><?= $si['nm_surat'] ?></h4>
                             <p class="font-weight-bold">Persyaratan : </p>
                             <p class="mb-3"><?= $si['syarat'] ?></p>
                         <?php endforeach ?>
                     </div>
                 </div>
             </div>

         </div>

 </section><!-- End Contact Section -->

 <!-- </section> -->

 </main><!-- End #main -->