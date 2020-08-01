<?php
$banner = $this->Crud_model->listingOne('tbl_konfigurasi', 'id_konfigurasi', '1');
?>

<style>
  .banner_part {
    height: 800px;
    display: flex;
    align-items: center;
    position: relative;
    background-image: url("<?= base_url('assets/uploads/' . $banner->banner); ?>");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
<!-- banner part start-->
<section class="banner_part">
  <div class="container">
    <div class="row align-content-center">
      <div class="col-lg-7 col-xl-5">
        <div class="banner_text">
          <h1><span><?= $banner->topik_banner; ?></span></h1>
          <p><?= $banner->deskripsi_banner; ?></p>
          <a href="<?= base_url('home/register') ?>" class="btn_1">Register<span class="ti-angle-right"></span> </a><br>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- banner part start-->