<?php

// $this->load->view('user/headprofil');
// print_r($logbook);
?>


<div class="container">



  <!-- <?php// $this->load->view('user/nav'); ?> -->
  <div class="row">
    <a href="<?= base_url(); ?>" class="btn btn-success ml-1"><i class="fa fa-arrow-left"></i> Kembali</a>
    <div class="col-md-12">
      <br>

      <div class="row">
        <?php include('add.php') ?>
        <a href="<?= base_url('user/logbook/printLogbook'); ?>" target="_blank" class="btn btn-primary ml-1"><i class="fa fa-print"></i> Print</a>
      </div><br>
      <div class="row">
        <div class="col-md-12">

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
              <?php foreach ($logbook as $row) { ?>
                <tr>
                  <td><?= ++$from; ?></td>
                  <td><?= $row->tanggal; ?></td>
                  <td><?= $row->waktu_dari . ' - ' . $row->waktu_sampai; ?></td>
                  <td><?= $row->aktifitas; ?></td>
                  <td>
                    <?php include('edit.php') ?>
                    <a href="<?= base_url('user/logbook/delete/' . $row->id_logbook); ?>" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <?= $pagination ?>
        </div>
      </div>


    </div>
  </div>
</div>

<script>
  $(function() {
    $('.DataTable').DataTable();

  })
</script>