<?php
ob_start();
//include('akses.php');
require_once('../../config/koneksi.php');
require_once('../../model/database.php');
$connection = new Database($host,$user,$pass,$database);
 ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Pendataan Mahasiswa</title>
        <link rel="stylesheet" href="../../assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../../assets/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="../../assets/custom/custom.css">
        <link rel="stylesheet" href="../../assets/plugins/datatables/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="../../assets/plugins/FixedColumns/css/fixedColumns.bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/plugins/swal/sweetalert.css">
        <style>
            .btn {
                border-radius: 0px;
            }
        </style>
    </head>



    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="?page=dashboard" class="navbar-brand"><b>Pendataan</b> Skripsi</a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>


                        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mahasiswa</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="?p=tampilData"><span class="fa fa-table"></span> Lihat Data</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- User Account Menu -->
                                <li class="user user-menu">
                                    <a>Halo, <?php echo $_SESSION['nama']; ?></a>
                                </li>
                                <li class="">
                                    <a href="/config/logout.php">
                                        <span class="fa fa-sign-out"></span>
                                    </a>
                                </li>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <?php
		$pages_dir = 'mahasiswa';
		if(!empty($_GET['p'])){
			$pages = scandir($pages_dir, 0);
			unset($pages[0], $pages[1]);

			$p = $_GET['p'];
			if(in_array($p.'.php', $pages)){
				include($pages_dir.'/'.$p.'.php');
			} else {
				echo 'Halaman tidak ditemukan! :(';
			}
		}
		?>
                </div>

            </div>
            <footer class="main-footer">
                <div class="container">
                    <div class="text-center">
                        Copyright <a href="">STMIK Bumigora Mataram</a>
                    </div>
                </div>
            </footer>
        </div>

        <script type="text/javascript" src="../../assets/plugins/jQuery/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="../../assets/plugins/jQueryUI/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../assets/plugins/datatables/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="../../assets/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../../assets/plugins/FixedColumns/js/dataTables.fixedColumns.min.js"></script>
        <script type="text/javascript" src="../../assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../assets/dist/js/app.min.js"></script>
        <script type="text/javascript" src="../../assets/plugins/fastclick/fastclick.min.js"></script>
        <script type="text/javascript" src="../../assets/plugins/swal/sweetalert.min.js"></script>
        <script type="text/javascript" src="../../assets/dist/js/demo.js"></script>

        <script>
            $(document).ready(function () {
                var table = $('#myTable').DataTable({
                    scrollY: 200,
                    scrollX: true,
                    scrollCollapse: true,
                    paging: true,
                    "autoWidth": true,
                    fixedColumns: {
                        leftColumns: 2
                    }
                });
            });

            $('#ttl').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true
            });
        </script>
    </body>

    </html>