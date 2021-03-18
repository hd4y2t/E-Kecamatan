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
                                <?= form_error('submenu', '<div class="text-danger" kategori="alert">', '</div>'); ?>
                                <?= $this->session->flashdata('message'); ?>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value=" <?= $edit_submenu['title']; ?>">
                                        </div>
                                        <div class="form-group">

                                            <select name="menu_id" id="menu_id" class="form-control">
                                                <option value="">Pilih Bidang</option>
                                                <?php foreach ($menu as $m) : ?>
                                                    <?php if ($edit_submenu['menu_id'] == $m['id']) : ?>
                                                        <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                                    <?php endif; ?>

                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Url</label>
                                            <input type="text" class="form-control" id="url" name="url" value=" <?= $edit_submenu['url']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Icon</label>
                                            <input type="text" class="form-control" id="icon" name="icon" value=" <?= $edit_submenu['icon']; ?>">
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="Submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </form>

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