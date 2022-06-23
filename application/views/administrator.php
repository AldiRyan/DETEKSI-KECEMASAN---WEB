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
            <h1 class="h3 mb-0 text-gray-800">Data Administrator</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Pengaturan</li>
                <li class="breadcrumb-item active" aria-current="page">Administrator</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <div>
                            <a class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-plus"> </i> Tambah Data</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align:center">Nomor</th>
                                    <th style="text-align:center">Nama</th>
                                    <th style="text-align:center">No. HP</th>
                                    <th style="text-align:center">E-mail</th>
                                    <th style="text-align:center">Username</th>
                                    <th style="text-align:center">Password</th>
                                    <th colspan="2" style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($admin as $admin) :
                                ?>
                                <tr>
                                    <td><?php echo $admin->id_admin ?></td>
                                    <td><?php echo $admin->nama_admin ?></td>
                                    <td><?php echo $admin->nohp_admin ?></td>
                                    <td><?php echo $admin->email_admin ?></td>
                                    <td><?php echo $admin->username ?></td>
                                    <td><?php echo $admin->password ?></td>
                                    <td onclick="javascript: return confirm('Anda Yakin Ingin Menghapus?')">
                                    <?php echo anchor('administrator/hapus/'. $admin->id_admin, '<div class="btn btn-link text-danger text-gradient"><i class="fas fa-trash-alt "></i> Delete</div>')?></td>
                                    
                                    <td><button class="btn btn-link text-dark" data-toggle="modal" data-target="#exampleModal<?= $admin->id_admin ?>"><i class="fas fa-pencil-alt text-dark"></i>Edit</button></td>
                                    
                                    <div class="modal fade" id="exampleModal<?= $admin->id_admin ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Update Data Administrator</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="<?php echo base_url().'administrator/update_aksi/'. $admin->id_admin ?>">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" name="nama" class="form-control" value="<?= $admin->nama_admin ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>No. HP</label>
                                                            <input type="text" name="nohp" class="form-control" value="<?= $admin->nohp_admin ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>E-mail</label>
                                                            <input type="text" name="email" class="form-control" value="<?= $admin->email_admin ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" name="username" class="form-control" value="<?= $admin->username ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="text" name="password" class="form-control" value="<?= $admin->password ?>">
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Administrator</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url().'administrator/tambah_aksi'; ?>">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>No. HP</label>
                            <input type="text" name="nohp" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>   
            </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->

    <?php include('_layout/footer.php'); ?>

</body>
</html>