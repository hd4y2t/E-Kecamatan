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
                                <?= form_error('bidang', '<div class="text-danger" bidang="alert">', '</div>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#newbidangModal">Tambah bidang</a>
                                <div class="row">
                                    <div class="col">

                                        <div class="table-responsive">
                                            <table class="table table-hover" id="myTable">
                                                <thead class="text-success">
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Nama Bidang</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($bidang as $b) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $b['nm_bidang']; ?></td>
                                                            <!-- <a href="<?= base_url("pegawai/editbidang/" . $b['id']); ?>" class="btn btn-warning">Edit</a> -->
                                                            <td>
                                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#newModelbidangedit<?php echo $b['id']; ?>"><i class="material-icons">edit</i></a>

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


<!-- Modal -->
<?php
$no = 0;
foreach ($bidang as $b) : $no++; ?>
    <div class=" modal fade" id="newModelbidangedit<?= $b['id']; ?>" tabindex="-1" aria-labelledby="newModelbidangeditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newModelbidangeditLabel">Edit Nama Bidang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('pegawai/editbidang/') . $b['id']; ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $b['id']; ?>">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama bidang</label>
                            <input type="text" class="form-control" id="nm_bidang" name="nm_bidang" value="<?= $b['nm_bidang']; ?>">
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
<!-- <script>
    $(document).ready(function() {
        // Untuk sunting
        $('#newModelbidangedit').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value", div.data('id'));
            modal.find('#nama').attr("value", div.data('nama'));

        });
    });
</script> -->
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


</body>