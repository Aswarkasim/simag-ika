<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="<?= base_url(); ?>" class="btn btn-success ml-1"><i class="fa fa-arrow-left"></i> Kembali</a>
      <!-- <a href="<?= base_url(); ?>" class="btn btn-success ml-1"><i class="fa fa-arrow-left"></i> Cetak</a> -->
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>NO</th>
            <th>ASPEK</th>
            <th>NILAI</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($nilai as $row) { ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $row->nama_aspek; ?></td>
              <td><?= $row->nilai; ?></td>
            </tr>
          <?php } ?>
          <tr>
            <td colspan="2"><b> Rata-rata</b></td>
            <td><b><?= $rerata->rerata; ?></b></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


</div>