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
            <h1 class="h3 mb-0 text-gray-800">Data Psikolog</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Fitur</li>
                <li class="breadcrumb-item active" aria-current="page">Data Psikolog</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <!-- <div>
                            <a class="btn btn-sm btn-primary mr-1" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-plus"> </i> Tambah Data</a>
                        </div> -->
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align:center">Nomor</th>
                                    <th style="text-align:center">Nama</th>
                                    <th style="text-align:center">No. HP</th>
                                    <th style="text-align:center">E-mail</th>
                                    <th style="text-align:center">Alamat</th>
                                    <th colspan="2" style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php 
                                foreach ($psikolog as $psi) :
                                ?>
                                    <td><?php echo $psi->id_psikolog ?></td>
                                    <td><?php echo $psi->nama_psikolog ?></td>
                                    <td><?php echo $psi->nohp_psikolog ?></td>
                                    <td><?php echo $psi->email_psikolog ?></td>
                                    <td><?php echo $psi->alamat_psikolog ?></td>
                                    <!-- <td onclick="javascript: return confirm('Anda Yakin Ingin Menghapus?')">
                                    <?php echo anchor('data_psikolog/hapus/'. $psi->id_psikolog, '<div class="btn btn-link text-danger text-gradient"><i class="fas fa-trash-alt "></i> Delete</div>')?></td> -->
                                    <td><div><button class="btn btn-link text-dark" data-toggle="modal" data-target="#exampleModal<?= $psi->id_psikolog ?>"><i class="fas fa-pencil-alt text-dark"></i>Edit</button></div></td>
                                    
                                    <div class="modal fade" id="exampleModal<?= $psi->id_psikolog ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Update Data Psikolog</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body">
                                                <form method="post" action="<?php echo base_url().'Data_psikolog/update_aksi/'. $psi->id_psikolog ?>">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $psi->nama_psikolog ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>No. HP</label>
                                                        <input type="text" name="nohp" class="form-control" value="<?= $psi->nohp_psikolog ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>E-mail</label>
                                                        <input type="text" name="email" class="form-control" value="<?= $psi->email_psikolog ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input type="text" name="alamat" class="form-control" value="<?= $psi->alamat_psikolog ?>">
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
                        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Psikolog</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url().'Data_psikolog/tambah_aksi'; ?>">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
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
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control">
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
