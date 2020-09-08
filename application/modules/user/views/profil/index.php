<?php

//$this->load->view('user/headprofil');

?>
<div class="jumbotron pt-3">
    <div class="container">
        <a href="<?= base_url(); ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i><i></i> Kembali</a><br><br>
        <div class="row">
            <div class="col-md-2">
                <img width="100%" src="<?php if ($profil->gambar == "") {
                                            echo base_url('assets/uploads/images/default.jpg');
                                        } else {
                                            echo base_url($profil->gambar);
                                        } ?>" alt="">
            </div>
            <div class="col-md-6">
                <div class="author-prof">@<?= $this->session->userdata('username_peserta') ?></div>
                <h6 class="author-name"><?= $this->session->userdata('namalengkap') ?></h6>
                <p><?= $profil->motto; ?></p>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <?php include('ubah_instansi.php') ?>
            </div>

        </div>
    </div>


    <div class="row">

        <div class="col-md-12">
            <br>
            <strong>
                <h6>Profil <?= $this->session->userdata('namalengkap'); ?></h6>
            </strong>
            <!-- <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
            </div><br> -->

            <!-- Ubah Instansi -->


            <table class="table">
                <tr>
                    <td width="300px">Nama Lengkap</td>
                    <td>: <?= $profil->namalengkap ?></td>
                </tr>
                <tr>
                    <td width="300px">Username</td>
                    <td>: <?= $profil->username_peserta ?></td>
                </tr>
                <tr>
                    <td width="300px">Jenis Kelamin</td>
                    <td>: <?= $profil->jenis_kelamin ?></td>
                </tr>
                <tr>
                    <td width="300px">Tanggal Lahir</td>
                    <td>: <?= $profil->tempat_lahir . ' ' . $profil->tgl_lahir ?></td>
                </tr>
                <tr>
                    <td width="300px">Email</td>
                    <td>: <?= $profil->email ?></td>
                </tr>
                <tr>
                    <td width="300px">No Hp</td>
                    <td>: <?= $profil->nohp ?></td>
                </tr>

            </table>
            <div class="pull-left">
                <a href="<?= base_url('user/profil/edit') ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
            </div>
        </div>
    </div>
</div>