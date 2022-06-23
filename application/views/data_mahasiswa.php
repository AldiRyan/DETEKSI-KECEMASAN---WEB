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
            <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Fitur</li>
                <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row  justify-content-between">
                        <div class="navbar-form form-inline">
                            <?php echo form_open('data_mahasiswa/search') ?>
                            <input type="text" class="form-control bg-light border-1 small" name="keyword" placeholder="Masukkan Kata Kunci" aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;" required>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i> Cari
                                </button>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align:center">Nomor</th>
                                    <th style="text-align:center">NIM</th>
                                    <th style="text-align:center">Nama</th>
                                    <th style="text-align:center">Jurusan</th>
                                    <th style="text-align:center">Program Studi</th>
                                    <th style="text-align:center">Semester</th>
                                    <th style="text-align:center">Golongan</th>
                                    <th style="text-align:center">Alamat</th>
                                    <th style="text-align:center">No. HP</th>
                                    <th style="text-align:center">E-mail</th>
                                    <th style="text-align:center">Password</th>
                                    <th colspan="2" style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($mahasiswa as $mhs) :
                                ?>
                                <tr>
                                    <td><?php echo $mhs->id_mhs ?></td>
                                    <td><?php echo $mhs->nim_mhs ?></td>
                                    <td><?php echo $mhs->nama_mhs ?></td>
                                    <td><?php echo $mhs->jurusan_mhs ?></td>
                                    <td><?php echo $mhs->prodi_mhs ?></td>
                                    <td><?php echo $mhs->semester_mhs ?></td>
                                    <td><?php echo $mhs->gol_mhs ?></td>
                                    <td><?php echo $mhs->alamat_mhs ?></td>
                                    <td><?php echo $mhs->nohp_mhs ?></td>
                                    <td><?php echo $mhs->email_mhs ?></td>
                                    <td><?php echo $mhs->password_mhs ?></td>
                                    <td onclick="javascript: return confirm('Anda Yakin Ingin Menghapus?')">
                                    <?php echo anchor('data_mahasiswa/hapus/'. $mhs->id_mhs, '<div class="btn btn-link text-danger text-gradient"><i class="fas fa-trash-alt "></i> Delete</div>') ?></td>
                                    <td><div><button class="btn btn-link text-dark" data-toggle="modal" data-target="#exampleModal<?= $mhs->id_mhs ?>"><i class="fas fa-pencil-alt text-dark"></i>Edit</button></div></td>
                                    
                                    <div class="modal fade" id="exampleModal<?= $mhs->id_mhs ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Update Data Mahasiswa</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body">
                                                <form method="post" action="<?php echo base_url().'data_mahasiswa/update_aksi/'. $mhs->id_mhs ?>">
                                                    <div class="form-group">
                                                        <label>NIM</label>
                                                        <input type="text" name="nim" class="form-control" value="<?= $mhs->nim_mhs ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control" value="<?= $mhs->nama_mhs ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Jurusan</label>
                                                        <input type="text" name="jurusan" class="form-control" value="<?= $mhs->jurusan_mhs ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Program Studi</label>
                                                        <input type="text" name="prodi" class="form-control" value="<?= $mhs->prodi_mhs ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Semester</label>
                                                        <input type="text" name="semester" class="form-control" value="<?= $mhs->semester_mhs ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Golongan</label>
                                                        <input type="text" name="golongan" class="form-control" value="<?= $mhs->gol_mhs ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input type="text" name="alamat" class="form-control" value="<?= $mhs->alamat_mhs ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>No. HP</label>
                                                        <input type="text" name="nohp" class="form-control" value="<?= $mhs->nohp_mhs ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>E-mail</label>
                                                        <input type="text" name="email" class="form-control" value="<?= $mhs->email_mhs ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="text" name="password" class="form-control" value="<?= $mhs->password_mhs ?>">
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </form>
                                            </div>   
                                        </div>
                                        </div>
                                    </div>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        <!--Row-->

        <!-- Modal
        <div class="modal fade" id="exampleModaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url().'data_mahasiswa/tambah_aksi'; ?>">
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="nim" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Jurusan</label>
                            <input type="text" name="jurusan" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Program Studi</label>
                            <input type="text" name="prodi" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Semester</label>
                            <input type="text" name="semester" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Golongan</label>
                            <input type="text" name="golongan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>No. HP</label>
                            <input type="text" name="nohp" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" name="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>   
            </div>
            </div>
        </div> -->
    </div>
    <!---Container Fluid-->

    <?php include('_layout/footer.php'); ?>
</body>
</html>