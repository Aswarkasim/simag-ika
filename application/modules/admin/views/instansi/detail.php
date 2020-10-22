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

<div class="row">

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?= count($instansi); ?></h3>

        <p>Instansi</p>
      </div>
      <div class="icon">
        <i class="fa fa-building"></i>
      </div>
      <a href="<?= base_url('master/buku') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?= count($alumni); ?></h3>

        <p>Peserta Aktif</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="<?= base_url('master/penerbit') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?= count($alumni); ?></h3>

        <p>Alumni</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="<?= base_url('admin/peminjaman/index') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>