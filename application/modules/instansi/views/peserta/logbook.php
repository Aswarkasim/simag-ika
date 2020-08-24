<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Logbook <?= $peserta; ?></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <table class="table table-hover DataTable">
          <thead>
            <tr>
              <td width="50px">No</td>
              <td width="120px">Tanggal</td>
              <td width="150px">Waktu</td>
              <td>Keterangan</td>
              <td width="200px">Tindakan</td>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($logbook as $row) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->tanggal; ?></td>
                <td><?= $row->waktu_dari . ' - ' . $row->waktu_sampai; ?></td>
                <td><?= $row->aktifitas; ?></td>
                <td>
                  <?php// include('edit.php') ?>
                  <a href="<?= base_url('instansi/peserta/delete_logbook/' . $row->id_peserta . '/' .  $row->id_logbook); ?>" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>