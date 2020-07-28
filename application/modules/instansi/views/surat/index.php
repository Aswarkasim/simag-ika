<?php
$this->load->helper('string');

?>
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"><strong>Surat Masuk</strong></h3>

      <div class="box-tools pull-right">
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">

        <div class="row">
          <div class="col-md-8">
            <a href="<?= base_url('instansi/surat'); ?>" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></a>
          </div>
          <div class="col-md-4">
            <form action="<?= base_url('instansi/surat/cari'); ?>" method="post">
              <div class="input-group margin">
                <input type="text" name="where" class="form-control" placeholder="cari">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive mailbox-messages">

              <style>
                .read-data {
                  color: darkgray;
                }

                .not-read-data {
                  color: #f4c000;
                }
              </style>

              <table class="table table-hover table-striped">
                <tbody>

                  <?php foreach ($surat as $row) { ?>
                    <tr>
                      <td class="mailbox-star"><a href="#"><i class="fa <?php if ($row->is_read == '1') {
                                                                          echo 'fa-envelope-open read-data';
                                                                        } else {
                                                                          echo 'fa-envelope not-read-data';
                                                                        } ?>"></i></a></td>
                      <td class="mailbox-name"><a href="<?= base_url('instansi/surat/detail/' . $row->id_surat); ?>"><?= $row->instansi_asal; ?></a></td>
                      <td class="mailbox-subject"><?= character_limiter($row->deskripsi, 50); ?></td>
                      <td class="mailbox-attachment"></td>
                      <td class="mailbox-date"><?= format_indo($row->date_created); ?></td>
                      <td><a href="<?= base_url('instansi/surat/delete/' . $row->id_surat); ?>" class="tombol-hapus"><i class="fa fa-trash"></i></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

              <!-- /.table -->
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <?php if (isset($pagination)) {
              echo $pagination;
            } ?>
          </div>
        </div>
        <!-- /.mail-box-messages -->
      </div>

    </div>
    <!-- /. box -->
  </div>