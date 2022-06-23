<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/'); ?>img/logo/polije.png">
        </div>
        <div class="sidebar-brand-text mx-3">E-Detection</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('user/home'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Fitur
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/profil'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/uji_kecemasan'); ?>">
            <i class="fas fa-cogs fa-sm fa-fw"></i>
            <span>Uji Kecemasan</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('login/logout') ?>">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="" id=""></div>
</ul>
<!-- Sidebar -->