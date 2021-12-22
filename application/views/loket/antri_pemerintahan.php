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

                    <!-- Kasih Pemerintahan -->
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-info">
                            <h3>Antrian Surat Pemerintahan</h3>
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#skd" data-toggle="tab">
                                                <i class="material-icons">assignment</i> Keterangan Domisili
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#skdp" data-toggle="tab">
                                                <i class="material-icons">assignment</i> Keterangan Domisili Perushaan
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sku" data-toggle="tab">
                                                <i class="material-icons">assignment</i> Keterangan Usaha
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#skn" data-toggle="tab">
                                                <i class="material-icons">description</i> Rekomendasi Nikah
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#skos" data-toggle="tab">
                                                <i class="material-icons">assignment</i> Keterangan Orang yang sama
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#spc" data-toggle="tab">
                                                <i class="material-icons">assignment</i> Pengantar Cerai
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
                                    <div class="tab-pane active" id="skd">
                                        <table class="table" id="myTables">
                                            <thead class="text-success">
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">ID Pengajuan</th>
                                                    <th scope="col">NIK</th>
                                                    <th scope="col">Nama Pengaju</th>
                                                    <th scope="col">No.HP</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Detail Pengajuan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($skd as $m) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i ?></th>
                                                        <td><?= $m['id_pengaju']; ?></td>
                                                        <td><?= $m['nik']; ?></td>
                                                        <td><?= $m['nama']; ?></td>
                                                        <td><?= $m['no_hp']; ?></td>
                                                        <td><?= $m['alamat']; ?></td>
                                                        <td><?= $m['tgl']; ?></td>
                                                        <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                        <td>
                                                            <button class="btn btn-simple btn-info btn-sm" data-toggle="modal" data-target="#suratSKD/<?= $m['id_pengaju']; ?>"><i class="material-icons">remove_red_eye</i></button>
                                                        </td>
                                                        <?php $i++; ?>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="skdp">
                                        <table class="table" id="myTables">
                                            <thead class="text-success">
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">ID Pengajuan</th>
                                                    <th scope="col">NIK</th>
                                                    <th scope="col">Nama Pengaju</th>
                                                    <th scope="col">No.HP</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Nama Perusahaan</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Detail Pengajuan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($skdp as $m) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i ?></th>
                                                        <td><?= $m['id_pengaju']; ?></td>
                                                        <td><?= $m['nik']; ?></td>
                                                        <td><?= $m['nama']; ?></td>
                                                        <td><?= $m['no_hp']; ?></td>
                                                        <td><?= $m['tgl']; ?></td>
                                                        <td><?= $m['nm_perusahaan']; ?></td>
                                                        <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                        <td>
                                                            <button class="btn btn-simple btn-info btn-sm" data-toggle="modal" data-target="#suratSKDP/<?= $m['id_pengaju']; ?>"><i class="material-icons">remove_red_eye</i></button>
                                                        </td>
                                                        <?php $i++; ?>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="sku">
                                        <table class="table" id="myTables">
                                            <thead class="text-success">
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">ID Pengajuan</th>
                                                    <th scope="col">NIK</th>
                                                    <th scope="col">Nama Pengaju</th>
                                                    <th scope="col">No.HP</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Nama Usaha</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Detail Pengajuan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($sku as $m) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i ?></th>
                                                        <td><?= $m['id_pengaju']; ?></td>
                                                        <td><?= $m['nik']; ?></td>
                                                        <td><?= $m['nama']; ?></td>
                                                        <td><?= $m['no_hp']; ?></td>
                                                        <td><?= $m['tgl']; ?></td>
                                                        <td><?= $m['nm_usaha']; ?></td>
                                                        <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                        <td>
                                                            <button class="btn btn-simple btn-info btn-sm" data-toggle="modal" data-target="#suratSKU/<?= $m['id_pengaju']; ?>"><i class="material-icons">remove_red_eye</i></button>
                                                        </td>
                                                        <?php $i++; ?>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="skn">
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
                                                <?php foreach ($skn as $m) : ?>
                                                    <tr>
                                                        <td><?= $m['id_pengaju']; ?></td>
                                                        <td><?= $m['nik']; ?></td>
                                                        <td><?= $m['nama']; ?></td>
                                                        <td><?= $m['no_hp']; ?></td>
                                                        <td><?= $m['tgl']; ?></td>
                                                        <td><?= $m['nm_usaha']; ?></td>
                                                        <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                        <td>
                                                            <button class="btn btn-simple btn-info btn-sm" data-toggle="modal" data-target="#suratSKN/<?= $m['id_pengaju']; ?>"><i class="material-icons">remove_red_eye</i></button>
                                                        </td>++; ?>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="skos">
                                        <table class="table" id="myTables">
                                            <thead class="text-success">
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">ID Pengajuan</th>
                                                    <th scope="col">NIK</th>
                                                    <th scope="col">Nama Pengaju</th>
                                                    <th scope="col">Nama yang Dipakai</th>
                                                    <th scope="col">No.HP</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Detail Pengajuan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($skos as $m) : ?>
                                                    <tr>
                                                        <td><?= $m['id_pengaju']; ?></td>
                                                        <td><?= $m['nik']; ?></td>
                                                        <td><?= $m['nama']; ?></td>
                                                        <td><?= $m['nm_yg_dipakai']; ?></td>
                                                        <td><?= $m['no_hp']; ?></td>
                                                        <td><?= $m['tgl']; ?></td>
                                                        <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                        <td>
                                                            <button class="btn btn-simple btn-info btn-sm" data-toggle="modal" data-target="#suratSKOS/<?= $m['id_pengaju']; ?>"><i class="material-icons">remove_red_eye</i></button>
                                                        </td>
                                                        <?php $i++; ?>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="spc">
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
                                                <?php foreach ($skos as $m) : ?>
                                                    <tr>
                                                        <td><?= $m['id_pengaju']; ?></td>
                                                        <td><?= $m['nik']; ?></td>
                                                        <td><?= $m['nama']; ?></td>
                                                        <td><?= $m['no_hp']; ?></td>
                                                        <td><?= $m['tgl']; ?></td>
                                                        <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                        <td>
                                                            <button class="btn btn-simple btn-info btn-sm" data-toggle="modal" data-target="#suratSPC/<?= $m['id_pengaju']; ?>"><i class="material-icons">remove_red_eye</i></button>
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

        <!-- Kasih Pemerintahan -->
        <?php foreach ($sku as $m) : ?>
            <div class="modal fade" id="suratSKU/<?= $m['id_pengaju']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class=" modal-content">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-info">
                                <h3>Surat Keterangan Usaha</h3>
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
                                                        Nama Usaha
                                                    </td>
                                                    <td><?= $m['nm_usaha'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Alamat Usaha
                                                    </td>
                                                    <td><?= $m['almt_usaha'] ?></td>
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
                                                        Surat Permohonan
                                                    </td>
                                                    <td>
                                                        <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/permohonan') ?>/<?= $m['f_permohonan'] ?>" width="200" height="600"></embed>
                                                    </td>
                                                </tr>
                                                <form action="<?= base_url("loket/sku_tolak/") . $m['id_pengaju'] ?>" method="post">
                                                    <tr>
                                                        <td>Catatan <b>(jika ditolak)</b></td>
                                                        <td> <input type="text" name="catatan" id="catatan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <div class="content">
                                                            <td>
                                                                <a class="btn btn-success" href="<?= base_url("loket/sku_terima/") . $m['id_pengaju'] ?>">Terima</a>
                                                                <button type="submit" class="btn btn-danger" href="<?= base_url("loket/sku_tolak/") . $m['id_pengaju'] ?>">Tolak</button>
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

                <?php foreach ($skdp as $m) : ?>
                    <div class="modal fade" id="suratSKDP/<?= $m['id_pengaju']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class=" modal-content">
                                <div class="card">
                                    <div class="card-header card-header-tabs card-header-info">
                                        <h3>Surat Keterangan Domisili Perushaan</h3>
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
                                                                Nama Perushaan
                                                            </td>
                                                            <td><?= $m['nm_perusahaan'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Alamat Perusahaan
                                                            </td>
                                                            <td><?= $m['almt_perusahaan'] ?></td>
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
                                                                Surat Kepemilikan Tanah
                                                            </td>
                                                            <td>
                                                                <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pemilikan_tanah') ?>/<?= $m['spt'] ?>" width="200" height="600"></embed>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Surat Rekomendasi Lembaga
                                                            </td>
                                                            <td>
                                                                <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/rekomendasi_lembaga') ?>/<?= $m['srl'] ?>" width="200" height="600"></embed>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Surat Domisili
                                                            </td>
                                                            <td>
                                                                <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/domisili') ?>/<?= $m['sd'] ?>" width="200" height="600"></embed>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                PBB Lunas
                                                            </td>
                                                            <td>
                                                                <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pbb') ?>/<?= $m['pbb'] ?>" width="200" height="600"></embed>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Akte Notaris
                                                            </td>
                                                            <td>
                                                                <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/akte_notaris') ?>/<?= $m['akte_notaris'] ?>" width="200" height="600"></embed>
                                                            </td>
                                                        </tr>
                                                        <form action="<?= base_url("loket/skdp_tolak/") . $m['id_pengaju'] ?>" method="post">
                                                            <tr>
                                                                <td>Catatan <b>(jika ditolak)</b></td>
                                                                <td> <input type="text" name="catatan" id="catatan">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status</td>
                                                                <div class="content">
                                                                    <td>
                                                                        <a class="btn btn-success" href="<?= base_url("loket/skdp_terima/") . $m['id_pengaju'] ?>">Terima</a>
                                                                        <button type="submit" class="btn btn-danger" href="<?= base_url("loket/skdp_tolak/") . $m['id_pengaju'] ?>">Tolak</button>
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