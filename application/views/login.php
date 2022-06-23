<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('_layout/auth-header.php'); ?>
</head>
<body>
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-md-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center p-t-20 p-b-20">
                                        <span class="db"><img src="<?php echo base_url()?>assets/img/poltek.png" rel="icon" width="256" height="70"/></span>
                                    </div>
                                    <br>
                                    <form class="form-horizontal m-t-20" action="<?php echo base_url(); ?>login/cek" method="post">
                                    <?php
                                    if($this->session->flashdata('pesan')){
                                        ?>
                                        <div class="alert alert-info">
                                            <?php echo $this->session->flashdata('pesan'); ?>
                                        </div>
                                        <?php unset($_SESSION['pesan']);} ?>
                                        <hr>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="ti-key"></i>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password" required>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="p-t-20 float-right">
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                    
                                        <div class="text-left">
                                            <a class="font-weight-bold small float-center" href="registrasi">Registrasi</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
</body>

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/ruang-admin.min.js"></script>

</html>