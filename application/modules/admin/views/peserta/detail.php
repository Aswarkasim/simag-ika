<div class="box">
  <div class="box-header">
    <h3 class="box-title"><strong><?= $peserta->namalengkap; ?></strong></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <div class="row">
      <div class="col-md-6">


        <table class="table" width="500px">
          <tr>
            <td align="right">Nama</td>
            <td>: <?= $peserta->namalengkap; ?></td>
          </tr>

          <tr>
            <td align="right">Username</td>
            <td>: <?= $peserta->username_peserta; ?></td>
          </tr>

          <tr>
            <td align="right">Tempat Lahir</td>
            <td>: <?= $peserta->tempat_lahir; ?></td>
          </tr>

          <tr>
            <td align="right">Tanggal Lahir</td>
            <td>: <?= $peserta->tgl_lahir; ?></td>
          </tr>

          <tr>
            <td align="right">Jenis Kelamin</td>
            <td>: <?= $peserta->jenis_kelamin; ?></td>
          </tr>

          <tr>
            <td align="right">Alamat</td>
            <td>: <?= $peserta->alamat; ?></td>
          </tr>

          <tr>
            <td align="right">No Hp</td>
            <td>: <?= $peserta->nohp; ?></td>
          </tr>

          <tr>
            <td align="right">Asal Instansi</td>
            <td>: <?= $peserta->asal_instansi; ?></td>
          </tr>

          <tr>
            <td align="right">Pembimbing</td>
            <td>: <?= $peserta->nama_pembimbing; ?>
              <!-- <a data-toggle="modal" data-target="#exampleModalCenterEdit<?= $peserta->id_peserta ?>">
                <i class="fa fa-edit"></i>
              </a> -->
            </td>
          </tr>
          <tr>
            <td align="right">Penugasan</td>
            <td>: <?= $peserta->nama_pekerjaan; ?>
              <!-- <a data-toggle="modal" data-target="#exampleModalCenterEditPenugasan<?= $peserta->id_peserta ?>">
                <i class="fa fa-edit"></i>
              </a> -->
            </td>
          </tr>

          <tr>
            <td align="right">Nilai</td>
            <td>:
              <?= $peserta->nilai; ?> <a href="<?= base_url('instansi/peserta/nilai/' . $peserta->id_peserta); ?>">
                <!-- <i class="fa fa-edit"></i></a> -->
            </td>
          </tr>

          <tr>
            <td align="right">Logbook</td>
            <td>:
              <!-- <a href="<?= base_url('instansi/peserta/logbook/' . $peserta->id_peserta); ?>">
                <i class="fa fa-spinner"></i> Lihat Logbook</a></td> -->
          </tr>

          <tr>
            <td align="right">Laporan</td>
            <td>:
              <?php if ($laporan) { ?>
                <a href="<?= base_url('instansi/peserta/download_laporan/' . $peserta->id_peserta); ?>"> <i class="fa fa-download"></i> Download Laporan</a></td>
          <?php } else {
                echo "Belum ada laporan";
              } ?>
          </tr>

          <tr>
            <td align="right">Foto</td>
            <td>: <img src="<?= base_url() . $peserta->gambar; ?>" alt="" width="200px"></td>
          </tr>




        </table>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>