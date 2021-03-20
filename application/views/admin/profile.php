<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-8">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <?= form_error('bidang', '<div class="text-danger" bidang="alert">', '</div>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#newbidangModal">Tambah bidang</a>
                                <div class="row">
                                    <div class="col">

                                        <div class="table-responsive">
                                            <table class="table table-hover" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Field</th>
                                                        <th scope="col">isi Field</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Kecamatan</td>
                                                        <td><?= $profile['kecamatan']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Detail Kecamatan</td>
                                                        <td><?= $profile['detail']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Kepala Camat</td>
                                                        <td><?= $profile['camat']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <td>Sekretaris Kecamatan</td>
                                                        <td><?= $profile['sekcam']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">5</th>
                                                        <td>Seksi Pemerintahan</td>
                                                        <td><?= $profile['s_pemerintahan']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">6</th>
                                                        <td>Seksi Trantib</td>
                                                        <td><?= $profile['s_trantib']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">7</th>
                                                        <td>Seksi Perlindungan Masyarakat</td>
                                                        <td><?= $profile['s_pelindung']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">8</th>
                                                        <td>Seksi Pemberdayaan Sosial</td>
                                                        <td><?= $profile['s_sosial']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">9</th>
                                                        <td>Seksi Pembangungan</td>
                                                        <td><?= $profile['s_pembangunan']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">10</th>
                                                        <td>Foto Kepala Kecamatan</td>
                                                        <td> <button class="btn btn-simple btn-info" data-toggle="modal" data-target="#lihatSurat<?= $profile['f_camat']; ?>"><i class="material-icons">remove_red_eye</i></button></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">11</th>
                                                        <td>Foto Sekretaris Kecamatan</td>
                                                        <td><?= $profile['f_sekcam']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">12</th>
                                                        <td>Foto Seksi Pemerintahan</td>
                                                        <td><?= $profile['f_pemerintahan']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">13</th>
                                                        <td>Foto Seksi Trantib</td>
                                                        <td><?= $profile['f_trantib']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">14</th>
                                                        <td>Foto Seksi Perlindungan Masyarakat</td>
                                                        <td><?= $profile['f_pelindung']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">15</th>
                                                        <td>Foto Seksi Pemberdayaan Sosial</td>
                                                        <td><?= $profile['f_sosial']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">16</th>
                                                        <td>Foto Seksi Pembangunan</td>
                                                        <td><?= $profile['f_pembangunan']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">17</th>
                                                        <td>Lokasi</td>
                                                        <td><?= $profile['lokasi']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">18</th>
                                                        <td>Email Kecamatan</td>
                                                        <td><?= $profile['email']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">19</th>
                                                        <td>Nomor Telepon</td>
                                                        <td><?= $profile['no']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url("pegawai/editbidang/" . $profile['id']); ?>" class="btn btn-warning">Edit</a>

                                                        </td>
                                                    </tr>

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


<!-- Modal -->
<div class=" modal fade" id="newbidangModal" tabindex="-1" aria-labelledby="newbidangModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newbidangModalLabel">Tambahkan bidang Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pegawai/bidang'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama bidang</label>
                        <input type="text" class="form-control" id="bidang" name="bidang">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="Submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="lihatSurat<?= $profile['f_camat']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title text-center" id="myModalLabel">Kepala Kecamatan</h5>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <embed type="application/pdf" width="100%" height="450px;" src="<?= base_url('assets/img/testimonials') ?>/<?= $profile['f_camat'] ?>"></embed>
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
</body>