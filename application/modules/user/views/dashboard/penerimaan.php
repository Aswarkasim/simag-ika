<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="<?= base_url(); ?>" class="btn btn-success ml-1"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <h3><strong>Peserta Magang</strong></h3><br>
    </div>
  </div>
  <div class="row">



    <?php foreach ($peserta as $row) { ?>
      <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <div class="p-2">
            <a href="">
              <h5><strong><?= $row->namalengkap; ?></strong></h5>
              <p><?= $row->asal_instansi; ?></p>
            </a>
          </div>
        </div>
      </div>

    <?php } ?>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <?= $pagination ?>
    </div>
  </div>


</div>