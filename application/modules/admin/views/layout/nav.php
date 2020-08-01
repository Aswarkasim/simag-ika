<?php

$id_user = $this->session->userdata('id_user');
$role = $this->session->userdata('role');
$jumlahSurat = count($this->Crud_model->listingOneAll('tbl_surat', 'is_read', '0'));
?>

<div class="conta">
    <div class="ada"></div>
</div>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>

            <li class="<?php if ($this->uri->segment(2) == "dahsboard") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/dashboard')
                                        ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="<?php if ($this->uri->segment(2) == "surat") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/surat')
                                        ?>"><i class="fa fa-envelope"></i> <span>Surat Masuk</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right"><?= $jumlahSurat; ?></span>
                    </span></a></li>
            <li class="<?php if ($this->uri->segment(2) == "instansi") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/instansi')
                                        ?>"><i class="fa fa-building"></i> <span>Instansi</span></a></li>


            <li class="<?php if ($this->uri->segment(2) == "peserta") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/peserta')
                                        ?>"><i class="fa fa-users"></i> <span>User/Peserta</span></a></li>

            <li class="treeview <?php if ($this->uri->segment(2) == "user") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-user"></i> <span>Manajemen Admin</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(2) == "user") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/user') ?>">List Admin</a></li>
                </ul>
            </li>

            <li class="treeview <?php if ($this->uri->segment(2) == "konfigurasi") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-cogs"></i> <span>Konfigurasi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(3) == "index") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/konfigurasi/index') ?>">General</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "banner") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/konfigurasi/banner') ?>">Banner</a></li>
                    <li class="<?php if ($this->uri->segment(3) == "panduan") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/konfigurasi/panduan') ?>">Panduan</a></li>
                </ul>
            </li>

            <li class=""><a href="<?php echo base_url() ?>" target="blank"><i class="fa fa-globe"></i> <span>Home</span></a></li>


        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">