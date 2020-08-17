<section class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="<?= base_url(); ?>" class="btn btn-success ml-1"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
  </div>
  <br>

  <h2><b>Kirim Surat</b></h2>

  <div class="row">
    <div class="col-md-8">



      <?php

      echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');

      if (isset($error)) {
        echo '<div class="alert alert-warning">' . $error . '</div>';
      }

      echo form_open_multipart('user/surat/kirim')
      ?>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Nama Instansi Asal</label>
            <input type="text" class="form-control" name="instansi_asal" placeholder="SMKN 1 Jeneponto">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Dokumen Surat</label>
            <input type="file" class="form-control" name="dokumen">
            <small>Hanya dapat menerima format .*pdf</small>
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

</section>

<script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>