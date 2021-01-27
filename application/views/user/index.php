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