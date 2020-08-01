<div class=" modal fade" id="exampleModalCenterEditPenugasan<?= $peserta->id_peserta ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Penugasan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('instansi/peserta/editPenugasan/' . $peserta->id_peserta); ?>" method="POST">
        <div class="modal-body">
          <select class="form-control" name="id_pekerjaan">

            <option value=""></option>
            <?php foreach ($penugasan as $p) { ?>
              <option value="<?= $p->id_pekerjaan; ?>" <?php if ($p->id_pekerjaan == $peserta->id_pekerjaan) {
                                                          echo "selected";
                                                        } ?>><?= $p->nama_pekerjaan; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>