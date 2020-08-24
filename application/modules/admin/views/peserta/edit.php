<div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $title ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ', '</div>');
                ?>

                <form action="<?= base_url($edit . $peserta->id_peserta) ?>" method="post">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Nama</label>
                            </div>
                            <div class="col-md-9">
                                <input value="<?= $peserta->username_peserta ?>" type="text" name="username" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Email</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" value="<?= $peserta->email ?>" name="email" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Instansi</label>
                            </div>
                            <div class="col-md-9">
                                <select name="id_instansi" class="form-control">
                                    <option value="none">--Instansi--</option>
                                    <?php foreach ($instansi as $row) { ?>
                                        <option value="<?= $row->id_instansi; ?>" <?php if ($row->id_instansi == $peserta->id_instansi) {
                                                                                        echo "selected";
                                                                                    } ?>><?= $row->nama_instansi; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Status</label>
                            </div>
                            <div class="col-md-9">
                                <select name="is_aktif" class="form-control">
                                    <option value="none">--Status--</option>
                                    <option value="0" <?php if ($peserta->is_active == "0") {
                                                            echo "selected";
                                                        } ?>>Tidak Aktif</option>
                                    <option value="1" <?php if ($peserta->is_active == "1") {
                                                            echo "selected";
                                                        } ?>>Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Password</label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Retype Password</label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" name="re_password" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-9">
                                <a href="<?= base_url($back) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>

                </form>



            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>