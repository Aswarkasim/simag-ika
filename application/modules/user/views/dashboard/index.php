<?php //$this->load->view('user/headprofil'); 
?>

<div class="jumbotron">

    <div class="container">
        <p class="alert alert-success">
            Selamat Datang, <?= $this->session->userdata('username_peserta'); ?> !!
        </p>
    </div>

</div>
<div class="container pt-0">
    <?php //$this->load->view('user/nav'); 
    ?>
    <div class="text-center">
        <h2></h2>
    </div>



    <div class="row">

        <div class="col-md-3">
            <a href="<?= base_url('user/surat'); ?>">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-bookmark fa-3x"></i>
                            </div>
                            <div class="col-md-9">
                                <p class="text-white"><strong> PENDAFTARAN</strong></p>
                                <hr>
                                <h4 class="card-text text-white">
                            </div>
                        </div>

                        <!-- <strong>AA</strong> -->
                        </h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?= base_url('user/dashboard/pengumuman'); ?>">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-bullhorn fa-3x"></i>
                            </div>
                            <div class="col-md-9">
                                <p class="text-white"><strong> PENGUMUMAN</strong></p>
                                <hr>
                                <h4 class="card-text text-white">
                            </div>
                        </div>

                        <!-- <strong>AA</strong> -->
                        </h4>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-md-3">
            <a href="<?= base_url('user/dashboard/penerimaan'); ?>">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-street-view fa-3x"></i>
                            </div>
                            <div class="col-md-9">
                                <p class="text-white"><strong> PENERIMAAN</strong></p>
                                <hr>
                                <h4 class="card-text text-white">
                            </div>
                        </div>

                        <!-- <strong>AA</strong> -->
                        </h4>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-md-3">
            <a href="<?= base_url('user/logbook'); ?>" target="_blank">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-unlink fa-3x"></i>
                            </div>
                            <div class="col-md-9">
                                <p class="text-white"><strong> PEKERJAAN</strong></p>
                                <hr>
                                <h4 class="card-text text-white">
                            </div>
                        </div>

                        <!-- <strong>AA</strong> -->
                        </h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?= base_url('user/laporan/index'); ?>">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-book fa-3x"></i>
                            </div>
                            <div class="col-md-9">
                                <p class="text-white"><strong> LAPORAN</strong></p>
                                <hr>
                                <h4 class="card-text text-white">
                            </div>
                        </div>

                        <!-- <strong>AA</strong> -->
                        </h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?= base_url('user/dashboard/nilai'); ?>">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-file-o fa-3x"></i>
                            </div>
                            <div class="col-md-9">
                                <p class="text-white"><strong> NILAI</strong></p>
                                <hr>
                                <h4 class="card-text text-white">
                            </div>
                        </div>

                        <!-- <strong>AA</strong> -->
                        </h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-building fa-3x"></i>
                            </div>
                            <div class="col-md-9">
                                <p class="text-white"><strong> PROFIL INSTANSI</strong></p>
                                <hr>
                                <h4 class="card-text text-white">
                            </div>
                        </div>

                        <!-- <strong>AA</strong> -->
                        </h4>
                    </div>
                </div>
            </a>
        </div>







    </div>
</div>