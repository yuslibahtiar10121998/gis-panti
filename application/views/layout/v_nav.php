<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="<?= base_url() ?>template/assets/img/panti.png" class="user-image img-responsive" />

                <!-- menu utama -->
            </li>
            <?php if ($this->session->userdata('user') <> "") { ?>
                <?php if ($this->session->userdata('user')->is_dinas == '1') : ?>
                    <li>
                        <a href="<?= base_url('profildinas') ?>"><i class="fa fa-user fa-2x"></i> Profil Superadmin</a>
                    </li>
                    <li>
                        <a href="<?= base_url('panti') ?>"><i class="fa fa-list-ul fa-2x"></i> List Panti Asuhan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('adminpanti') ?>"><i class="fa fa-list fa-2x"></i> List Admin</a>
                    </li>
                    <li>
                        <a href="<?= base_url('rekap') ?>"><i class="fa fa-book fa-2x"></i> Rekap Data Statistik</a>
                    </li>

                <?php else : ?>
                    <li>
                        <a href="<?= base_url('profil') ?>"><i class="fa fa-home fa-2x"></i> Profil Panti Asuhan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('profiladmin') ?>"><i class="fa fa-user fa-2x"></i> Profil Admin Panti</a>
                    </li>
                    <li>
                        <a href="<?= base_url('anak') ?>"><i class="fa fa-users fa-2x"></i> Anak Asuh</a>
                    </li>

                <?php endif; ?>

                <!-- menu input -->
                <!-- <li>
                    <a href="#"><i class="fa fa-edit fa-2x"></i> Input Data<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php if ($this->session->userdata('user')->is_dinas == '1') : ?>
                            <li>
                                <a href="<?= base_url('panti/input') ?>"><i class="fa fa-plus fa-2x"></i>Input Data Panti asuhan</a>
                            </li>
                            <li>
                                <a href="<?= base_url('adminpanti/input') ?>"><i class="fa fa-plus fa-2x"></i>Input Data Admin Panti</a>
                            </li>


                        <?php else : ?>
                            <li>
                                <a href="<?= base_url('anak/input') ?>"><i class="fa fa-plus fa-2x"></i>Input Data Anak</a>
                            </li>
                        <?php endif; ?>
                    </ul> -->
            <?php } ?>
        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2><?= $title; ?></h2>

            </div>
        </div>
        <!-- /. ROW  -->
        <hr />