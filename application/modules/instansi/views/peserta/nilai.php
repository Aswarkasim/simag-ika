<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Nilai</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <?php
        echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
        ?>

        <form action="<?= base_url($add) ?>" method="post">


          <?php

          foreach ($nilai as $row) { ?>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <label for="" class="pull-right"><?= $row->nama_aspek; ?></label>
                </div>
                <div class="col-md-9">
                  <input type="number" name="aspek<?= $row->id_aspek ?>" value="<?= $row->nilai; ?>" required placeholder="<?= $row->nama_aspek; ?>" class="form-control">
                </div>
              </div>
            </div>
          <?php } ?>

          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
              </div>
              <div class="col-md-9">
                <label for="">Rata-rata : <?= $rerata->rerata; ?></label>
                <input type="hidden" name="nilai" value="<?= $rerata->rerata; ?>" id="">
              </div>
            </div>
          </div>




          <div class="form-group">
            <div class="row">
              <div class="col-md-3">

              </div>
              <div class="col-md-9">
                <a href="<?= base_url($back) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </div>

        </form>

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>