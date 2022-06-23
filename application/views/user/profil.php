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
                        <h4 class="m-0 font-weight-bold text-primary">Profil Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <?php $user_data = $this->session->userdata('userdata'); ?>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>NIM</td>
                                    <td>:</td>
                                    <td><?php echo $profil['nim_mhs'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Mahasiswa</td>
                                    <td>:</td>
                                    <td><?php echo $profil['nama_mhs'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>:</td>
                                    <td><?php echo $profil['jurusan_mhs'] ?></td>
                                </tr>
                                <tr>
                                    <td>Program Studi</td>
                                    <td>:</td>
                                    <td><?php echo $profil['prodi_mhs'] ?></td>
                                </tr>
                                <tr>
                                    <td>Semester</td>
                                    <td>:</td>
                                    <td><?php echo $profil['semester_mhs'] ?></td>
                                </tr>
                                <tr>
                                    <td>Golongan</td>
                                    <td>:</td>
                                    <td><?php echo $profil['gol_mhs'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?php echo $profil['alamat_mhs'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Handphone</td>
                                    <td>:</td>
                                    <td><?php echo $profil['nohp_mhs'] ?></td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td>:</td>
                                    <td><?php echo $profil['email_mhs'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('component/footer_user'); ?>

</body>

</html>