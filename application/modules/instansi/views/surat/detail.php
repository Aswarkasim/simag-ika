<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
      <a href="<?= base_url('instansi/surat'); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a><br><br>
      <h3 class="box-title">Pesan dari <?= $surat->asal_instansi; ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <div class="mailbox-read-info">
        <h3> <?= $surat->asal_instansi; ?></h3>

        <span class="mailbox-read-time pull-right"><?= format_indo($surat->date_created) ?></span></h5>
      </div>


      <div class="mailbox-read-message">
        <table class="table">
          <tr>
            <td width="200px">Nama</td>
            <td>: <?= $surat->namalengkap; ?></td>
          </tr>
          <tr>
            <td width="200px">Tempat Lahir</td>
            <td>: <?= $surat->tempat_lahir; ?></td>
          </tr>
          <tr>
            <td width="200px">Jenis Kelamin</td>
            <td>: <?= $surat->jenis_kelamin; ?></td>
          </tr>
          <tr>
            <td width="200px">Kontak</td>
            <td>: <?= $surat->nohp; ?></td>
          </tr>
          <tr>
            <td width="200px">Alamat</td>
            <td>: <?= $surat->alamat; ?></td>
          </tr>
          <tr>
            <td width="200px">Asal Instansi</td>
            <td>: <?= $surat->asal_instansi; ?></td>
          </tr>

        </table>
        <?= $surat->deskripsi; ?>
      </div>
      <!-- /.mailbox-read-message -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <ul class="mailbox-attachments clearfix">
        <li>
          <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

          <div class="mailbox-attachment-info">
            <a href="<?= base_url() . $surat->dokumen; ?>" target="_blank" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Lampiran Surat</a>
            <span class="mailbox-attachment-size">

              <?php $this->load->helper('download') ?>
              <a href="<?= base_url('instansi/surat/download/' . $surat->id_surat) ?>" class="btn btn-default pull-right"><i class="fa fa-cloud-download"></i></a>
            </span>
          </div>
        </li>

      </ul>
    </div>
    <!-- /.box-footer -->
    <div class="box-footer">
      <!-- <div class="pull-right">
        <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
        <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
      </div> -->
      <a href="<?= base_url('instansi/surat/delete/' . $surat->id_surat); ?>" class="btn btn-default tombol-hapus"><i class="fa fa-trash-o"></i> Hapus</a>
      <?php if ($peserta->is_accept != 'diterima') { ?>
        <a class="btn btn-success" href="<?= base_url('instansi/surat/is_accept/' . $peserta->id_peserta . '/' . $surat->id_surat  . '/diterima')  ?>"><i class="fa fa-thumbs-o-up"></i> Terima</a>
      <?php } else { ?>
        <a class="btn btn-danger" href="<?= base_url('instansi/surat/is_accept/' . $peserta->id_peserta . '/' . $surat->id_surat  . '/ditolak')  ?>"><i class="fa fa-thumbs-o-down"></i>Batal Terima</a>
      <?php } ?>
      <!-- <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button> -->
    </div>
    <!-- /.box-footer -->
  </div>
  <!-- /. box -->
</div>