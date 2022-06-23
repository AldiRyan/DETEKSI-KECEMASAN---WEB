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
            <h1 class="h3 mb-0 text-gray-800">Nonaktivasi User</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Pengaturan</li>
                <li class="breadcrumb-item active" aria-current="page">Nonaktivasi User</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Nonaktivasi User</h6>
                    </div>
                    <div class="card-body col-6"> 
                        <form method="POST" action="<?= base_url('nonaktivasi_user/nonaktifkan_akun') ?>" class="col-12">
                        <?php if($this->session->flashdata('message')) { ?>
                        <div class="alert">
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                        <?php } ?>
                            <input type="hidden" name="" value="" required>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Tipe</label>
                                    <div class="col-md-6">
                                        <select name="type" id="type" class="form-control ">
                                            <option>Pilih Tipe</option>
                                            <option value="1">Mahasiswa</option>
                                            <option value="2">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">NIM / Username</label>
                                    <div class="col-md-6">
                                        <select name="identitas" id="identitas" class="js-example-basic-single form-control">
                                            <option>Pilih</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Nonaktifkan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->

    <?php include('_layout/footer.php'); ?>

<!-- Script -->
<script src="<?= base_url('assets/vendor/jquery/jquery-3.4.1.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    jQuery(function($){
        $('.js-example-basic-single').select2();
        var base_url = '<?= base_url() ?>';
        $("#type").change(function(){
            var val = $(this).val();
            $.ajax({
                url: base_url+"nonaktivasi_user/ambildata/"+val,
                type: "GET",
                success: function(res) {
                    console.log(res);
                    var obj = JSON.parse(res);
                    var result = "<option>Pilih "+( val == "1" ? "NIM" : "Username")+"</option>";
                    for(var i = 0; i < obj.length; i++){
                        result+="<option value='"+ obj[i].nomor +"'>"+ obj[i].nomor+"</option>";
                    }
                    $("#identitas").html(result);
                }
            });
        })
    })
</script>
</body>

</html>