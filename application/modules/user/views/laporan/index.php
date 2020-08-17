<section class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="<?= base_url(); ?>" class="btn btn-success ml-1"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
  </div>
  <br>

  <h2><b>Kirim Laporan</b></h2>

  <?php if ($laporan != null) { ?>
    <p class="alert alert-success"><i class="fa fa-check"></i> Anda telah mengirimkan laporan, anda ingin <a href="<?= base_url('user/laporan/delete/' . $laporan->id_laporan); ?>" class="kirim-ulang"><b class="text-white"> kirim ulang?</b></a></p>
  <?php } else { ?>

    <div class="row">
      <div class="col-md-8">



        <?php

        echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');

        if (isset($error)) {
          echo '<div class="alert alert-warning">' . $error . '</div>';
        }

        echo form_open_multipart('user/laporan/kirim')
        ?>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Dokumen Surat</label>
              <input required type="file" class="form-control" name="dokumen">
              <small>Hanya dapat menerima format .*pdf, *.doc, dan *.docx</small>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Deskripsi</label>
              <textarea name="deskripsi" id="editor" class="form-control" cols="30"></textarea>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="float-right">
              <button class="btn btn-warning" type="Submit"> Kirim <i class="fa fa-telegram"></i></button>
            </div>
          </div>
        </div>
        <?php form_close() ?>

      </div>
    </div>
  <?php } ?>

</section>

<script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>