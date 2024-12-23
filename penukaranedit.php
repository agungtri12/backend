<?php
include 'koneksi.php';
include 'header.php';
include 'function.php';

if (!isset($_SESSION["user"])) {
    echo "<script>location='login.php';</script>";
}

$idpenukaran = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM penukaran WHERE idpenukaran = '$idpenukaran'");
$detail = $ambil->fetch_assoc();
?>

<main class="main">
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets_home/assets/img/bg1.png);">
        <div class="container position-relative">
            <h1>Edit Form Penukaran Poin</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Edit Form Penukaran Poin</li>
                </ol>
            </nav>
        </div>
    </div>
    <div style="padding-top: 100px;"></div>
    <section id="contact" class="contact section">
        <div class="container" data-aos="fade">
            <div class="row gy-5 gx-lg-5">
                <div class="col-lg-12">
                    <form method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="mb-3">Nama</label>
                                    <input type="text" class="form-control mb-3" name="nama" value="<?= $detail['nama'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-3">No. Telepon</label>
                                    <input type="number" class="form-control mb-3" name="nohp" value="<?= $detail['nohp'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-3">Email</label>
                                    <input type="email" class="form-control mb-3" name="email" value="<?= $detail['email'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-3">Alamat</label>
                                    <textarea rows="5" class="form-control mb-3" name="alamat" required><?= $detail['alamat'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-3">Jenis Hadiah</label>
                                    <input type="text" class="form-control mb-3" name="jenishadiah" value="<?= $detail['jenishadiah'] ?>" required>
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
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $jenishadiah = $_POST['jenishadiah'];

    // Update data tanpa foto
    $query = "UPDATE penukaran SET nama='$nama', nohp='$nohp', email='$email', alamat='$alamat', jenishadiah='$jenishadiah' WHERE idpenukaran='$idpenukaran'";

    // Eksekusi query
    if ($koneksi->query($query)) {
        echo "<script>alert('Edit Penukaran Berhasil');</script>";
        echo "<script>location='riwayat.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data.');</script>";
    }
}
?>
