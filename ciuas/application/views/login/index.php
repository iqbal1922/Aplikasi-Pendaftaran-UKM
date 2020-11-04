<?php echo form_open('login/signin', array('class' => 'form-auth-small')); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<link href="asset1/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="assets1/css/stylish-portfolio.css" rel="stylesheet">

<!-- Custom Fonts -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css"> -->

<!-- plugins -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/css/plugins/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/css/plugins/simple-line-icons.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/css/plugins/animate.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/css/plugins/icheck/skins/flat/aero.css" />
<!-- <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet"> -->
<link href="assets1/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/cssmy-login.css">
<style>
    .ml {
        margin-left: 5rem;
    }

    strong {
        color: #FD8020;
    }

    .mt {
        margin-top: 10rem;
    }
</style>

<body style="background-color: #35414f" class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card fat mt">
                    <div class="card-wrapper">
                        <div class="card-body" style="width: 28rem; height:40rem">
                            <h6 align="center">
                                <center>
                                    <div class="text-vertical-center mb-2" style="font-size:-2rem;">PENDAFTARAN UKM MAHASISWA <BR>POLITEKNIK NEGERI <strong>MALANG</strong></div>
                                </center>
                            </h6>
                            <img src="<?= base_url() ?>assets1/images/poltek.png" class="ml" style="width: 15rem; margin-bottom:1rem">
                            <div class="alert alert-success" role="alert">
                                <h6 align="center"> Masukkan Username dan Password (Menggunakan Username & password)</h6>
                                <?php echo $this->session->flashdata('notify'); ?>
                            </div>
                            <form action="" method="post" class="my-login-validation">
                                <p align="center">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="uname1" id="username" class="form-control">
                                        <?= form_error('username'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="pwd1" id="password" class="form-control">
                                        <?= form_error('password'); ?>
                                    </div>
                                    <div class="form-group m-0">
                                        <button type="submit" name="tombolLogin" class="btn btn-success btn-block">Login</button>
                                    </div>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?= base_url() ?>assets1/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets1/js/jquery.ui.min.js"></script>
    <script src="<?= base_url() ?>assets1/js/bootstrap.min.js"></script>

    <script src="<?= base_url() ?>assets1/js/plugins/moment.min.js"></script>
    <script src="<?= base_url() ?>assets1/js/plugins/icheck.min.js"></script>

    <!-- custom -->
    <script src="<?= base_url() ?>assets1/js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-aero',
                radioClass: 'iradio_flat-aero'
            });
        });
    </script>
</body>

</html>



<?=
    form_close();
?>