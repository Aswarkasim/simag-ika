<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UbahInstansi">
  <i class="fa fa-cogs"></i> Ubah Instansi
</button>

<!-- Modal -->
<div class="modal fade" id="UbahInstansi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Log</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?= form_open_multipart(base_url('user/profil/ubahInstansi')) ?>
      <form action="" method="POST">

        <div class="modal-body">
          <div class="form-group">
            <label for="">Ubah Instansi</label>
            <select name="id_instansi" class="form-control" id="">
              <option value="">--Ubah Instansi--</option>
              <?php foreach ($instansi as $row) { ?>
                <option value="<?= $row->id_instansi; ?>" <?php if ($row->id_instansi == $profil->id_instansi) {
                                                            echo "selected";
                                                          } ?>><?= $row->nama_instansi; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
      <?php form_close() ?>
    </div>
  </div>
</div>