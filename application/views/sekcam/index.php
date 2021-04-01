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
                                    <i class="material-icons">local_offer</i> Tracked from Github
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
                                    <i class="material-icons">date_range</i> Last 24 Hours
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
                <div class="row">
                    <div class="col-lg">
                        <div class="content">
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-header card-header-success">
                                        <h3 class="card-title">Surat Masuk</h3>
                                    </div>
                                    <div class="card-body">
                                        <?= form_error('surat', '<div class="text-danger" surat="alert">', '</div>'); ?>
                                        <?= $this->session->flashdata('message'); ?>
                                        <!-- <a href="" class="btn btn-success" data-toggle="modal" data-target="#newsuratModal">Tambah Surat</a> -->
                                        <div class="row">
                                            <div class="col">

                                                <div class="table-responsive">
                                                    <table class="table table-hover" id="myTable">
                                                        <thead class="text-success">
                                                            <tr>
                                                                <th scope="col"></th>
                                                                <th scope="col">Nomor Surat</th>
                                                                <th scope="col">Jenis Surat</th>
                                                                <th scope="col">Nama Surat</th>
                                                                <th scope="col">Tanggal</th>
                                                                <th scope="col">Keterangan</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">File</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1; ?>
                                                            <?php foreach ($surat_masuk as $s) : ?>
                                                                <tr>
                                                                    <th scope="row"><?= $i ?></th>
                                                                    <td><?= $s['no_surat']; ?></td>
                                                                    <td><?= $s['jenis']; ?></td>
                                                                    <td><?= $s['nm_surat_masuk']; ?></td>
                                                                    <td><?= $s['tgl']; ?></td>
                                                                    <td><?= $s['keterangan']; ?></td>
                                                                    <td><?= $s['status']; ?></td>
                                                                    <td>
                                                                        <button class="btn btn-simple btn-info btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $s['id']; ?>"><i class="material-icons">remove_red_eye</i></button>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-simple btn-success btn-icon btn-sm" data-toggle="modal" data-target="#statusPengajuanMasuk<?= $s['id']; ?>"><i class="material-icons">outbond</i>Status</button>
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


                </div>

            </div>
        </div>
    </div>
</div>



<?php foreach ($surat_masuk as $m) : ?>
    <div class="modal fade" id="statusPengajuanMasuk<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                </div>

                <form method="post" action="<?= base_url(); ?>camat/paraf/<?= $m['id']; ?>">
                    <div class="modal-body text-center">
                        <h5>Update Status Pengajuan ID: <?= $m['id'] ?>? </h5>
                        <label for="status">Pilih Status</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" value="1" <?= $m['status'] == '1' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['1'] ?>
                            </label>
                            <label>
                                <input type="radio" name="status" value="2" <?= $m['status'] == '2' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['2'] ?>
                            </label>
                            <label>
                                <input type="radio" name="status" value="3" <?= $m['status'] == '3' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['3'] ?>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-simple" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-info btn-simple">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</body>