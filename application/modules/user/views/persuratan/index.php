<?php

//$this->load->view('user/headprofil');

?>
<link rel="stylesheet" href="<?= base_url('assets/admin/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">


<div class="container">
  <?php $this->load->view('user/nav'); ?>
  <div class="row">
    <div class="col-md-12">
      <br>
      <strong>
        <h6>Logbook <?= $this->session->userdata('namalengkap'); ?></h6>
      </strong>
      <!-- <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
            </div><br> -->

      <div class="row">
        <div class="col-md-12">


        </div>
      </div>


    </div>
  </div>
</div>

<script src="<?= base_url('assets/admin/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function() {
    $('.DataTable').DataTable();
  })
</script>