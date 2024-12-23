<?php
include 'koneksi.php';
include 'header.php'; ?>
<main class="main">
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets_home/assets/img/bg1.png);">
        <div class="container position-relative">
            <h1>Login Admin</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Login Admin</li>
                </ol>
            </nav>
        </div>
    </div>
<div style="padding-top: 100px;"></div>
    <section id="contact" class="contact section">
        <div class="container" data-aos="fade">
            <div class="row gy-5 gx-lg-5">
                <div class="col-lg-12">
                <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-3"> Email</label>
                                    <input type="email" class="form-control mb-3" name="email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-3"> Password</label>
                                    <input type="password" class="form-control mb-3" name="password" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div style="padding-top: 100px;"></div>

</main>
<?php include_once('footer.php') ?>
<?php
if (isset($_POST["simpan"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ambil = $koneksi->query("SELECT * FROM admin
		WHERE email='$email' AND password='$password' limit 1");
    $akunyangcocok = $ambil->num_rows;
    if ($akunyangcocok == 1) {
        $akun = $ambil->fetch_assoc();
        $_SESSION['admin'] = $akun;
        echo "<script> alert('Anda sukses login');</script>";
        echo "<script> location ='admin/index.php';</script>";
    } else {
        echo "<script> alert('Anda gagal login, Cek akun anda');</script>";
        echo "<script> location ='login.php';</script>";
    }
}
?>