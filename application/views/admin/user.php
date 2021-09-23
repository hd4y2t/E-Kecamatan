<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col">
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
                                                        <!-- <th scope="col">foto</th> -->
                                                        <th scope="col">role</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($akun as $k) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $k['username']; ?></td>
                                                            <td><?= $k['nama']; ?></td>
                                                            <!-- <td><?= $k['foto']; ?></td> -->
                                                            <td><?= $k['role']; ?></td>
                                                            <td>
                                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#newModeluseredit<?= $k['id_user']; ?>"><i class="material-icons">edit</i></a>
                                                                <a href="" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>

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
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label class="label-control">Hak Akses</label>
                        <select class="selectpicker" name="role" id="role" data-style="btn btn-success btn-round" title="Single Select" data-size="7">
                            <option disabled selected>Pilih Hak Akses</option>
                            <?php foreach ($role as $b) : ?>
                                <option value="<?= $b['id']; ?>"><?= $b['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
                        <button type="Submit" class="btn btn-success">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<?php
$no = 0;
foreach ($akun as $k) : $no++; ?>
    <div class="modal fade" id="newModeluseredit<?= $k['id_user']; ?>" tabindex="-1" aria-labelledby="newModelusereditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newModelusereditLabel">Edit user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/edituser/') . $k['id_user']; ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="bmd-label-floating">Usernmae</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $k['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $k['nama']; ?>">
                        </div>
                        <div class=" form-group">
                            <label class="bmd-label-floating">Nomor induk pegawai</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="<?= $k['nip']; ?>">
                        </div>
                        <div class=" form-group">
                            <label class="bmd-label-floating">Password</label>
                            <input type="password" class="form-control" id="passsword" name="passsword" value="<?= $k['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="label-control">Hak Akses</label>
                            <select class="selectpicker" name="role" id="role" data-style="btn btn-success btn-round" title="Single Select" data-size="7">
                                <option disabled selected>Pilih Hak Akses</option>
                                <?php foreach ($role as $b) : ?>
                                    <option value="<?= $b['id']; ?>"><?= $b['role']; ?></option>
                                <?php endforeach; ?>
                            </select>
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
<?php endforeach ?>
</body>