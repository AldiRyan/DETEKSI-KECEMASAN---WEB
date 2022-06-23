<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('_layout/auth-header.php'); ?>
</head>
<body>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <div class="card mt-5 ml-5 mr-5 mb-5">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-primary">Registrasi Mahasiswa</h4>
                </div>
                <div class="card-body ">
                    <form action="<?php echo base_url().'registrasi/tambah_aksi/'; ?>" method="post" autocomplete="off">
                        <div class="row">
                            <div class="form-group col-md-6 ">
                                <label>NIM</label>
                                <input type="text" name="nim" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" required >
                            </div>  
                            <div class="form-group col-md-6 ">
                                <label>Program Studi</label>
                                <input type="text" name="prodi" class="form-control" required >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Semester</label>
                                <select name="semester" class="form-control" required>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Golongan</label>
                                <input type="text "name="golongan" class="form-control" required></input>    
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Alamat</label>
                                <textarea type="text "name="alamat" class="form-control" required></textarea>   
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>No. Handphone</label>
                                <input type="text" name="nohp" class="form-control" required >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>E-mail</label>
                                <input type="text" name="email" class="form-control" required >
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required >
                            </div>
                        </div>
                        <div class="button float-right">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane"></i> Simpan</button>
                        </div> 
                    </form>    
                </div>
            </div>
        </div>
    </div>
</div>

    
</body>

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/ruang-admin.min.js"></script>

</html>