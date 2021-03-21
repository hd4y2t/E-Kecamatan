<section id="hero" class="page-section">
    <div class="container-fluid">
        <div class="row">
            <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
                <div class="card">
                    <div class="card-body text-justify pl-5 pr-5">

                        <div class="text-center">
                            <h3 class="section-subheading text-muted">Pengajuan Surat Online</h3>
                            <h2 class="section-subheading text-muted">Isi Form Pengajuan Surat Dibawah:</h2>
                        </div>
                        <div class="text-justify pl pr">
                            <?= form_open_multipart('suratonline/ajukan', 'id="ajukanSurat"') ?>
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

                            <div class="mb-3">
                                <div class="loading">Lo<br>ad<br>i<br>nf<br>dsf<br>sdg</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>

                            <div class="get-started text-center"><button class="get-started" type="submit">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Hero -->
</main><!-- End #main -->