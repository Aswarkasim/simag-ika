<div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"> <b><?= $instansi->nama_instansi; ?></b></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <a href="<?= base_url('admin/instansi/auth/' . $instansi->id_instansi); ?>" target="_blank" class="btn btn-primary"><i class="fa fa-dashboard"></i> Buka Dashboard Instansi</a>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>