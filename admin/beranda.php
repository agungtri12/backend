<?php
$penukaran = $koneksi->query("SELECT * FROM penukaran");
$jumlahpenukaran = $penukaran->num_rows;
$akunpendaftar = $koneksi->query("SELECT * FROM user");
$jumlahpendaftar = $akunpendaftar->num_rows;
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Beranda</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Beranda</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card flat-card widget-primary-card">
                    <img src="../foto/welcome.jpg" width="100%">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="fas fa-list"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4><?php echo $jumlahpendaftar ?></h4>
                            <h6>Jumlah Pengguna</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4><?php echo $jumlahpenukaran ?></h4>
                            <h6>Jumlah Penukaran</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>