<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Manajemen User</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <p>
            <a href="<?= base_url($add) ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>

        </p>

        <table class="table DataTable">
            <thead>
                <tr>
                    <th width="40px">No</th>
                    <th>Nama Lengkap</th>
                    <th width="">Penugasan</th>
                    <th width="100px">Nilai</th>
                    <th width="100px">Status</th>
                    <th width="200px">Tindakan</th>
                </tr>
            </thead>
            <tbody id="targetData">
                <?php $no = 1;
                foreach ($peserta as $row) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <a href="<?= base_url('instansi/peserta/detail/' . $row->id_peserta) ?>"><strong><?= $row->username_peserta ?></strong></a><br>
                            <p><?= $row->username_peserta ?> - <?= $row->id_peserta ?></p>
                        </td>
                        <td><?= $row->nama_pekerjaan; ?>

                        </td>

                        <td><?= $row->nilai ?></td>
                        <td><?php if ($row->is_active == 1) {
                                echo '<div class="label label-success">Aktif</div>';
                            } else {
                                echo '<div class="label label-danger">Tidak Aktif</div>';
                            } ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <?php if ($row->is_active == '1') { ?>
                                        <li><a href="<?= base_url($is_active . $row->id_peserta . '/0')  ?>"><i class="fa fa-power-off"></i> Non-Aktifkan</a></li>
                                    <?php } else { ?>
                                        <li><a href="<?= base_url($is_active . $row->id_peserta . '/1')  ?>"><i class="fa fa-power-off"></i> Aktifkan</a></li>
                                    <?php } ?>
                                    <li><a href="<?= base_url($edit . $row->id_peserta)  ?>"><i class="fa fa-edit"></i> Edit</a></li>
                                    <li><a class="tombol-hapus" href="<?= base_url($delete . $row->id_peserta)  ?>"><i class="fa fa-trash"></i> Hapus</a></li>
                                </ul>
                            </div>


                        </td>
                    </tr>

                <?php $no++;
                } ?>
            </tbody>
        </table>

    </div>
    <!-- /.box-body -->
</div>