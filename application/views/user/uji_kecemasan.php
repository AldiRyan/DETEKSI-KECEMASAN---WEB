<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('component/header_user'); ?>
</head>

<body>
    <?php $this->load->view('component/sidebar_user'); ?>

    <?php $this->load->view('component/topbar_user'); ?>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="card mt-4 ml-4 mr-4 mb-4">
                    <div class="card-header">
                        <h4 class="m-0 font-weight-bold text-primary">Hasil Uji Kecemasan Mahasiswa</h4>
                    </div>
                    <div class="card-body ">
                        <form action="<?php echo base_url() . 'user/Uji_kecemasan/lihat_hasil'; ?>" method="POST">
                            <div>
                                <br>
                                <h6>Catatan: </h6>
                                <li>Silahkan Klik Tombol Lihat Hasil Dibawah Ini</li>
                                <li>Pastikan Selalu Menjaga Kesehatan Agar Tidak Mudah Cemas</li>
                                <br>
                                <br>
                                <br>
                                <!-- <div class="">
                                <center><button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#exampleModal">Uji Kecemasan</button></center>
                            </div> -->
                                <div class="">
                                    <center><button class="btn btn-primary" type="submit">Lihat Hasil</button></center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('component/footer_user'); ?>
</body>

</html>