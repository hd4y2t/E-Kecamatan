<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto">
          <h1 class="text-light"><a href="<?= base_url('home'); ?>"><span>

                <?= $profile['kecamatan']; ?>
              </span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="<?= base_url('home'); ?>">Home</a></li>
            <li><a href="<?= base_url('home/'); ?>#profile">Profile</a></li>
            <li><a href="<?= base_url('home/'); ?>#services">Galery</a></li>
            <li><a href="<?= base_url('home/s_online') ?>">Pengajuan Surat</a></li>
            <li><a href="<?= base_url('home/tracking') ?>">Treak Surat</a></li>
            <!-- <li class="drop-down"><a href="">Drop Down</a>
              <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="drop-down"><a href="#">Drop Down 2</a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
                <li><a href="#">Drop Down 5</a></li>
              </ul>
            </li> -->
            <li><a href="<?= base_url('home/'); ?>#contact">Contact</a></li>

            <li class="get-started"><a target="_blank" href="<?= base_url('auth'); ?>">Login</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->