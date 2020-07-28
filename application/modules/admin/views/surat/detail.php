<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header with-border">
      <a href="<?= base_url('admin/surat'); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a><br><br>
      <h3 class="box-title">Pesan dari <?= $surat->instansi_asal; ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <div class="mailbox-read-info">
        <h3> <?= $surat->instansi_asal; ?></h3>
        <h5> <?= $surat->kontak; ?>
          <span class="mailbox-read-time pull-right"><?= format_indo($surat->date_created) ?></span></h5>
      </div>

      <div class="mailbox-read-message">
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
              <a href="<?= base_url('admin/surat/download/' . $surat->id_surat) ?>" class="btn btn-default pull-right"><i class="fa fa-cloud-download"></i></a>
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
      <a href="<?= base_url('admin/surat/delete/' . $surat->id_surat); ?>" class="btn btn-default tombol-hapus"><i class="fa fa-trash-o"></i> Hapus</a>
      <!-- <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button> -->
    </div>
    <!-- /.box-footer -->
  </div>
  <!-- /. box -->
</div>