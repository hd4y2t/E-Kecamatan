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
                            <?php if ($this->session->flashdata('danger') == TRUE) : ?>
                                <div class="alert alert-danger">
                                    <span><?= $this->session->flashdata('danger'); ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="card">
                                <div class="card-header card-header-tabs card-header-success">
                                    <h3>Surat Pelayanan Umum</h3>
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#skm" data-toggle="tab">
                                                        <i class="material-icons">description</i> Keterangan Miskin : <?= $countskm; ?>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#sktm" data-toggle="tab">
                                                        <i class="material-icons">description</i> Keterangan Tidak Mampu : <?= $countsktm; ?>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#skbpr" data-toggle="tab">
                                                        <i class="material-icons">description</i> Keterangan Belum Punya Rumah : <?= $countskbpr; ?>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#skp" data-toggle="tab">
                                                        <i class="material-icons">description</i> Keterangan Penghasilan : <?= $countskp; ?>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#spskck" data-toggle="tab">
                                                        <i class="material-icons">description</i> Pengantar SKCK : <?= $countspskck; ?>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#spik" data-toggle="tab">
                                                        <i class="material-icons">description</i> Pengantar Izin Keramaian : <?= $countspik; ?>
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
                                                            <th scope="col">Action</th>
                                                            <th scope="col">ID Pengajuan</th>
                                                            <th scope="col">NIK</th>
                                                            <th scope="col">Nama Pengaju</th>
                                                            <th scope="col">Nomor Surat</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Kelurahan</th>
                                                            <th scope="col">Keperluan</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($skm as $m) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i ?></th>
                                                                <?php if ($m['status_surat'] <= 1) { ?>
                                                                    <td>
                                                                        <button class="btn btn-simple btn-warning btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['pengaju_id']; ?>">Buat Surat</button>
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
                                                                        <a href="<?= base_url('pelayanan_umum/cetak_skm/') . $m['no_surat'] ?>" class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> download </i>
                                                                        </a>
                                                                    </td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?= $m['pengaju_id']; ?></td>
                                                                <td><?= $m['nik_pengaju']; ?></td>
                                                                <td><?= $m['nama']; ?></td>
                                                                <td><?= $m['no_surat']; ?></td>
                                                                <td><?= $m['tgl']; ?></td>
                                                                <td><?= $m['nm_kelurahan']; ?></td>
                                                                <td><?= $m['keperluan']; ?></td>
                                                                <td class="font-weight-bold"><?= $status[$m['status_surat']]; ?></td>

                                                                <?php

                                                                $i++; ?>
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
                                                            <th scope="col">Action</th>
                                                            <th scope="col">ID Pengajuan</th>
                                                            <th scope="col">NIK</th>
                                                            <th scope="col">Nama Pengaju</th>
                                                            <th scope="col">Nomor Surat</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Kelurahan</th>
                                                            <th scope="col">Keperluan</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($sktm as $m) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i ?></th>
                                                                <?php if ($m['status_surat'] <= 1) { ?>
                                                                    <td>
                                                                        <button class="btn btn-simple btn-warning btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['pengaju_id']; ?>">Buat Surat</button>
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
                                                                        <a href="<?= base_url('pelayanan_umum/cetak_skm/') . $m['no_surat'] ?>" class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> download </i>
                                                                        </a>
                                                                    </td>
                                                                <?php } ?>
                                                                <td><?= $m['pengaju_id']; ?></td>
                                                                <td><?= $m['nik_pengaju']; ?></td>
                                                                <td><?= $m['nama']; ?></td>
                                                                <td><?= $m['no_surat']; ?></td>
                                                                <td><?= $m['tgl']; ?></td>
                                                                <td><?= $m['nm_kelurahan']; ?></td>
                                                                <td><?= $m['keperluan']; ?></td>
                                                                <td class="font-weight-bold"><?= $status[$m['status_surat']]; ?></td>

                                                                <?php

                                                                $i++; ?>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="skbpr">
                                                <table class="table" id="myTables">
                                                    <thead class="text-success">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">ID Pengajuan</th>
                                                            <th scope="col">NIK</th>
                                                            <th scope="col">Nama Pengaju</th>
                                                            <th scope="col">Nomor Surat</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Kelurahan</th>
                                                            <th scope="col">Keperluan</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($skbpr as $m) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i ?></th>
                                                                <?php if ($m['status_surat'] <= 1) { ?>
                                                                    <td>
                                                                        <button class="btn btn-simple btn-warning btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['pengaju_id']; ?>">Buat Surat</button>
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
                                                                        <a href="<?= base_url('pelayanan_umum/cetak_skm/') . $m['no_surat'] ?>" class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> download </i>
                                                                        </a>
                                                                    </td>
                                                                <?php } ?>
                                                                <td><?= $m['pengaju_id']; ?></td>
                                                                <td><?= $m['nik_pengaju']; ?></td>
                                                                <td><?= $m['no_surat']; ?></td>
                                                                <td><?= $m['nama']; ?></td>
                                                                <td><?= $m['tgl']; ?></td>
                                                                <td><?= $m['nm_kelurahan']; ?></td>
                                                                <td><?= $m['keperluan']; ?></td>
                                                                <td class="font-weight-bold"><?= $status[$m['status_surat']]; ?></td>

                                                                <?php
                                                                $i++; ?>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="spik">
                                                <table class="table" id="myTables">
                                                    <thead class="text-success">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Action</th>
                                                            <th scope="col">ID Pengajuan</th>
                                                            <th scope="col">NIK</th>
                                                            <th scope="col">Nomor Surat</th>
                                                            <th scope="col">Nama Pengaju</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Kelurahan</th>
                                                            <th scope="col">Keperluan</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($spik as $m) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i ?></th>
                                                                <?php if ($m['status_surat'] <= 1) { ?>
                                                                    <td>
                                                                        <button class="btn btn-simple btn-warning btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['pengaju_id']; ?>">Buat Surat</button>
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
                                                                        <a href="<?= base_url('pelayanan_umum/cetak_skm/') . $m['no_surat'] ?>" class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> download </i>
                                                                        </a>
                                                                    </td>
                                                                <?php } ?>
                                                                <td><?= $m['pengaju_id']; ?></td>
                                                                <td><?= $m['nik_pengaju']; ?></td>
                                                                <td><?= $m['no_surat']; ?></td>
                                                                <td><?= $m['nama']; ?></td>
                                                                <td><?= $m['tgl']; ?></td>
                                                                <td><?= $m['nm_kelurahan']; ?></td>
                                                                <td><?= $m['keperluan']; ?></td>
                                                                <td class="font-weight-bold"><?= $status[$m['status_surat']]; ?></td>

                                                                <?php

                                                                $i++; ?>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="skp">
                                                <table class="table" id="myTables">
                                                    <thead class="text-success">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Action</th>
                                                            <th scope="col">ID Pengajuan</th>
                                                            <th scope="col">NIK</th>
                                                            <th scope="col">Nama Pengaju</th>
                                                            <th scope="col">Nomor Surat</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Kelurahan</th>
                                                            <th scope="col">Keperluan</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($skp as $m) : ?>
                                                            <tr>
                                                                <?php if ($m['status_surat'] <= 1) { ?>
                                                                    <td>
                                                                        <button class="btn btn-simple btn-warning btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['pengaju_id']; ?>">Buat Surat</button>
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
                                                                        <a href="<?= base_url('pelayanan_umum/cetak_skm/') . $m['no_surat'] ?>" class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> download </i>
                                                                        </a>
                                                                    </td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <th scope="row"><?= $i ?></th>
                                                                <td><?= $m['pengaju_id']; ?></td>
                                                                <td><?= $m['nik_pengaju']; ?></td>
                                                                <td><?= $m['nama']; ?></td>
                                                                <td><?= $m['no_surat']; ?></td>
                                                                <td><?= $m['tgl']; ?></td>
                                                                <td><?= $m['nm_kelurahan']; ?></td>
                                                                <td><?= $m['keperluan']; ?></td>
                                                                <td class="font-weight-bold"><?= $status[$m['status_surat']]; ?></td>

                                                                <?php

                                                                $i++; ?>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="spskck">
                                                <table class="table" id="myTables">
                                                    <thead class="text-success">
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Action</th>
                                                            <th scope="col">ID Pengajuan</th>
                                                            <th scope="col">NIK</th>
                                                            <th scope="col">Nama Pengaju</th>
                                                            <th scope="col">Nomor Surat</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Kelurahan</th>
                                                            <th scope="col">Keperluan</th>
                                                            <th scope="col">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($spskck as $m) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i ?></th>
                                                                <?php if ($m['status_surat'] <= 1) { ?>
                                                                    <td>
                                                                        <a class="btn btn-simple btn-warning btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['pengaju_id']; ?>">Buat Surat</a>
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
                                                                        <a href="<?= base_url('pelayanan_umum/cetak_skm/') . $m['no_surat'] ?>" class="btn btn-simple btn-success btn-sm text-light" target="blank"><i class="material-icons"> download </i>
                                                                        </a>
                                                                    </td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td><?= $m['pengaju_id']; ?></td>
                                                                <td><?= $m['nik_pengaju']; ?></td>
                                                                <td><?= $m['no_surat']; ?></td>
                                                                <td><?= $m['nama']; ?></td>
                                                                <td><?= $m['tgl']; ?></td>
                                                                <td><?= $m['nm_kelurahan']; ?></td>
                                                                <td><?= $m['keperluan']; ?></td>
                                                                <td class="font-weight-bold"><?= $status[$m['status_surat']]; ?></td>
                                                                <?php
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