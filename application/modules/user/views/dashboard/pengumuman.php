<div class="jumbotron">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <a href="<?= base_url(); ?>" class="btn btn-success ml-1"><i class="fa fa-arrow-left"></i> Kembali</a>
      </div>
    </div>
    <br>

    <?php if ($peserta->is_accept == "diterima") { ?>
      <p class="alert alert-success"><i class="fa fa-check"></i> Selamat <b class="text-white"><?= $peserta->namalengkap; ?></b> !!! anda diterima untuk magang di <b class="text-white"><?= $peserta->nama_instansi; ?></b> </p>
    <?php } else if ($peserta->is_accept == "pending") { ?>
      <p class="alert alert-warning"><i class="fa fa-clock-o"></i> Saudara <b class="text-white"><?= $peserta->namalengkap; ?></b> !!! status anda masih dalam proses di <b class="text-white"><?= $peserta->nama_instansi; ?></b> </p>
    <?php } else { ?>
      <p class="alert alert-danger"><i class="fa fa-times"></i> Maaf, <b class="text-white"><?= $peserta->namalengkap; ?></b> !!! anda tidak diterima untuk magang di <b class="text-white"><?= $peserta->nama_instansi; ?></b> <br>
        Tetap Semangat yah 😊😊 !
      </p>
    <?php } ?>

  </div>
</div>