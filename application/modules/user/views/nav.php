<ul class="nav nav-tabs">
    <li class="nav-link <?php if ($this->uri->segment('2') == 'dashboard') {
                            echo 'active';
                        } ?>">
        <a href="<?= base_url('user/dashboard') ?>" role="tab" class="control-item">Dashboard</a>
    </li>

    <li class="nav-link <?php if ($this->uri->segment('2') == 'profil') {
                            echo 'active';
                        } ?>">
        <a href="<?= base_url('user/profil') ?>" role="tab" class="control-item">Profil</a>
    </li>

    <li class="nav-link <?php if ($this->uri->segment('2') == 'logbook') {
                            echo 'active';
                        } ?>">
        <a href="<?= base_url('user/logbook') ?>" role="tab" class="control-item">Logbook</a>

    <li class="nav-link <?php if ($this->uri->segment('2') == 'password') {
                            echo 'active';
                        } ?>">
        <a href="<?= base_url('user/password') ?>" role="tab" class="control-item">Ubah Password</a>
    </li>

</ul>