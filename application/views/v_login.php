<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="shourcut icon" href="panti.png">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Login</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?= base_url() ?>template/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?= base_url() ?>template/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?= base_url() ?>template/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<style>
body {
    background-image: url("<?= base_url() ?>template/assets/img/background-login.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br><br/>
                <br><br/>
                <h2 style="color: lime;"><span style="color: cyan;">GIS </span>Panti Asuhan</h2>
                <br />
            </div>
        </div>
        <div class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel">
                <div class="text-center">
                    <div class="panel-heading">
                    <h3 style="color: lime;"><span style="color: cyan;">Admin </span>Login</h3>
                    </div>
                    </div>
                    <div class="panel-body">
                    
                        <?php
                        //code validasi data tidak boleh kosong
                        echo validation_errors('<div class="alert alert-warning alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');

                        //notifikasi data berhasil disimpan
                        if ($this->session->flashdata('pesan')) {
                            echo  '<div class="alert alert-danger alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';
                        }

                        echo form_open('login/index');
                        ?>

                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" placeholder="Username" <?= set_value('username') ?> class="form-control" />
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" <?= set_value('password') ?> class="form-control" />
                        </div>

                        <div class="form-group">
                            <label></label>
                            <button type="submit" class="btn btn-sm btn-primary">Login</button>
                            <!-- <a href="<?= base_url('login/lupapassword') ?>" class="btn btn-sm btn-success">Lupa password</a> -->
                        </div>

                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?= base_url() ?>template/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?= base_url() ?>template/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?= base_url() ?>template/assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?= base_url() ?>template/assets/js/custom.js"></script>

</body>

</html>