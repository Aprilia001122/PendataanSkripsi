<?php
session_start();
if($_SESSION){
    if($_SESSION['level']=="admin")
    {
        header("Location: /mahasiswa/index.php");
    }
    if($_SESSION['level']=="user")
    {
        header("Location: /user/index.php");
    }
}


include('autentikasi.php'); 

?>
    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Login Administrator</title>
        <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/dist/css/AdminLTE.min.css">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b class="text-green">Form</b> Login</a>
            </div>

            <div class="login-box-body">
                <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>

                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Username" name="username" id="username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 pull-right">
                            <button type="submit" name="login" value="login" class="btn btn-success btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="./assets/plugins/jQuery/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="./assets/plugins/jQueryUI/jquery-ui.min.js"></script>
        <script type="text/javascript" src="./assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./assets/bootstrap/dist/app.min.js"></script>
    </body>

    </html>