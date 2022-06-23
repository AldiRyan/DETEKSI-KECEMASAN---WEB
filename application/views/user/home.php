<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('component/header_user.php'); ?>
</head>
<body>
    <?php $this->load->view('component/sidebar_user.php'); ?>

    <?php $this->load->view('component/topbar_user.php'); ?>

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        </div>

        <div class="row mb-3">
        
            <div class="container-fluid" style="padding-top: 5%; padding-bottom: 5%; text-align: center">
                <h1>
                    Selamat Datang <br>
                    DI APLIKASI E-DETECTION <br>
                    POLITEKNIK NEGERI JEMBER
                </h1>
            </div>

        </div>
        <!--Row-->

    </div>
    <!---Container Fluid-->

    <?php $this->load->view('component/footer_user.php'); ?>
    
</body>
</html>