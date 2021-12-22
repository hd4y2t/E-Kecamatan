<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <?= form_error('surat', '<div class="text-danger" surat="alert">', '</div>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <?php if ($this->session->flashdata('success') == TRUE) : ?>
                                    <div class="alert alert-success">
                                        <span><?= $this->session->flashdata('success'); ?></span>
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
                                                        <th scope="col">Nik</th>
                                                        <th scope="col">Surat</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">Keperluan</th>
                                                        <th scope="col">Status</th>
                                                        <!-- <th scope="col">Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($ps as $s) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $s['nama']; ?></td>
                                                            <td><?= $s['nik']; ?></td>
                                                            <td><?= $kode[$s['id_surat']]; ?></td>
                                                            <td><?= $s['tgl']; ?></td>
                                                            <td><?= $s['keperluan']; ?></td>
                                                            <td class="font-weight-bold"><?= $status[$s['status_surat']]; ?></td>
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

                            <div class="tab-pane active" id="profile">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>ID Pengajuan</td>
                                            <td><?= $m['id'] ?></td>
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
                                        <form method="post" action="<?= base_url('') ?>">
                                            <tr>
                                                <td>
                                                    <h3>Isi Surat</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Surat *(wajib diisi)</td>
                                                <td> <input type="text" name="no_surat" id="no_surat">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan Tambahan</td>
                                                <td> <input type="text" name="keterangan" id="keterangan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <div class="content">
                                                    <td>
                                                        <button type="submit" class="btn btn-success">Buat</button>
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

        <?php foreach ($surat_keluar as $s) : ?>
            <div class="modal fade" id="lihatSurat<?= $s['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notice">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                            <h5 class="modal-title text-center" id="myModalLabel">Surat Keluar</h5>
                        </div>
                        <div class="modal-body">
                            <div class="instruction">
                                <div class="row">
                                    <div class="col-md-12">
                                        <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/surat_keluar') ?>/<?= $s['file'] ?>"></embed>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </body>