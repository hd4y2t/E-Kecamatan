<div class="content" data-color="#d6fad6" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <p class="card-category">Antrian Surat yang belum dicek</p>
                                <h3 class="card-title"><?= $antrian_non; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">warning</i>
                                    Antrian yang belum di tangani
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">content_copy</i>
                                </div>
                                <p class="card-category">Antrian Surat yang ada</p>
                                <h3 class="card-title"><?= $antrian; ?>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i> Antrian yang sedang diproses
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-check-square"></i>
                                </div>
                                <p class="card-category">Antrian Surat yang selesai</p>
                                <h3 class="card-title"><?= $antrian_done; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Antrian yang telah selesai
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <p class="card-category">Penduduk yang memakai sistem</p>
                                <h3 class="card-title"><?= $warga; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
                    <?= form_error('surat', '<div class="text-danger" surat="alert">', '</div>'); ?>
                    <?= $this->session->flashdata('message'); ?>
                    <?php if ($this->session->flashdata('success') == TRUE) : ?>
                        <div class="alert alert-success">
                            <span><?= $this->session->flashdata('success'); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('warning') == TRUE) : ?>
                        <div class="alert alert-warning">
                            <span><?= $this->session->flashdata('warning'); ?></span>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-success">
                            <h3>Antrian Surat Pelayanan Umum</h3>
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#skm" data-toggle="tab">
                                                <i class="material-icons">description</i> Keterangan Miskin
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sktm" data-toggle="tab">
                                                <i class="material-icons">description</i> Keterangan Tidak Mampu
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#skbpr" data-toggle="tab">
                                                <i class="material-icons">description</i> Keterangan Belum Punya Rumah
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#skp" data-toggle="tab">
                                                <i class="material-icons">description</i> Keterangan Penghasilan
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#spskck" data-toggle="tab">
                                                <i class="material-icons">description</i> Pengantar SKCK
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#spik" data-toggle="tab">
                                                <i class="material-icons">description</i> Pengantar Izin Keramaian
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="skm">
                                        <table class="table" id="myTables">
                                            <thead class="text-success">
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">ID Pengajuan</th>
                                                    <th scope="col">NIK</th>
                                                    <th scope="col">Nama Pengaju</th>
                                                    <th scope="col">No.HP</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Detail Pengajuan</th>
                                                    <!-- <th scope="col">Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($skm as $m) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i ?></th>
                                                        <td><?= $m['id_pengaju']; ?></td>
                                                        <td><?= $m['nik']; ?></td>
                                                        <td><?= $m['nama']; ?></td>
                                                        <td><?= $m['no_hp']; ?></td>
                                                        <td><?= $m['tgl']; ?></td>
                                                        <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                        <td>
                                                            <button class="btn btn-simple btn-info btn-sm" data-toggle="modal" data-target="#suratSKM/<?= $m['id_pengaju']; ?>"><i class="material-icons">remove_red_eye</i></button>
                                                        </td>
                                                        <?php $i++; ?>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="sktm">
                                        <table class="table" id="myTables">
                                            <thead class="text-success">
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">ID Pengajuan</th>
                                                    <th scope="col">NIK</th>
                                                    <th scope="col">Nama Pengaju</th>
                                                    <th scope="col">No.HP</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Detail Pengajuan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($sktm as $m) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i ?></th>
                                                        <td><?= $m['id_pengaju']; ?></td>
                                                        <td><?= $m['nik']; ?></td>
                                                        <td><?= $m['nama']; ?></td>
                                                        <td><?= $m['no_hp']; ?></td>
                                                        <td><?= $m['tgl']; ?></td>
                                                        <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                        <td>
                                                            <button class="btn btn-simple btn-info btn-sm" data-toggle="modal" data-target="#suratSKTM/<?= $m['id_pengaju']; ?>"><i class="material-icons">remove_red_eye</i></button>
                                                        </td>
                                                        <?php $i++; ?>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <!-- modal Surat keterangan Miskin -->
        <?php foreach ($skm as $m) : ?>
            <div class="modal fade" id="suratSKM/<?= $m['id_pengaju']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class=" modal-content">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-success">
                                <h3>Surat Keterangan Miskin</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <div class="tab-pane active" id="profile">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>ID Pengajuan</td>
                                                    <td><?= $m['id_pengaju'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Nama Pengaju
                                                    </td>
                                                    <td><?= $m['nama'] ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Tanggal
                                                    </td>
                                                    <td><?= $m['tgl'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Alamat
                                                    </td>
                                                    <td><?= $m['alamat'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Keperluan
                                                    </td>
                                                    <td><?= $m['keperluan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Scan KTP
                                                    </td>
                                                    <td>
                                                        <img type="application/pdf" width="500px" height="350px;" src="<?= base_url('upload/ktp') ?>/<?= $m['ktp'] ?>" width="200" height="600"></img>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Scan KK
                                                    </td>
                                                    <td>
                                                        <img type="application/pdf" width="500px" height="350px;" src="<?= base_url('upload/kk') ?>/<?= $m['kk'] ?>" width="200" height="600"></img>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Surat Pengantar Kelurahan
                                                    </td>
                                                    <td>
                                                        <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pengantar') ?>/<?= $m['f_pengantar'] ?>" width="200" height="600"></embed>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Surat Pernyataan
                                                    </td>
                                                    <td>
                                                        <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pernyataan') ?>/<?= $m['f_pernyataan'] ?>" width="200" height="600"></embed>
                                                    </td>
                                                </tr>
                                                <form action="<?= base_url("loket/skm_tolak/") . $m['id_pengaju'] ?>" method="post">
                                                    <tr>
                                                        <td>Catatan <b>(jika ditolak)</b></td>
                                                        <td> <input type="text" name="catatan" id="catatan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <div class="content">
                                                            <td>
                                                                <a class="btn btn-success" href="<?= base_url("loket/skm_terima/") . $m['id_pengaju'] ?>">Terima</a>
                                                                <button type="submit" class="btn btn-danger" href="<?= base_url("loket/skm_tolak/") . $m['id_pengaju'] ?>">Tolak</button>
                                                            </td>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                </form>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php foreach ($skbpr as $m) : ?>
                    <div class="modal fade" id="suratSKBPR/<?= $m['id_pengaju']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class=" modal-content">
                                <div class="card">
                                    <div class="card-header card-header-tabs card-header-success">
                                        <h3>Surat Keterangan Belum Punya Rumah</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <div class="tab-pane active" id="profile">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h3>
                                                                    ID Pengajuan
                                                                </h3>
                                                            </td>
                                                            <td>
                                                                <h3>
                                                                    <?= $m['id_pengaju'] ?>
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Nama Pengaju
                                                            </td>
                                                            <td><?= $m['nama'] ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Tanggal
                                                            </td>
                                                            <td><?= $m['tgl'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Alamat
                                                            </td>
                                                            <td><?= $m['alamat'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Keperluan
                                                            </td>
                                                            <td><?= $m['keperluan'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Scan KTP
                                                            </td>
                                                            <td>
                                                                <img type="application/pdf" width="500px" height="350px;" src="<?= base_url('upload/ktp') ?>/<?= $m['ktp'] ?>" width="200" height="600"></img>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Scan KK
                                                            </td>
                                                            <td>
                                                                <img type="application/pdf" width="500px" height="350px;" src="<?= base_url('upload/kk') ?>/<?= $m['kk'] ?>" width="200" height="600"></img>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Surat Pengantar Kelurahan
                                                            </td>
                                                            <td>
                                                                <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pengantar') ?>/<?= $m['f_pengantar'] ?>" width="200" height="600"></embed>
                                                            </td>
                                                        </tr>
                                                        <form action="<?= base_url("loket/sktm_tolak/") . $m['id_pengaju'] ?>" method="post">
                                                            <tr>
                                                                <td>Catatan <b>(jika ditolak)</b></td>
                                                                <td> <input type="text" name="catatan" id="catatan">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status</td>
                                                                <div class="content">
                                                                    <td>
                                                                        <a class="btn btn-success" href="<?= base_url("loket/sktm_terima/") . $m['id_pengaju'] ?>">Terima</a>
                                                                        <button type="submit" class="btn btn-danger" href="<?= base_url("loket/sktm_tolak/") . $m['id_pengaju'] ?>">Tolak</button>
                                                                    </td>
                                                                </div>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php foreach ($sktm as $m) : ?>
                            <div class="modal fade" id="suratSKTM/<?= $m['id_pengaju']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class=" modal-content">
                                        <div class="card">
                                            <div class="card-header card-header-tabs card-header-success">
                                                <h3>Surat Keterangan Tidak Mampu</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">

                                                    <div class="tab-pane active" id="profile">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h3>
                                                                            ID Pengajuan
                                                                        </h3>
                                                                    </td>
                                                                    <td>
                                                                        <h3>
                                                                            <?= $m['id_pengaju'] ?>
                                                                        </h3>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Nama Pengaju
                                                                    </td>
                                                                    <td><?= $m['nama'] ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Tanggal
                                                                    </td>
                                                                    <td><?= $m['tgl'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Alamat
                                                                    </td>
                                                                    <td><?= $m['alamat'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Keperluan
                                                                    </td>
                                                                    <td><?= $m['keperluan'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Scan KTP
                                                                    </td>
                                                                    <td>
                                                                        <img type="application/pdf" width="500px" height="350px;" src="<?= base_url('upload/ktp') ?>/<?= $m['ktp'] ?>" width="200" height="600"></img>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Scan KK
                                                                    </td>
                                                                    <td>
                                                                        <img type="application/pdf" width="500px" height="350px;" src="<?= base_url('upload/kk') ?>/<?= $m['kk'] ?>" width="200" height="600"></img>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Surat Pengantar Kelurahan
                                                                    </td>
                                                                    <td>
                                                                        <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pengantar') ?>/<?= $m['f_pengantar'] ?>" width="200" height="600"></embed>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Surat Pernyataan
                                                                    </td>
                                                                    <td>
                                                                        <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pernyataan') ?>/<?= $m['f_pernyataan'] ?>" width="200" height="600"></embed>
                                                                    </td>
                                                                </tr>
                                                                <form action="<?= base_url("loket/sktm_tolak/") . $m['id_pengaju'] ?>" method="post">
                                                                    <tr>
                                                                        <td>Catatan <b>(jika ditolak)</b></td>
                                                                        <td> <input type="text" name="catatan" id="catatan">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Status</td>
                                                                        <div class="content">
                                                                            <td>
                                                                                <a class="btn btn-success" href="<?= base_url("loket/sktm_terima/") . $m['id_pengaju'] ?>">Terima</a>
                                                                                <button type="submit" class="btn btn-danger" href="<?= base_url("loket/sktm_tolak/") . $m['id_pengaju'] ?>">Tolak</button>
                                                                            </td>
                                                                        </div>
                                                                        </td>
                                                                    </tr>
                                                                </form>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>


                                </div>
                            </div>
                        </div>
                        </body>