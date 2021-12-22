<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title; ?></h3>
                            </div>
                            <div class="card-body">
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
                                <!-- <a href="" class="btn btn-success" data-toggle="modal" data-target="#newsuratModal">Tambah Surat</a> -->
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="myTable">
                                                <thead class="text-success">

                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Nama Pengaju</th>
                                                        <th scope="col">NIK</th>
                                                        <th scope="col">Nomor Surat</th>
                                                        <th scope="col">Surat</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">Keperluan</th>
                                                        <th scope="col">Keterangan</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Berkas</th>
                                                        <th scope="col">Lihat Surat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($ps as $s) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $s['nama']; ?></td>
                                                            <td><?= $s['nik']; ?></td>
                                                            <td><?= $s['no_surat']; ?></td>
                                                            <td><?= $surat[$s['id_surat']]; ?></td>
                                                            <td><?= $s['tgl']; ?></td>
                                                            <td><?= $s['keperluan']; ?></td>
                                                            <td><?= $s['keterangan']; ?></td>
                                                            <td class="font-weight-bold"><?= $status[$s['status_surat']]; ?></td>
                                                            <td>
                                                                <button class="btn btn-simple btn-outline-info btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $s['no_surat']; ?>">Lihat Berkas</button>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-simple btn-outline-warning btn-sm" data-toggle="modal" data-target="#cekSurat<?= $s['no_surat']; ?>">Lihat Surat</button>
                                                            </td>
                                                            <?php if ($s['status_surat'] == 3) {
                                                            ?>
                                                                <td>
                                                                    <a class="btn btn-simple btn-warning btn-sm text-light"><i class="material-icons"> update </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            } else if ($s['status_surat'] == 4) {
                                                            ?>
                                                                <td>
                                                                    <a class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> update </i>
                                                                    </a>
                                                                </td>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <td>
                                                                    <a class="btn btn-simple btn-success btn-sm text-light"><i class="material-icons"> done </i>
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

<?php foreach ($ps as $s) : ?>
    <div class="modal fade" id="cekSurat<?= $s['no_surat']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                    <h5 class="modal-title text-center" id="myModalLabel"><?= $surat[$s['surat_id']] ?></h5>
                </div>
                <div class="modal-body">
                    <div class="instruction">
                        <div class="row">
                            <div class="col-md">
                                <embed type="application/pdf" width="100%" height="550px;" src="<?= base_url('sekcam/cetak_skm/') . $s['no_surat'] ?>"></embed>
                            </div>

                        </div>
                    </div>
                </div>

                <table class="table">
                    <tbody>
                        <form action="<?= base_url("sekcam/tolak/") . $s['no_surat'] ?>" method="post">
                            <tr>
                                <td>Catatan </td>
                                <td> <input type="text" class="form-control" name="catatan" id="catatan" placeholder="Jika ditolak">
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <div class="content">
                                    <td>
                                        <a class="btn btn-success" href="<?= base_url("sekcam/terima/") . $s['no_surat'] ?>">Terima</a>
                                        <button type="submit" class="btn btn-danger">Tolak</button>
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
<?php endforeach; ?>

<?php foreach ($ps as $m) : ?>
    <div class="modal fade" id="lihatSurat<?= $m['no_surat']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class=" modal-content">
                <div class="card">
                    <div class="card-header card-header-tabs card-header-success">
                        <h3><?= $surat[$m['surat_id']] ?></h3>
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
                                        <?php if ($m['nm_usaha'] == true) { ?> <tr>
                                                <td>
                                                    Nama Usaha
                                                </td>
                                                <td><?= $m['nm_usaha'] ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['almt_usaha'] == true) { ?> <tr>
                                                <td>
                                                    Alamat Usaha
                                                </td>
                                                <td><?= $m['almt_usaha'] ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['nm_perusahaan'] == true) { ?> <tr>
                                                <td>
                                                    Nama Perusahaan
                                                </td>
                                                <td><?= $m['nm_perusahaan'] ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['almt_perusahaan'] == true) { ?> <tr>
                                                <td>
                                                    Alamat Perusahaan
                                                </td>
                                                <td><?= $m['almt_perusahaan'] ?></td>
                                            </tr>
                                        <?php } ?>
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

                                        <?php if ($m['f_pengantar'] == true) { ?> <tr>
                                                <td>
                                                    Surat Pengantar Kelurahan
                                                </td>
                                                <td>
                                                    <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pengantar') ?>/<?= $m['f_pengantar'] ?>" width="200" height="600"></embed>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['f_pernyataan'] == true) { ?> <tr>
                                                <td>
                                                    Surat Pernyataan
                                                </td>
                                                <td>
                                                    <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pernyataan') ?>/<?= $m['f_pernyataan'] ?>" width="200" height="600"></embed>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['f_permohonan'] == true) { ?> <tr>
                                                <td>
                                                    Surat Pernyataan
                                                </td>
                                                <td>
                                                    <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/permohonan') ?>/<?= $m['f_permohonan'] ?>" width="200" height="600"></embed>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['spt'] == true) { ?> <tr>
                                                <td>
                                                    Surat Pemilikan tanah
                                                </td>
                                                <td>
                                                    <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pemilikan_tanah') ?>/<?= $m['spt'] ?>" width="200" height="600"></embed>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['srl'] == true) { ?> <tr>
                                                <td>
                                                    Surat Pemilikan tanah
                                                </td>
                                                <td>
                                                    <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/rekomendasi_lembaga') ?>/<?= $m['srl'] ?>" width="200" height="600"></embed>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['sd'] == true) { ?> <tr>
                                                <td>
                                                    Surat Keterangan Domisili
                                                </td>
                                                <td>
                                                    <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/domisili') ?>/<?= $m['sd'] ?>" width="200" height="600"></embed>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['pbb'] == true) { ?> <tr>
                                                <td>
                                                    Scan PBB lunas
                                                </td>
                                                <td>
                                                    <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pbb') ?>/<?= $m['pbb'] ?>" width="200" height="600"></embed>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['akte_notaris'] == true) { ?> <tr>
                                                <td>
                                                    Akte Notaris
                                                </td>
                                                <td>
                                                    <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/akte_notaris') ?>/<?= $m['akte_notaris'] ?>" width="200" height="600"></embed>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['akte_kelahiran'] == true) { ?> <tr>
                                                <td>
                                                    Akte Kelahiran
                                                </td>
                                                <td>
                                                    <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/akte_kelahiran') ?>/<?= $m['akte_kelahiran'] ?>" width="200" height="600"></embed>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['spn'] == true) { ?> <tr>
                                                <td>
                                                    Surat Pengantar Nikah (N1 - N4)
                                                </td>
                                                <td>
                                                    <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pengantar_nikah') ?>/<?= $m['spn'] ?>" width="200" height="600"></embed>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($m['skbn'] == true) { ?> <tr>
                                                <td>
                                                    Surat Keterangan Belum Menikah
                                                </td>
                                                <td>
                                                    <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/keterangan_nikah') ?>/<?= $m['skbn'] ?>" width="200" height="600"></embed>
                                                </td>
                                            </tr>
                                        <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</body>