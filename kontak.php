<?php
include 'koneksi.php';
include 'header.php';
include 'function.php';

if (!isset($_SESSION["user"])) {
    echo "<script>alert('Harap login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
}
?>
<main class="main">
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets_home/assets/img/bg1.png);">
        <div class="container position-relative">
            <h1>Silahkan ajukan pertanyaan atau saran</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Silahkan ajukan pertanyaan atau saran</li>
                </ol>
            </nav>
        </div>
    </div>
    <div style="padding-top: 100px;"></div>
    <section id="contact" class="contact section">

        <div class="container" data-aos="fade">

            <div class="row gy-5 gx-lg-5">

                <div class="col-lg-12">
                    <!-- Form PHP Email -->
                    <form method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="mb-3">Nama </label>
                                    <input type="text" class="form-control mb-3" placeholder="Nama" name="nama" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="mb-3">Email </label>
                                    <input type="email" class="form-control mb-3" placeholder="Email" name="email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-3">Telepon </label>
                                    <input type="number" class="form-control mb-3" placeholder="No. HP" name="nohp" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-3">Pesan </label>
                                    <textarea class="form-control mb-3" placeholder="Pesan / Saran Anda" rows="3" name="pesan" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button name="simpan" value="simpan" type="submit" class="btn btn-primary float-end">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div style="padding-top: 100px;"></div>

    <?php
    if (isset($_POST['simpan'])) {
        // Sanitasi input untuk mencegah injeksi SQL
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $nohp = mysqli_real_escape_string($koneksi, $_POST['nohp']);
        $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

        // Menyimpan data ke database
        $koneksi->query("INSERT INTO pesan (nama, email, nohp, pesan) VALUES ('$nama', '$email', '$nohp', '$pesan')") or die(mysqli_error($koneksi));

        echo "<script>alert('Pesan / Saran Anda Berhasil Di Kirim');</script>";
        echo "<script>location='kontak.php';</script>";
    }
    ?>

</main>
<?php include_once('footer.php') ?>