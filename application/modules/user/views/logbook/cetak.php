<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cetak Logbook</title>
  <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/bootstrap.css">
  <style type="text/css">
    /* body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        } */

    @page {
      size: portrait;
      margin-left: 100px;
      margin-right: 100px;
      margin-top: 50px;
      margin-bottom: 50px;
    }

    .pembungkus {
      position: relative;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="text-center">
      <h3>DATA LOGBOOK <?= strtoupper($this->session->userdata('namalengkap')); ?></h3>
      <!-- <h3><?= $konfigurasi->nama_aplikasi; ?></h3> -->
    </div>


    <table class="table table-bordered">
      <thead>
        <tr>
          <th width="40px">NO</th>
          <th width="120px">TANGGAL</th>
          <th width="150x">WAKTU</th>
          <th width="150x">DOKUMENTASI</th>
          <th>AKTIFITAS</th>
        </tr>
      </thead>
      <tbody id="targetData">
        <?php $no = 1;
        foreach ($logbook as $row) { ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $row->tanggal ?></td>
            <td><?= $row->waktu_dari . ' - ' . $row->waktu_sampai ?></td>
            <td><img src="<?= base_url($row->gambar); ?>" width="100px" alt=""></td>
            <td><?= $row->aktifitas ?></td>

          </tr>
        <?php $no++;
        } ?>
      </tbody>
    </table>

    <div class="row mt-5">
      <div class="offset-md-10 col-md-2">
        <div class="text-center">
          <p>Jeneponto, <?= date('D M Y') ?></p>
          <p>Pembimbing Lapangan</p><br><br><br>
          <hr>
        </div>
      </div>
    </div>

  </div>

  <script>
    window.print()
  </script>
</body>

</html>