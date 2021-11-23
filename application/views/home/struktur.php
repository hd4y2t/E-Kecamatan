 <section class="breadcrumbs">
     <div class="container">

         <div class="d-flex justify-content-between align-items-center">
             <h2>Struktur Organisasi</h2>
             <ol>
                 <li><a href="<?= base_url('home') ?>">Home</a></li>
                 <li>Struktur</li>
             </ol>
         </div>

     </div>
 </section><!-- End Breadcrumbs -->

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
 </section>

 <section class="section-bg">
     <div class="contact" id="contact">
         <div class="container">
             <div class="row">
                 <div class="col-lg-4" data-aos="fade-right">
                     <div class="section-title">
                         <h2>Struktur Organisasi</h2>
                         <p>Pimpinan yang ada di kecamatan <?= $profile['kecamatan'] ?></p>
                     </div>
                 </div>

                 <div class="col-lg-8 mb-3" data-aos="fade-up" data-aos-delay="100">
                     <div class="info">
                         <img src="<?= base_url('assets/img/') . $profile['struktur'] ?>" class="img-fluid" alt="...">
                     </div>
                 </div>

             </div>

         </div>

 </section><!-- End Contact Section -->