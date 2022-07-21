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
            <div class="col-md-6">
                <div class="card mt-4 ml-2 mr-4 mb-4">
                    <div class="card-header">
                        <h4 class="m-0 font-weight-bold text-primary">Nilai Kecemasan Berdasarkan Eye Tracking</h4>
                    </div>
                    <div class="card-body ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="3">Nilai Rata Data Range Pada Layar</th>
                                </tr>
                            </thead>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="3">Keterangan Skor :</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <ul>15 – 30 = kecemasan rendah</ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <ul>30 – 45 = kecemasan sedang</ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <ul>45 – 60 = kecemasan tinggi</ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <hr>
                            <h4> Hasil Penilaian <?= round($hasil_fuzzy, 2); ?>% </h4>
                            <br>
                            <p>Anda Sedang Mengalami: </p>
                            <?php
                            $total = round($hasil_fuzzy, 2);
                            if ($total > 15 or $total <= 30) { ?>
                                <span class="badge badge-success">Kecemasan Rendah</span>
                            <?php } elseif ($total > 30 or $total <= 45) { ?>
                                <span class="badge badge-info">Kecemasan Sedang</span>
                            <?php } elseif ($total > 45 or $total <= 60) { ?>
                                <span class="badge badge-primary">Kecemasan Tinggi</span>
                            <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mt-4 ml-2 mr-4 mb-4">
                    <div class="card-header">
                        <h4 class="m-0 font-weight-bold text-primary">Hasil Uji Skala HARS</h4>
                    </div>
                    <div class="card-body ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="3">Keterangan Skor :</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <ul>kurang dari 14 = tidak ada kecemasan</ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul>14 – 20 = kecemasan ringan</ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul>21 – 27 = kecemasan sedang</ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul>28 – 41 = kecemasan berat</ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul>42 – 56 = kecemasan berat sekali</ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

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
                        <h4>Skor Anda : <?php echo $total  ?></h4>
                        <br>
                        <p>Anda Sedang Mengalami: </p>
                        <?php if ($total < 14) { ?>
                            <span class="badge badge-success">tidak ada kecemasan</span>
                        <?php } elseif ($total > 14 and $total <= 20) { ?>
                            <span class="badge badge-info">kecemasan ringan</span>
                        <?php } elseif ($total >= 21 and $total <= 27) { ?>
                            <span class="badge badge-primary">kecemasan sedang</span>
                        <?php } elseif ($total >= 28 and $total <= 41) { ?>
                            <span class="badge badge-warning">kecemasan berat</span>
                        <?php } elseif ($total >= 42 and $total <= 56) { ?>
                            <span class="badge badge-danger">kecemasan berat sekali</span>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('component/footer_user'); ?>
</body>

</html>