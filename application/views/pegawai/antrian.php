<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">

        <div class="row ">
            <div class="col-lg">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="card">
                                <div class="card-header card-header-success">
                                    <h3 class="card-title">Antrian Surat</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-hover table-sm" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">ID Pengajuan</th>
                                                        <th scope="col">Kategori</th>
                                                        <th scope="col">Nama Pengaju(NIK)</th>
                                                        <th scope="col">No.HP</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">File</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($pengajuan as $m) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $m['id']; ?></td>
                                                            <td><?= $m['id_surat']; ?></td>
                                                            <td><?= $m['nama'] . '(' . $m['nik'] . ')'; ?></td>
                                                            <td><?= $m['tgl']; ?></td>
                                                            <td><?= $m['no_hp']; ?></td>
                                                            <td><?= $status[$m['status']]; ?></td>
                                                            <td>
                                                                <button class="btn btn-simple btn-info btn-sm" data-toggle="modal" data-target="#lihatSurat<?= $m['id']; ?>"><i class="material-icons">remove_red_eye</i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-simple btn-success btn-icon btn-sm" data-toggle="modal" data-target="#statusPengajuan<?= $m['id']; ?>"><i class="material-icons">outbond</i>Status</button>

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
<?php foreach ($pengajuan as $s) : ?>
    <div class="modal fade" id="lihatSurat<?= $s['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notice">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                    <h5 class="modal-title text-center" id="myModalLabel">Surat masuk</h5>
                </div>
                <div class="modal-body">
                    <div class="instruction">
                        <div class="row">
                            <div class="col-md-12">
                                <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('upload/pengajuan') ?>/<?= $s['file'] ?>"></embed>
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

<?php foreach ($pengajuan as $m) : ?>
    <div class="modal fade" id="statusPengajuan<?= $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                </div>

                <form method="post" action="<?= base_url(); ?>surat/updateStatus/<?= $m['id']; ?>">
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
                            <label>
                                <input type="radio" name="status" value="4" <?= $m['status'] == '4' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['4'] ?>
                            </label>

                            <label>
                                <input type="radio" name="status" value="5" <?= $m['status'] == '5' ? 'checked="true"' : '' ?>><span class="circle"></span><span class="check"></span> <?= $status['5'] ?>
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