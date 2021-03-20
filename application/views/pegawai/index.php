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
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#newsuratModal">Tambah Surat</a>
                                <div class="row">
                                    <div class="col">

                                        <div class="table-responsive">
                                            <table class="table table-hover" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Nama Surat</th>
                                                        <th scope="col">Kategori</th>
                                                        <th scope="col">Bidang</th>
                                                        <th scope="col">Persyaratan</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($surat as $s) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $s['nm_surat']; ?></td>
                                                            <td><?= $s['nm_kategori']; ?></td>
                                                            <td><?= $s['nm_bidang']; ?></td>
                                                            <td><?= $s['syarat']; ?></td>
                                                            <td>
                                                                <a href="" class="btn btn-primary btn-sm">Akses </a>
                                                                <a href="<?= base_url('pegawai/edit_surat/') . $s['id_surat']; ?>" class="btn btn-warning btn-sm">Edit </a>

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
<div class=" modal fade" id="newsuratModal" tabindex="-1" aria-labelledby="newsuratModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsuratModalLabel">Tambahkan Surat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pegawai/'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama Surat</label>
                        <input type="text" class="form-control" id="surat" name="surat">
                    </div>
                    <div class="form-group">
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id_kategori']; ?>"><?= $k['nm_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="bidang" id="bidang" class="form-control">
                            <option value="">Pilih Bidang</option>
                            <?php foreach ($bidang as $b) : ?>
                                <option value="<?= $b['id']; ?>"><?= $b['nm_bidang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Persyaratan</label>
                        <input type="text" class="form-control" id="syarat" name="syarat">
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