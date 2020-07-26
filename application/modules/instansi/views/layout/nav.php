<?php

$id_user = $this->session->userdata('id_user');
$role = $this->session->userdata('role');

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
                        ?>"><a href="<?php echo base_url('instansi/dashboard')
                                        ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="<?php if ($this->uri->segment(2) == "peserta") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('instansi/peserta')
                                        ?>"><i class="fa fa-users"></i> <span>Peserta</span></a></li>

            <li class="treeview <?php if ($this->uri->segment(2) == "user") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-file"></i> <span>Penilaian</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(2) == "instansi") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('instansi/aspek') ?>">Aspek</a></li>

                </ul>
            </li>



            <li class=""><a href="<?php echo base_url() ?>" target="blank"><i class="fa fa-home"></i> <span>Home</span></a></li>


        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">