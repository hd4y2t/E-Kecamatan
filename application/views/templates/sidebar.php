<div class="sidebar" data-color="green" data-background-color="white" data-image="<?= base_url(); ?>assets/img/sidebar-4.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <div class="card">
            <div class="card-header card-header-success">
                <a href="" class="simple-text logo-normal text-light">
                    E-Kecamatan
                    <br>
                    Sematang Borang
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-wrapper" id="slider">
        <!-- Query menu -->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`,`menu`
                        FROM `user_menu` JOIN `user_access_menu` 
                          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                       WHERE `user_access_menu`.`role_id`= $role_id
                       ORDER BY `user_access_menu`.`menu_id` ASC
                       ";

        // $this->db->where('menu !=', 'User');
        $menu = $this->db->query($queryMenu)->result_array();

        ?>

        <!-- LOOPING MENU -->

        <?php foreach ($menu as $m) :
            // $menu != 'User';
        ?>

            <ul class="nav">
                <li class="nav-item">
                    <div class="sidebar-heading">
                        <?= $m['menu']; ?>
                    </div>
                </li>
                <!-- SIAPKAN SUB MENU SESUAI MENU -->
                <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                                  FROM `user_sub_menu` 
                                 WHERE `menu_id` = $menuId
                                   AND `is_active`=1
               ";
                $subMenu = $this->db->query($querySubMenu)->result_array();

                ?>

                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($title == $sm['title']) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                            <i class="material-icons"><?= $sm['icon']; ?></i>
                            <p><?= $sm['title']; ?></p>
                        </a>

                        </li>
                    <?php endforeach; ?>

                <?php endforeach; ?>
                <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                        <i class="material-icons">west</i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
    </div>
</div>