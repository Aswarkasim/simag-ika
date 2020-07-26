<?php

//$this->load->view('user/headprofil');

?>

<div class="container">
  <?php $this->load->view('user/nav'); ?>
  <div class="row">
    <div class="col-md-12">
      <br>

      <div class="row">
        <?php include('list_satuan_waktu.php') ?>

      </div>
      <div class="row">
        <div class="col-md-12">

          <table class="table DataTable">
            <thead>
              <tr>
                <td width="50px">No</td>
                <td width="150px">Satuan Waktu</td>
                <td width="150px">Waktu</td>
                <td>Keterangan</td>
                <td width="200px">Tindakan</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>01/02/1998</td>
                <td>08:00</td>
                <td>lorem ipsum</td>
                <td>
                  <button class="btn btn-xs btn-success"><i class="fa fa-edit"></i></button>
                  <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>


    </div>
  </div>
</div>