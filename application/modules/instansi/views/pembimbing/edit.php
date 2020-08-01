<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenterEdit<?= $row->id_pembimbing ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Aspek</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('instansi/master/pembimbing/edit/' . $row->id_pembimbing); ?>" method="POST">

        <input type="hidden" name="bantu" value="aa" id="">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Nama Aspek</label>
            <input type="text" value="<?= $row->nama_pembimbing; ?>" name="nama_pembimbing" required class="form-control">
          </div>

          <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan" class="form-control" id="" required cols="20" rows="10"><?= $row->keterangan; ?></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <!-- </form> -->
    </div>
  </div>
</div>