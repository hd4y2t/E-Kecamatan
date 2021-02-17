<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">

        <div class="row ">
            <div class="col-lg-7">
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
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Nik</th>
                                                        <th scope="col">Kategori</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">file</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($antri as $a) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $m['NIK']; ?></td>
                                                            <td><?= $m['jenis_surat']; ?></td>
                                                            <td><?= $m['tanggal']; ?></td>
                                                            <td><?= $m['file']; ?></td>
                                                            <td>
                                                                <a href="" class="btn btn-primary">
                                                                    edit
                                                                </a>
                                                                <a href="<?= base_url(); ?>menu/delete/<?= $m['id']; ?>" onclick="return confirm('yakin?');" class="btn btn-danger">
                                                                    <i class="material-icons">delete</i>
                                                                </a>

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
</body>