<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('_layout/header.php'); ?>
</head>
<body>
    <?php include('_layout/sidebar.php'); ?>

    <?php include('_layout/topbar.php'); ?>

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        </div>

        <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Registrasi Jadwal</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jadwal ?></div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span>Since last month</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Hasil Konsultasi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $konsultasi ?></div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-info mr-2"><i class="fas fa-arrow"></i> 0%</span>
                                    <span>Since last years</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Registrasi Mahasiswa</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $registrasi ?></div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 2.4%</span>
                                    <span>Since last month</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Admin</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $admin ?></div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-info mr-2"><i class="fas fa-arrow"></i> 100%</span>
                                    <span>Since yesterday</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="padding-top: 5%; padding-bottom: 5%; text-align: center">
                <h1>
                    Selamat Datang di<br>
                    SISTEM ADMINISTRATOR <br>
                    APLIKASI E-DETECTION
                </h1>
            </div>
            
            
        
        </div>
        <!--Row-->

    </div>
    <!---Container Fluid-->

    <?php include('_layout/footer.php'); ?>
    
</body>
</html>