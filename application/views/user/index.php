<div class="content" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-2.jpg">
    <div class="container-fluid">

        <div class="row ">
            <div class="col-lg-7">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="card">
                                <div class="card-header card-header-success">
                                    <h3 class="card-title">Perizinan</h3>
                                </div>
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#newSuratModal"> Tambah Surat Baru</a>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">

                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Perihal</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $i = 1;
                                                    $querySurat = "SELECT *
                                                                FROM surat 
                                                                  WHERE id_kategori = 1
                                                                  ";
                                                    $surat = $this->db->query($querySurat)->result_array();
                                                    ?>
                                                    <?php foreach ($surat as $s) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $s['nm_surat']; ?></td>
                                                            <td>
                                                                <a href="" class="btn btn-primary">Ajukan </a>

                                                                <?php $i++; ?>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header card-header-success">
                                    <h3 class="card-title">Non-Perizinan</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Perihal</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    $querySurat = "SELECT *
                                                                FROM surat 
                                                                  WHERE id_kategori = 2
                                                                  ";
                                                    $surat = $this->db->query($querySurat)->result_array();
                                                    ?>
                                                    <?php foreach ($surat as $s) : ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td><?= $s['nm_surat']; ?></td>
                                                            <td>
                                                                <a href="" class="btn btn-primary">Ajukan </a>

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

-- Modal -->
<div class=" modal fade" id="newSuratModal" tabindex="-1" aria-labelledby="newSuratModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSuratModalLabel">Tambahkan Surat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/inputsurat'); ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Kategori Surat</option>
                            <?php foreach ($surat as $m) : ?>
                                <option value="<?= $k['id_kategori']; ?>"><?= $k['nm_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Nama Surat</label>
                        <input type="text" class="form-control" id="nama" name="nama">
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