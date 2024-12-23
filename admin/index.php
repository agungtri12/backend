<?php
session_start();
include '../koneksi.php';
include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <link rel="icon" href="../foto/logoo.png">
    <link rel="stylesheet" href="assets_admin/dist/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/ckeditor/ckeditor.js"></script>
</head>

<body class="">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <nav class="pcoded-navbar  ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">

                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius" src="assets_admin/dist/assets/images/user/user.png" alt="User-Profile-Image">
                        <div class="user-details">
                            <div id="more-details"><?= strtoupper($_SESSION['admin']['nama']) ?><i class="fa fa-chevron-down m-l-5"></i></div>
                        </div>
                    </div>
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-unstyled">
                            <li class="list-group-item"><a href="index.php?halaman=logout" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?')"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Halaman</label>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?halaman=beranda" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="index.php?halaman=produktukardaftar" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Produk Tukar</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?halaman=penukarandaftar" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Data Penukaran</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?halaman=userdaftar" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Data User</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?halaman=pesan" class="nav-link "><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">Pesan</span></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">


        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="index.php?halaman=beranda" class="b-brand">
                <h4 class="text-white"><span>Admin Panel</span></h4>
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <a href="index.php?halaman=profiledit">
                                    <span class="text-white">Edit Profil</span>
                                </a>
                            </div>
                            <div class="pro-head">
                                <a href="index.php?halaman=logout" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?')">
                                    <span class="text-white">Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div id="layoutSidenav_content">
        <main>
            <?php
            if (isset($_GET['halaman'])) {
                if ($_GET['halaman'] == "beranda") {
                    include 'beranda.php';
                } elseif ($_GET['halaman'] == "logout") {
                    include 'logout.php';
                } elseif ($_GET['halaman'] == "penukarandaftar") {
                    include 'penukarandaftar.php';
                } elseif ($_GET['halaman'] == "penukarandetail") {
                    include 'penukarandetail.php';
                } elseif ($_GET['halaman'] == "penukaranhapus") {
                    include 'penukaranhapus.php';
                } elseif ($_GET['halaman'] == "downloadbukti") {
                    include 'downloadbukti.php';
                } elseif ($_GET['halaman'] == "penukaranhapus") {
                    include 'penukaranhapus.php';
                } elseif ($_GET['halaman'] == "produktukardaftar") {
                    include 'produktukardaftar.php';
                } elseif ($_GET['halaman'] == "produktukaredit") {
                    include 'produktukaredit.php';
                } elseif ($_GET['halaman'] == "produktukarhapus") {
                    include 'produktukarhapus.php';
                } elseif ($_GET['halaman'] == "produktukartambah") {
                    include 'produktukartambah.php';
                } elseif ($_GET['halaman'] == "profiledit") {
                    include 'profiledit.php';
                } elseif ($_GET['halaman'] == "userdaftar") {
                    include 'userdaftar.php';
                } elseif ($_GET['halaman'] == "useredit") {
                    include 'useredit.php';
                } elseif ($_GET['halaman'] == "userhapus") {
                    include 'userhapus.php';
                } elseif ($_GET['halaman'] == "pesan") {
                    include 'pesan.php';
                }
            } else {
                include 'beranda.php';
            }
            ?>
        </main>
    </div>
    <script src="assets_admin/dist/assets/js/vendor-all.min.js"></script>
    <script src="assets_admin/dist/assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets_admin/dist/assets/js/pcoded.min.js"></script>

    <!-- Apex Chart -->
    <script src="assets_admin/dist/assets/js/plugins/apexcharts.min.js"></script>


    <!-- custom-chart js -->
    <script src="assets_admin/dist/assets/js/pages/dashboard-main.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabel').DataTable();
        });
    </script>
</body>

</html>