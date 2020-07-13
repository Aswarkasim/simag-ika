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

                <form action="<?= base_url($edit.$instansi->id_instansi) ?>" method="post">

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Nama Instansi</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="nama_instansi" value="<?= $instansi->nama_instansi ?>" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Username Instansi</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="username_instansi" value="<?= $instansi->username_instansi ?>" class="form-control">
                            <small>Username tidak menggunakan spasi</small>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="pull-right">Status</label>
                        </div>
                        <div class="col-md-9">
                            <select name="is_active" class="form-control">
                                <option value="none">--Status--</option>
                                <option <?php if ($user->is_active == "0") {echo "selected";} ?> value="0">Tidak Aktif</option>
                                <option <?php if ($user->is_active == "1") {echo "selected";} ?> value="1">Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>

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
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambah</button>
                        </div>
                    </div>
                </div>

                </form>



            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>