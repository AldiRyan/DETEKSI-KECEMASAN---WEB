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
            <h1 class="h3 mb-0 text-gray-800">Riwayat Konsultasi</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Fitur</li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat Konsultasi</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <div class="navbar-form form-inline">
                            <?php echo form_open('') ?>
                            <input type="text" class="form-control bg-light border-1 small" name="keyword" placeholder="Masukkan Kata Kunci" aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                            <button class="btn btn-primary" type="submit" for="navbarForm">
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
                                    <th style="text-align:center">Nama Mahasiswa</th>
                                    <th style="text-align:center">Hari / Tanggal</th>
                                    <th style="text-align:center">Nama Psikolog</th>
                                    <!-- <th style="text-align:center">Hasil Konsultasi</th> -->
                                    <!-- <th style="text-align:center">Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 1;
                                    foreach ($konsultasi as $kons) :
                                    ?>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $kons->nama_mhs ?></td>
                                        <td><?php echo $kons->tanggal_jadwal ?></td>
                                        <td><?php echo $kons->nama_psikolog ?></td>
                                        <!-- <td>
                                            <?php
                                            $nilai_pertanyaan1 = $nilai_skor['jawaban_pertanyaan1'];
                                            $nilai_pertanyaan2 = $nilai_skor['jawaban_pertanyaan2'];
                                            $nilai_pertanyaan3 = $nilai_skor['jawaban_pertanyaan3'];
                                            $nilai_pertanyaan4 = $nilai_skor['jawaban_pertanyaan4'];
                                            $nilai_pertanyaan5 = $nilai_skor['jawaban_pertanyaan5'];
                                            $nilai_pertanyaan6 = $nilai_skor['jawaban_pertanyaan6'];
                                            $nilai_pertanyaan7 = $nilai_skor['jawaban_pertanyaan7'];
                                            $nilai_pertanyaan8 = $nilai_skor['jawaban_pertanyaan8'];
                                            $nilai_pertanyaan9 = $nilai_skor['jawaban_pertanyaan9'];
                                            $nilai_pertanyaan10 = $nilai_skor['jawaban_pertanyaan10'];
                                            $nilai_pertanyaan11 = $nilai_skor['jawaban_pertanyaan11'];
                                            $nilai_pertanyaan12 = $nilai_skor['jawaban_pertanyaan12'];
                                            $nilai_pertanyaan13 = $nilai_skor['jawaban_pertanyaan13'];
                                            $nilai_pertanyaan14 = $nilai_skor['jawaban_pertanyaan14'];
                                            $total = $nilai_pertanyaan1 + $nilai_pertanyaan2 + $nilai_pertanyaan3 + $nilai_pertanyaan4 + $nilai_pertanyaan5 + $nilai_pertanyaan6 + $nilai_pertanyaan7 + $nilai_pertanyaan8 + $nilai_pertanyaan9 + $nilai_pertanyaan10 + $nilai_pertanyaan11 + $nilai_pertanyaan12 + $nilai_pertanyaan13 + $nilai_pertanyaan14;
                                            ?>
                                            <?php echo $total  ?>

                                            <?php if ($total < 14) { ?>
                                                <span class="badge badge-success">tidak ada kecemasan</span>
                                            <?php } elseif ($total > 14 or $total <= 20) { ?>
                                                <span class="badge badge-info">kecemasan ringan</span>
                                            <?php } elseif ($total >= 21 or $total <= 27) { ?>
                                                <span class="badge badge-primary">kecemasan sedang</span>
                                            <?php } elseif ($total >= 28 or $total <= 41) { ?>
                                                <span class="badge badge-warning">kecemasan berat</span>
                                            <?php } elseif ($total >= 42 or $total <= 56) { ?>
                                                <span class="badge badge-danger">kecemasan berat sekali</span>
                                            <?php } ?>

                                        </td>
                                        <td onclick="javascript: return confirm('Anda Yakin Ingin Menghapus?')">
                                            <?php echo anchor('data_hasilKonsultasi/hapus/' . $kons->id_uji, '<div class="btn btn-link text-danger text-gradient"><i class="fas fa-trash-alt "></i> Delete</div>') ?></td>
                                        </td> -->
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