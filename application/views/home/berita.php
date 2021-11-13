<div id="hero">
    <section class="portfolio">
        <div class="container-fluid">
            <div class="row">
                <div class="container position-relative" data-aos="fade-in" data-aos-delay="200">
                    <div class="card">
                        <div class="section-title aos-init aos-animate" data-aos="fade-left">
                            <h1 class="text-dark">Berita</h1>
                            <div class="container-fluid">
                                <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <ul id="portfolio-flters">
                                            <li data-filter="*" class="filter-active">All</li>
                                            <li data-filter=".filter-app">App</li>
                                            <li data-filter=".filter-card">Card</li>
                                            <li data-filter=".filter-web">Web</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row portfolio-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="position: relative; height: 3894.75px;">
                                    <?php for ($i = 1; $i <= 6; $i++) {
                                    ?>

                                        <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="position: absolute; left: 0px; top: 0px;">
                                            <div class="card ">
                                                <img src="<?= base_url() ?>/assets/img/portfolio/portfolio-1.jpg" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                    <!-- <a href="<?= base_url('home/detail_berita') ?>" class="btn btn-primary">Go somewhere</a> -->
                                                </div>
                                                <div class="portfolio-links ml-3 mb-3">
                                                    <a href="<?= base_url('home/detail_berita') ?>" class="btn btn-outline-dark">Baca lebih lanjut</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- </div>
</div>
</div>
</div>
</div>
</div>   -->