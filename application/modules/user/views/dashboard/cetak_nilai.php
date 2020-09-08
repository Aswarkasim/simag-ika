<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sertifikat</title>
  <link rel="stylesheet" href="<?= base_url('assets/home/') ?>css/bootstrap.css">
  <style type="text/css">
    body {
      font-family: sans-serif;
    }

    @page {
      size: landscape;
      padding: 0px;
      margin: 0px;
    }

    .pembungkus {
      position: relative;
    }

    .dalam {
      position: absolute;
      width: 900px;
      left: 110px;
      top: 90px;
    }

    #qrCode {
      position: absolute;
      top: 10px;
      left: 10px;
    }

    table {
      background-color: transparent;
    }

    /* h2 {
            position: absolute;
            left: 410px;
            top: 320px;
        }

        p {
            position: absolute;
            left: 220px;
            top: 380px;
            width: 600px
        } */
  </style>
</head>

<body>
  <div class="pembungkus">
    <img id="sertifikat" src="<?= base_url('assets/uploads/nilai.jpg') ?>" alt="" width="100%">
    <div class="dalam">
      <center>
        <h4><strong> DAFTAR NILAI PRAKTIK KERJA INDUSTRI <br> SEKRETARIAT DAERAH KABUPATEN JENEPONTO</strong></h4>
      </center>
      <strong>
        <div class="row">
          <div class="col-md-6">
            <table>
              <tr>
                <td>Nama Peserta</td>
                <td>: <?= $peserta->namalengkap; ?></td>
              </tr>
              <tr>
                <td>Nomor Induk</td>
                <td>: <?= $peserta->nomor_induk; ?></td>
              </tr>
            </table>
          </div>
          <div class="col-md-6">
            <table>
              <tr>
                <td>Program Keahlian</td>
                <td>: <?= $peserta->jurusan; ?></td>
              </tr>
            </table>
          </div>
        </div>

      </strong>
      <table class="" border="1" cellpadding="6px" width="100%">
        <thead>
          <tr align="center">
            <th>NO</th>
            <th>ASPEK</th>
            <th>NILAI</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($nilai as $row) { ?>
            <tr align="center">
              <td width="50px"><?= $no++; ?></td>
              <td><?= $row->nama_aspek; ?></td>
              <td><?= $row->nilai; ?></td>
            </tr>
          <?php } ?>
          <tr align="center">
            <td colspan="2"><b> Rata-rata</b></td>
            <td><b><?= $rerata->rerata; ?></b></td>
          </tr>
      </table>
      <div class="row mt-5">
        <div class="offset-md-9 col-md-3">
          <div class="text-center">
            <p>Jeneponto, <?= date('D M Y') ?></p>
            <p>Pembimbing Lapangan</p><br><br><br>
            <!-- <p><?= $peserta->pembimbing; ?></p> -->
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    window.print()
  </script>
</body>

</html>