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
        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Fitur
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data_mahasiswa'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Mahasiswa</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data_psikolog'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Psikolog</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('data_hasilKonsultasi'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Riwayat Konsultasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('riwayat_jadwal'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Riwayat Jadwal</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Pengaturan
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('aktivasi_user/'); ?>">
            <i class="fas fa-cogs fa-sm fa-fw"></i>
            <span>Aktivasi User</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('nonaktivasi_user'); ?>">
            <i class="fas fa-cogs fa-sm fa-fw"></i>
            <span>Nonaktivasi User</span>
        </a>
    </li>
    <li class="nav-item">   
        <a class="nav-link" href="<?= base_url('administrator'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Administrator</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="" id=""></div>
</ul>
<!-- Sidebar -->