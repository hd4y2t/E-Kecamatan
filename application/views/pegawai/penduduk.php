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
                                <?= form_error('penduduk', '<div class="text-danger" penduduk="alert">', '</div>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#newpendudukModal">Tambah penduduk</a>
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-hover" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">NIK</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">No.HP</th>
                                                    <th scope="col">Tempat Lahir</th>
                                                    <th scope="col">Tanggal Lahir</th>
                                                    <th scope="col">Pekerjaan</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Kelurahan</th>
                                                    <th scope="col">Pengajuan Surat</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($warga as $w) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i ?></th>
                                                        <td><?= $w['nik']; ?></td>
                                                        <td><?= $w['nama']; ?></td>
                                                        <td><?= $w['no_hp']; ?></td>
                                                        <td><?= $w['tmpt_lhr']; ?></td>
                                                        <td><?= $w['tgl_lhr']; ?></td>
                                                        <td><?= $w['pekerjaan']; ?></td>
                                                        <td><?= $w['alamat']; ?></td>
                                                        <td><?= $w['kelurahan']; ?></td>
                                                        <td><?= $w['pengajuan']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('pegawai/edit_penduduk/') . $w['nik']; ?>" class="btn btn-warning btn-sm">Edit </a>
                                                            <a href="<?= base_url('pegawai/hapus_penduduk/') . $w['nik']; ?>" class=" btn btn-danger btn-sm">Hapus </a>

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


<!-- Modal -->
<div class=" modal fade" id="newpendudukModal" tabindex="-1" aria-labelledby="newpendudukModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newpendudukModalLabel">Tambahkan penduduk Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pegawai/'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="bmd-label-floating">NIK</label>
                        <input type="Number" class="form-control" id="nik" name="nik">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">No.HP</label>
                        <input type="Number" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tl" name="tl">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <select name="kelurahan" id="kelurahan" class="form-control">
                            <option value="">Pilih Kelurahan</option>
                            <option value="Karya Mulya">Karya Mulya</option>
                            <option value="Lebung Gajah">Lebung Gajah</option>
                            <option value="Srimulya">Srimulya</option>
                            <option value="Suka Mulya">Suka Mulya</option>
                        </select>
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

</body>