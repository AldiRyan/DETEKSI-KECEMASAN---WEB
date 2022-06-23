<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
            <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">
                <?php $user_data = $this->session->userdata('userdata') ?>
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/'); ?>img/boy.png" style="max-width: 60px">
                        <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $user_data['nim_mhs'] ?></span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Topbar -->