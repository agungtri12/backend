<?php
$pgn = $koneksi->query("SELECT * FROM user");
$user = $pgn->fetch_assoc();
?>
<section class="pcoded-main-container">
	<div class="pcoded-content">
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Data Penukaran</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Data Penukaran</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5>Data Penukaran</h5>
					</div>
					<div class="card-body table-border-style">
						<div class="table-responsive">
							<table class="table table-hover" id="tabel">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>No. Telepon</th>
										<th>Email</th>
										<th>Jenis Hadiah</th>
										<th>Tanggal Penukaran</th>
										<th>Alamat</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$penukaran = $koneksi->query("SELECT * FROM penukaran JOIN produktukar on penukaran.idproduk = produktukar.idproduktukar");
									$ambilpenukaran = $penukaran;
									while ($data = $ambilpenukaran->fetch_array()) {
									?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $data['nama'] ?></td>
											<td><?= $data['nohp'] ?></td>
											<td><?= $data['email'] ?></td>
											<td><?= $data['namaproduk'] ?></td>
											<td><?= tanggal(date("Y-m-d", strtotime($data['waktupenukaran']))) . ' ' . date("H:i", strtotime($data['waktupenukaran'])); ?> W.I.B</td>
											<td><?= $data['alamat'] ?></td>
											<td><?= $data['status'] ?></td>
											<td>
												<?php if ($data['status'] == 'Di Terima') { ?>
													<a class="btn btn-success" href="downloadbukti.php?id=<?= $data['idpenukaran'] ?>" target="_blank">Download Bukti</a>
												<?php } ?>
												<a class="btn btn-primary" href="index.php?halaman=penukarandetail&id=<?php echo $data['idpenukaran']; ?>">Lihat</a>
												<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="index.php?halaman=penukaranhapus&id=<?php echo $data['idpenukaran']; ?>">Hapus</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>