    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">SIMAG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if ($this->uri->segment(1) == '') {
                                  echo 'active';
                                } ?>">
              <a class="nav-link " href="<?= base_url(); ?>"> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment(2) == 'auth') {
                                  echo 'active';
                                } ?>">
              <a class="nav-link" href="<?= base_url('home/auth'); ?>">Daftar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a href="<?= base_url('home/auth/register'); ?>" class="btn btn-warning" type="submit"><i class="fa fa-user-plus"></i> Register</a>
            <a href="<?= base_url('home/auth'); ?>" class="ml-2 btn btn-warning text-white" type="submit"><i class="fa fa-sign-in"></i> Login</a>
          </form>
        </div>
      </div>
    </nav>