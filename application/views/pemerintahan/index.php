<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg">
                <div class="content">
                    <div class="container-fluid">
                        <!-- <div class="card"> -->
                        <!-- <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div> -->
                        <!-- Kasih Pemerintahan -->
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
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-info">
                                <h3>Surat Pemerintahan</h3>
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#skd" data-toggle="tab">
                                                    <i class="material-icons">assignment</i> Keterangan Domisili : <?= $countskd; ?>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#skdp" data-toggle="tab">
                                                    <i class="material-icons">assignment</i> Keterangan Domisili Perushaan : <?= $countskdp; ?>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#sku" data-toggle="tab">
                                                    <i class="material-icons">assignment</i> Keterangan Usaha : <?= $countsku; ?>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#skn" data-toggle="tab">
                                                    <i class="material-icons">description</i> Rekomendasi Nikah : <?= $countskn; ?>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#skos" data-toggle="tab">
                                                    <i class="material-icons">assignment</i> Keterangan Orang yang sama : <?= $countskos; ?>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#spc" data-toggle="tab">
                                                    <i class="material-icons">assignment</i> Pengantar Cerai : <?= $countspc; ?>
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
                                                        <th scope="col">Nomor Surat</th>
                                                        <th scope="col">NIK</th>
                                                        <th scope="col">Nama Pengaju</th>
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
                                                            <td><?= $m['no_surat']; ?></td>
                                                            <td><?= $m['nik']; ?></td>
                                                            <td><?= $m['nama']; ?></td>
                                                            <td><?= $m['tgl']; ?></td>
                                                            <td><?= $m['alamat']; ?></td>
                                                            <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                            <?php if ($m['status_surat'] <= 1) { ?>
                                                                <td>
                                                                    <button class="btn btn-simple btn-warning btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['id']; ?>">Buat Surat</button>
                                                                </td>
                                                            <?php } else if ($m['status_surat'] <= 4) {
                                                            ?>
                                                                <td>
                                                                    <a class="btn btn-simple btn-info btn-sm text-light"><i class="material-icons"> update </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td>
                                                                    <a href="<?= base_url('pemerintahan/cetak_skm/') . $m['no_surat'] ?>" class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> download </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            }
                                                            $i++; ?>
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
                                                        <th scope="col">Nomor Surat</th>
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
                                                            <td><?= $m['no_surat']; ?></td>
                                                            <td><?= $m['nik']; ?></td>
                                                            <td><?= $m['nama']; ?></td>
                                                            <td><?= $m['no_hp']; ?></td>
                                                            <td><?= $m['tgl']; ?></td>
                                                            <td><?= $m['nm_perusahaan']; ?></td>
                                                            <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                            <?php if ($m['status_surat'] <= 1) { ?>
                                                                <td>
                                                                    <button class="btn btn-simple btn-warning btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['id']; ?>">Buat Surat</button>
                                                                </td>
                                                            <?php } else if ($m['status_surat'] <= 4) {
                                                            ?>
                                                                <td>
                                                                    <a class="btn btn-simple btn-info btn-sm text-light"><i class="material-icons"> update </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td>
                                                                    <a href="<?= base_url('pemerintahan/cetak_skm/') . $m['no_surat'] ?>" class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> download </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            }
                                                            $i++; ?>
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
                                                        <th scope="col">Nomor Surat</th>
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
                                                            <td><?= $m['no_surat']; ?></td>
                                                            <td><?= $m['nik']; ?></td>
                                                            <td><?= $m['nama']; ?></td>
                                                            <td><?= $m['no_hp']; ?></td>
                                                            <td><?= $m['tgl']; ?></td>
                                                            <td><?= $m['nm_usaha']; ?></td>
                                                            <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                            <?php if ($m['status_surat'] <= 1) { ?>
                                                                <td>
                                                                    <button class="btn btn-simple btn-warning btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['id']; ?>">Buat Surat</button>
                                                                </td>
                                                            <?php } else if ($m['status_surat'] <= 4) {
                                                            ?>
                                                                <td>
                                                                    <a class="btn btn-simple btn-info btn-sm text-light"><i class="material-icons"> update </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td>
                                                                    <a href="<?= base_url('pemerintahan/cetak_skm/') . $m['no_surat'] ?>" class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> download </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            }
                                                            $i++; ?>
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
                                                        <th scope="col">Nomor Surat</th>
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
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $m['id_pengaju']; ?></td>
                                                            <td><?= $m['no_surat']; ?></td>
                                                            <td><?= $m['nik']; ?></td>
                                                            <td><?= $m['nama']; ?></td>
                                                            <td><?= $m['no_hp']; ?></td>
                                                            <td><?= $m['tgl']; ?></td>
                                                            <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                            <?php if ($m['status_surat'] <= 1) { ?>
                                                                <td>
                                                                    <button class="btn btn-simple btn-warning btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['id']; ?>">Buat Surat</button>
                                                                </td>
                                                            <?php } else if ($m['status_surat'] <= 4) {
                                                            ?>
                                                                <td>
                                                                    <a class="btn btn-simple btn-info btn-sm text-light"><i class="material-icons"> update </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td>
                                                                    <a href="<?= base_url('pemerintahan/cetak_skm/') . $m['no_surat'] ?>" class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> download </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            }
                                                            $i++; ?>
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
                                                        <th scope="col"> Nomor Surat</th>
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
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $m['id_pengaju']; ?></td>
                                                            <td><?= $m['no_surat']; ?></td>
                                                            <td><?= $m['nik']; ?></td>
                                                            <td><?= $m['nama']; ?></td>
                                                            <td><?= $m['nm_yg_dipakai']; ?></td>
                                                            <td><?= $m['no_hp']; ?></td>
                                                            <td><?= $m['tgl']; ?></td>
                                                            <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                            <?php if ($m['status_surat'] <= 1) { ?>
                                                                <td>
                                                                    <button class="btn btn-simple btn-warning btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['id']; ?>">Buat Surat</button>
                                                                </td>
                                                            <?php } else if ($m['status_surat'] <= 4) {
                                                            ?>
                                                                <td>
                                                                    <a class="btn btn-simple btn-info btn-sm text-light"><i class="material-icons"> update </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td>
                                                                    <a href="<?= base_url('pemerintahan/cetak_skm/') . $m['no_surat'] ?>" class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> download </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            }
                                                            $i++; ?>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="spc">
                                            <table class="table" id="myTables">
                                                <thead class="text-success">
                                                    <tr>
                                                        <th scope="row"></th>
                                                        <th scope="col">ID Pengajuan</th>
                                                        <th scope="col">Nomor Surat</th>
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
                                                    <?php foreach ($spc as $m) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $m['id_pengaju']; ?></td>
                                                            <td><?= $m['no_surat']; ?></td>
                                                            <td><?= $m['nik']; ?></td>
                                                            <td><?= $m['nama']; ?></td>
                                                            <td><?= $m['no_hp']; ?></td>
                                                            <td><?= $m['tgl']; ?></td>
                                                            <td class="font-weight-bold"><?= $status[$m['status']]; ?></td>
                                                            <?php if ($m['status_surat'] <= 1) { ?>
                                                                <td>
                                                                    <button class="btn btn-simple btn-warning btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['id']; ?>">Buat Surat</button>
                                                                </td>
                                                            <?php } else if ($m['status_surat'] <= 4) {
                                                            ?>
                                                                <td>
                                                                    <a class="btn btn-simple btn-info btn-sm text-light"><i class="material-icons"> update </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td>
                                                                    <a href="<?= base_url('pemerintahan/cetak_skm/') . $m['no_surat'] ?>" class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> download </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            }
                                                            $i++; ?>
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
        </div>
    </div>
</div>

<?php foreach ($ps as $m) : ?>
    <div class="modal fade" id="lihatSurat<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class=" modal-content">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-success">
                        <h3>Surat Keterangan Miskin</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <div class="tab-pane active">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>ID Pengajuan</td>
                                            <td><?= $m['pengaju_id'] ?></td>
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
                                    </tbody>
                                </table>
                                <form method="post" action="<?= base_url('pemerintahan/buatSurat/') . $m['id'] ?>">
                                    <tr>
                                        <h3>Isi Surat</h3>
                                    </tr>
                                    <tr>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nomor Surat *(wajib diisi)</label>
                                            <input type="text" class="form-control" id="no_surat" name="no_surat">
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nomor Surat Pengantar Kelurahan</label>
                                            <input type="text" class="form-control" id="no_pengantar" name="no_pengantar">
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">
                                            <label>Tanggal Surat Pengantar Kelurahan</label>
                                            <input type="date" class="form-control" id="tgl_pengantar" name="tgl_pengantar">
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Keterangan</label>
                                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                                        </div>
                                    </tr>
                                    <?php if ($m['id_surat'] == 'SKDP') { ?>
                                        <tr>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Akte Pendiri</label>
                                                <input type="text" class="form-control" id="no_akte" name="no_akte">
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Bergerak dibidang</label>
                                                <input type="text" class="form-control" id="bidang" name="bidang">
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Jumlah Karyawan</label>
                                                <input type="text" class="form-control" id="karyawan" name="karyawan">
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Jam Kerja</label>
                                                <input type="text" class="form-control" id="jam_kerja" name="jam_kerja">
                                            </div>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <div class="content">
                                            <td>
                                                <button type="submit" class="btn btn-success">Buat</button>
                                            </td>
                                        </div>
                                    </tr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</body>