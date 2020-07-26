<?php $this->load->view('user/headprofil'); ?>
<div class="container pt-0">
    <?php $this->load->view('user/nav');

    if (isset($error)) {
        echo $error;
    }
    echo form_open_multipart('user/profil/edit');

    ?>
    <form method="post">
        <div class="row pt-5">
            <div class="col-md-8">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9">
                            <?= validation_errors('<p class="alert alert-danger">', '</p>') ?>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">Nama</label></b>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="namalengkap" value="<?= $peserta->namalengkap ?>">
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">Username</label></b>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" disabled name="username" value="<?= $peserta->username_peserta ?>">
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">Email</label></b>
                        </div>
                        <div class="col-md-9">
                            <input type="text" placeholder="Email" class="form-control" name="email" value="<?= $peserta->email ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">No Hp</label></b>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="No. Hp." name="nohp" value="<?= $peserta->nohp ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">Jenis Kelamin</label></b>
                        </div>
                        <div class="col-md-9">
                            <select required name="jenis_kelamin" class="form-control" id="">
                                <option value="">--Jenis Kelamin--</option>
                                <option value="L" <?php if ($peserta->jenis_kelamin == 'L') {
                                                        echo "selected";
                                                    } ?>>Laki-laki</option>
                                <option value="P" <?php if ($peserta->jenis_kelamin == 'P') {
                                                        echo "selected";
                                                    } ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">Alamat</label></b>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= $peserta->alamat ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">Asal Instansi</label></b>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Asal Instansi" name="asal_instansi" value="<?= $peserta->asal_instansi ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <b><label class="pull-right">Motto</label></b>
                        </div>
                        <div class="col-md-9">
                            <textarea name="motto" class="form-control" placeholder="Motto" id="" cols="30" rows="10">
                                <?= $peserta->motto; ?>
                            </textarea>
                        </div>
                    </div><br>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <b><label class="pull-right">Gambar</label></b>
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="gambar">
                                <br>
                                <img width="200px" src="<?php if ($peserta->gambar == "") {
                                                            echo base_url('assets/uploads/images/default.jpg');
                                                        } else {
                                                            echo base_url($peserta->gambar);
                                                        } ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?= form_close() ?>
</div>