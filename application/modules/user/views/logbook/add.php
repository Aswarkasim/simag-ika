<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  <i class="fa fa-plus"></i> Tambah Aktifitas
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Log</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('user/logbook/add'); ?>" method="POST">

        <input type="hidden" name="bantu" value="aa" id="">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" required class="form-control">
          </div>

          <div class="form-group">
            <label for="">Waktu</label>
            <div class="row">
              <div class="col-md-6">
                <input type="time" name="waktu_dari" required class="form-control">
              </div>
              <div class="col-md-6">
                <input type="time" name="waktu_sampai" required class="form-control">
              </div>
            </div>

          </div>

          <div class="form-group">
            <label for="">Aktifitas</label>
            <textarea name="aktifitas" id="editor" class="form-control" id="" required cols="30" rows="10"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace("editor");
</script>