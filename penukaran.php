<?php
include 'koneksi.php';
include 'header.php';
include 'function.php';

if (!isset($_SESSION["user"])) {
    echo "<script>alert('Harap login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
}

$iduser = $_SESSION["user"]['id'];

$limit = 6;

$totalProdukQuery = $koneksi->query("SELECT COUNT(*) AS total FROM produktukar");
$totalProduk = $totalProdukQuery->fetch_assoc()['total'];

$totalHalaman = ceil($totalProduk / $limit);

$halamanAktif = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($halamanAktif - 1) * $limit;

$produk = $koneksi->query("SELECT * FROM produktukar LIMIT $limit OFFSET $offset");
?>
<main class="main">
    <div class="page-title dark-background" style="background-image: url(assets_home/assets/img/bg1.png);">
        <div class="container position-relative">
            <h1>Daftar Produk Penukaran</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Daftar Produk</li>
                </ol>
            </nav>
        </div>
    </div>
    <div style="padding-top: 50px;"></div>
    <section id="products" class="products section">
        <div class="container">
            <div class="row gy-5 gx-lg-5">
                <?php while ($row = $produk->fetch_assoc()) : ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="foto/<?php echo $row['fotoproduk']; ?>" class="card-img-top" alt="<?php echo $row['namaproduk']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['namaproduk']; ?></h5>
                                <p class="card-text">Poin: <?php echo $row['produkpoin']; ?></p>
                                <a href="detailproduk.php?id=<?php echo $row['idproduktukar']; ?>" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- Pagination -->
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <!-- Tombol Previous -->
                    <?php if ($halamanAktif > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $halamanAktif - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- Nomor Halaman -->
                    <?php for ($i = 1; $i <= $totalHalaman; $i++) : ?>
                        <li class="page-item <?php echo ($i == $halamanAktif) ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- Tombol Next -->
                    <?php if ($halamanAktif < $totalHalaman) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $halamanAktif + 1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </section>
</main>
<?php include_once('footer.php'); ?>