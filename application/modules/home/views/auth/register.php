<div class="jumbotron bg-white">
  <div class="row text-center">
    <div class="container-fluid">
      <div class="offset-md-3 col-md-6">
        <form action="<?= base_url('home/auth/register')  ?>" method="post">
          <h1 class="h3 mb-3 font-weight-normal">Registrasi</h1>

          <?= validation_errors('<div class="text text-danger">', '</div>') ?>

          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="" class="pull-right"><strong>Nama Lengkap</strong></label>
              </div>
              <div class="col-md-8">
                <input class="form-control" name="namalengkap" placeholder="Nama Lengkap" type="text" value="<?= set_value('namalengkap') ?>">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="" class="pull-right"><strong>Username</strong></label>
              </div>
              <div class="col-md-8">
                <input class="form-control" name="username" placeholder="Username" type="text" value="<?= set_value('username') ?>">
              </div>
            </div>
          </div>

          <div class="form-gorup">
            <div class="row">
              <div class="col-md-4">
                <label for="" class="pull-right"><strong>Alamat Email</strong></label>
              </div>
              <div class="col-md-8">
                <input class="form-control" name="email" placeholder="Email" type="email" value="<?= set_value('email') ?>">
              </div>
            </div>
          </div><br>

          <div class="form-gorup">
            <div class="row">
              <div class="col-md-4">
                <label for="" class="pull-right"><strong>No Hp</strong></label>
              </div>
              <div class="col-md-8">
                <input class="form-control" name="nohp" placeholder="No. Hp" type="text" value="<?= set_value('nohp') ?>">
              </div>
            </div>
          </div>
          <br>

          <div class="form-gorup">
            <div class="row">
              <div class="col-md-4">
                <label for="" class="pull-right"><strong>Daftar di Instansi</strong></label>
              </div>
              <div class="col-md-8">
                <select name="id_instansi" id="" class="form-control">
                  <option value="">-- Daftar di Instansi --</option>
                  <?php foreach ($instansi as $row) { ?>
                    <option value="<?= $row->id_instansi; ?>"><?= $row->nama_instansi; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <br>





          <div class="form-group">
            <div class="row">
              <div class="col-md-4 pull-right">
                <label for="inputPassword" class="pull-right"><strong> Password</strong></label>
              </div>
              <div class="col-md-8">
                <input class="form-control" name="password" placeholder="Password" type="password">
                <small>Password minimal 6 karakter</small>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="inputPassword" class="pull-right"><strong> Ketik Ulang Password</strong></label>
              </div>
              <div class="col-md-8">
                <input type="password" class="form-control" name="re_password" placeholder="Password" type="Ketik ulang password">
                <small>Masukkan ulang password</small>
              </div>
            </div>
          </div>

          <button class="btn btn-success" type="submit"><i class="fa fa-folder"></i> Registrasi</button><br><br>
          <p>Sudah punya akun? silakan <a href="<?= base_url('home/auth') ?>">Login</a></p>
          <p class="mt-5 mb-3 text-muted">© 2017-2019</p>


        </form>
      </div>
    </div>
  </div>
</div>