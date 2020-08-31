<?php

$id_peserta = $this->session->userdata('id_peserta');
$peserta = $this->Crud_model->listingOne('tbl_peserta', 'id_peserta', $id_peserta);
?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="gagal" data-flashdata="<?= $this->session->flashdata('msg_er') ?>"></div>

<div class="jumbotron mb-0 pb-2 pt-2">
  <div class="container">
    <div class="row">
      <div class="col-md-1">
        <img width="100%" src="<?= base_url('assets/uploads/images/logo.png'); ?>" alt="">
      </div>
      <div class="col-md-11">
        <h2 class="mb-0"><b>SEKDA JENEPONTO</b></h2>
        <h3><b> PEMERINTAH KABUPATEN JENEPONTO</b></h3>
      </div>
    </div>
  </div>
</div>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">SISTEM INFORMASI MAGANG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <!-- <li class="nav-item <?php if ($this->uri->segment(1) == '') {
                                    echo 'active';
                                  } ?>">
          <a class="nav-link " href="<?= base_url(); ?>"> Beranda <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?php if ($this->uri->segment(2) == 'pengumuman') {
                              echo 'active';
                            } ?>">
          <a class="nav-link" href="<?= base_url('home/pengumuman'); ?>">Pengumuman</a>
        </li>

        <li class="nav-item <?php if ($this->uri->segment(2) == 'panduan') {
                              echo 'active';
                            } ?>">
          <a class="nav-link" href="<?= base_url('home/panduan'); ?>">Panduan</a>
        </li>

        <li class="nav-item <?php if ($this->uri->segment(2) == 'profil') {
                              echo 'active';
                            } ?>">
          <a class="nav-link" href="<?= base_url('home/profil'); ?>">Profil</a>
        </li> -->


      </ul>

      <form class="form-inline my-2 my-lg-0">
        <!-- <a href="<?= base_url('home/surat'); ?>" class="mr-2 btn btn-warning text-white"><i class="fa fa-envelope"></i> Kirim Surat</a> -->
        <?php if ($this->session->userdata('id_peserta')) { ?>
          <a href="<?= base_url('user/dashboard'); ?>" class="ml-2 btn btn-warning text-white"><i class="fa fa-user"></i> <?= $peserta->namalengkap; ?></a>
        <?php } else { ?>
          <a href="<?= base_url('home/auth/register'); ?>" class="btn btn-warning"><i class="fa fa-user-plus"></i> Register</a>
          <a href="<?= base_url('home/auth'); ?>" class="ml-2 btn btn-warning text-white"><i class="fa fa-sign-in"></i> Login</a>
        <?php } ?>
      </form>
    </div>
  </div>
</nav>