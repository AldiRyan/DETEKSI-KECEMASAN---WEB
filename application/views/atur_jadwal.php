<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('_layout/auth-header.php'); ?>
</head>
<body>

<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-6 ">
            <div class="card mt-5 ml-5 mr-5 mb-5">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-primary">Atur Jadwal Uji Kecemasan</h4>
                </div>
                <div class="card-body ">
                    <form action="<?php echo base_url(). 'atur_jadwal/insert'; ?>" method="post">
                    
                        <div class="row">
                            <div class="form-group col-md-6 ">
                                <label class="control-label">Nama Mahasiswa</label>
                                <select class="form-select form-control" name="nama_mhs" required>
                                    <?php
                                    foreach($mhs as $m){
                                    ?>
                                    <option selected><?= $m['nama_mhs'] ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('nama'); ?>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="control-label">Nama Psikolog</label>
                                <select class="form-select form-control" name="nama_psikolog" required>
                                    <?php 
                                    foreach($psi as $p){
                                    ?>
                                    <option selected><?= $p['nama_psikolog'] ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('psikolog'); ?>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Waktu dan Tanggal</label>
                                <input class="form-control" placeholder="" type="datetime-local" name="waktu"/>
                                <?php echo form_error('waktu'); ?>
                            </div> 
                            <div class="form-group col-md-6 ">
                                <label class="control-label">Agenda</label>
                                <textarea class="form-control form-white" placeholder="Masukkan Agenda" name="agenda"></textarea>
                                <?php echo form_error('agenda'); ?>  
                            </div>
                        </div>
                        <div class="button float-right">
                            <button type="reset" name="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" name="simpan" class="btn btn-info"><i class="fas fa-paper-plane"></i> Simpan</button>
                        </div>
                        <div class="text-left">
                            <a class="font-weight-bold small float-center" href="login">Kembali ke Halaman Login</a>
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