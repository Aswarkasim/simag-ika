<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
  <div class="col-md-6">


    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Manajemen Pembimbing</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <p>
          <?php include('add.php') ?>
        </p>

        <table class="table DataTable">
          <thead>
            <tr>
              <th width="40px">No</th>
              <th width="100px">Nama Pembimbing</th>
              <th width="">Kerangan</th>
              <th width="100px">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($pembimbing as $row) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->nama_pembimbing; ?></td>
                <td><?= $row->keterangan; ?></td>
                <td>

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterEdit<?= $row->id_pembimbing ?>">
                    <i class="fa fa-edit"></i>
                  </button>
                  <a href="<?= base_url('instansi/master/pembimbing/delete/' . $row->id_pembimbing); ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                </td>
              </tr>

              <?php include('edit.php') ?>

            <?php } ?>
          </tbody>
        </table>

      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>