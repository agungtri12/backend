<?php
include 'koneksi.php';
include 'header.php';
include 'function.php';
if (!isset($_SESSION["user"])) {
	echo "<script> alert('Harap login terlebih dahulu');</script>";
	echo "<script>location='index.php';</script>";
}
$iduser = $_SESSION["user"]['id']; ?>
<main class="main">

	<div class="page-title dark-background" data-aos="fade" style="background-image: url(assets_home/assets/img/bg1.png);">
		<div class="container position-relative">
			<h1>Riwayat Penukaran Poin</h1>
			<nav class="breadcrumbs">
				<ol>
					<li><a href="index.html">Home</a></li>
					<li class="current">Riwayat Penukaran Poin</li>
				</ol>
			</nav>
		</div>
	</div>
	<div style="padding-top: 100px;"></div>
	<section id="contact" class="contact section">
		<div class="container" data-aos="fade">
			<div class="row gy-5 gx-lg-5">
				<div class="col-lg-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr class="text-center">
									<th width="10px">No</th>
									<th>Nama </th>
									<th>Produk </th>
									<th>No. Telepon</th>
									<th>Waktu penukaran</th>
									<th>Status</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$ambilriwayat = $koneksi->query("SELECT * FROM penukaran JOIN produktukar on penukaran.idproduk = produktukar.idproduktukar where iduser = '$iduser' order by idpenukaran desc") or die(mysqli_error($koneksi));
								while ($data = $ambilriwayat->fetch_array()) {
								?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $data['nama'] ?></td>
										<td><?= $data['namaproduk'] ?></td>
										<td><?= $data['nohp'] ?></td>
										<td><?= tanggal(date("Y-m-d", strtotime($data['waktupenukaran']))) . ' ' . date("H:i", strtotime($data['waktupenukaran'])); ?> W.I.B
										</td>
										<td>
											<?php
											if ($data['status'] == "Menunggu Konfirmasi Admin") { ?>
												<a href="#" class="btn btn-secondary m-1 text-white">Menunggu Konfirmasi Admin</a>
												<br>
											<?php } elseif ($data['status'] == "Selesai") { ?>
												<b class="text-success">Selesai</b>
												<br>
											<?php } elseif ($data['status'] == "Penukaran Poin Di Tolak") { ?>
												<b class="text-danger">Penukaran Poin Anda Di Tolak</b>
											<?php } elseif ($data['status'] == "Penukaran Poin Sedang Di Proses") { ?>
												<b class="btn btn-warning m-1">Penukaran Poin Sedang Di Proses</b>
												<br>
											<?php } ?>
											<br>
											<br>
											<?php
											if (!empty($pembayaran)) { ?>
												<img width="100px" src="foto/<?= $pembayaran['bukti'] ?>" alt="">
											<?php } ?>
										</td>

										<td>
											<!-- <a class="btn btn-primary m-1" href="penukaranedit.php?id=<?= $data['idpenukaran'] ?>">Edit</a> -->
											<a class="btn btn-danger m-1" href="penukaranhapus.php?id=<?= $data['idpenukaran'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
										</td>
									</tr>
								<?php $no++;
								} ?>
							</tbody>
						</table>
						<br>
					</div>
				</div>
			</div>
	</section>
	<div style="padding-top: 100px;"></div>
</main>
<?php include_once('footer.php') ?>