<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-6">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <?= form_error('user', '<div class="text-danger" user="alert">', '</div>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#newuserModal">Tambah user</a>
                                <div class="row">
                                    <div class="col">

                                        <div class="table-responsive">
                                            <table class="table table-hover" id="myTable">
                                                <thead class="text-success">
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Username</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">foto</th>
                                                        <th scope="col">role</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($user as $u) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $k['username']; ?></td>
                                                            <td><?= $k['nama']; ?></td>
                                                            <td><?= $k['foto']; ?></td>
                                                            <td><?= $k['role']; ?></td>
                                                            <td>
                                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#newModelkategoriedit<?= $k['id_user']; ?>">Edit</a>
                                                                <a href="" class="btn btn-danger btn-sm">Hapus</a>

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


<!-- Modal -->
<div class=" modal fade" id="newuserModal" tabindex="-1" aria-labelledby="newuserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newuserModalLabel">Tambahkan User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/user'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="bmd-label-floating">Usernmae</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Nomor induk pegawai</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input type="text" class="form-control" id="passsword" name="passsword">
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Role</label>
                        <input type="text" class="form-control" id="role" name="role">
                    </div>
                    <div class="form-group">
                        <tr>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" id="active" name="active" type="checkbox" value="1" checked>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                            <td>
                                Aktif ?
                            </td>
                            </label>
                            </td>
                        </tr>
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

<!-- Modal -->
<?php
$no = 0;
foreach ($kategori as $k) : $no++; ?>
    <div class=" modal fade" id="newModelkategoriedit<?= $k['id_kategori']; ?>" tabindex="-1" aria-labelledby="newModelkategorieditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newModelkategorieditLabel">Edit Nama kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('pegawai/editkategori/') . $k['id_kategori']; ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $k['id_kategori']; ?>">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama kategori</label>
                            <input type="text" class="form-control" id="nm_kategori" name="nm_kategori" value="<?= $k['nm_kategori']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <button type="Submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
</body>