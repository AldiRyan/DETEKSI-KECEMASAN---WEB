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
            <h1 class="h3 mb-0 text-gray-800">Riwayat Jadwal</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Fitur</li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat Jadwal</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <div class="navbar-form form-inline">
                            <?php echo form_open('riwayat_jadwal/search') ?>
                            <input type="text" class="form-control bg-light border-1 small" name="keyword" placeholder="Masukkan Kata Kunci" aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
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
                                    <th style="text-align:center">Tanggal</th>
                                    <th style="text-align:center">Nama Mahasiswa</th>
                                    <th style="text-align:center">Nama Psikolog</th>
                                    <th style="text-align:center">Agenda</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php 
                                foreach ($jadwal as $jwl) :
                                ?>
                                <td><?php echo $jwl->id_jadwal ?></td>
                                <td><?php echo $jwl->tanggal_jadwal ?></td>
                                <td><?php echo $jwl->nama_mhs ?></td>
                                <td><?php echo $jwl->nama_psikolog ?></td>
                                <td><?php echo $jwl->agenda ?></td>
                                <td onclick="javascript: return confirm('Anda Yakin Ingin Menghapus?')">
                                    <?php echo anchor('riwayat_jadwal/hapus/'. $jwl->id_jadwal, '<div class="btn btn-link text-danger text-gradient"><i class="fas fa-trash-alt "></i> Delete</div>')?></td>
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
    </div>
    <!---Container Fluid-->

    <?php include('_layout/footer.php'); ?>

</body>
</html>