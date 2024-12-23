<?php
include 'koneksi.php';
include 'header.php';
include 'function.php';

if (!isset($_SESSION["user"])) {
    echo "<script>alert('Harap login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
}

$id = $_GET['id'];
$produk = $koneksi->query("SELECT * FROM produktukar WHERE idproduktukar = '$id'");
$detail = $produk->fetch_assoc();
?>
<main class="main">
    <div class="page-title dark-background" style="background-image: url(assets_home/assets/img/bg1.png);">
        <div class="container position-relative">
            <h1>Detail Produk</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="daftarproduk.php">Daftar Produk</a></li>
                    <li class="current"><?php echo $detail['namaproduk']; ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div style="padding-top: 50px;"></div>
    <section id="product-detail" class="product-detail section">
        <div class="container">
            <div class="row gy-5">
                <div class="col-md-6">
                    <img src="foto/<?php echo $detail['fotoproduk']; ?>" class="img-fluid" alt="<?php echo $detail['namaproduk']; ?>">
                </div>
                <div class="col-md-6">
                    <h3><?php echo $detail['namaproduk']; ?></h3>
                    <p>Poin: <?php echo $detail['produkpoin']; ?></p>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tukarPoinModal">Tukar Poin</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="tukarPoinModal" tabindex="-1" aria-labelledby="tukarPoinModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tukarPoinModalLabel">Form Tukar Poin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="number" class="form-control" name="nohp" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="tukar">Tukar Poin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include_once('footer.php'); ?>

<?php
if (isset($_POST["tukar"])) {
    $nama = $_POST['nama'];
    $nohp = $_POST['nohp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $iduser = $_SESSION["user"]['id'];
    $status = 'Menunggu Konfirmasi Admin';

    $poin = $detail['produkpoin'];
    $query1 = $koneksi->query("SELECT poin FROM user WHERE id='$iduser'");
    $query1 = $query1->fetch_assoc();
    $userpoin = $query1['poin'];

    if ($userpoin < $poin) {
        echo "<script>alert('Poin Anda Tidak Mencukupi!');</script>";
        echo "<script>location='detailproduk.php?id=$id';</script>";
    } else {
        $koneksi->query("INSERT INTO penukaran (iduser, nama, nohp, email, alamat, status, idproduk) 
            VALUES ('$iduser', '$nama', '$nohp', '$email', '$alamat', '$status', '$id')");

        echo "<script>alert('Penukaran Poin Berhasil! Mohon tunggu konfirmasi admin.');</script>";
        echo "<script>location='riwayat.php';</script>";
    }
}
?>