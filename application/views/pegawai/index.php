<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-7">
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div>
                            <div class="card-body">
                                <?= form_error('role', '<div class="text-danger" role="alert">', '</div>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#newRoleModal">Tambah Surat</a>
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Katergori</th>
                                                    <th scope="col">Nama Surat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($surat as $s) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i ?></th>
                                                        <td><?= $s['kategori']; ?></td>
                                                        <td><?= $s['nm_surat']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/pegawai/edit_surat') . $s['id_surat']; ?>" class="btn btn-warning">akses </a>
                                                            <a href="" class="btn btn-primary">edit </a>

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
<div class=" modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambahkan Role Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama role</label>
                        <input type="text" class="form-control" id="role" name="role">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="Submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>