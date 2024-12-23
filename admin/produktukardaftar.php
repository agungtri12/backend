<section class="pcoded-main-container">
	<div class="pcoded-content">
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Data Produk Tukar</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Data Produk Tukar</a></li>
						</ul>
						<br><br>
						<a class="btn btn-primary" href="index.php?halaman=produktukartambah">Tambah Data Produk Tukar</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5>Data Produk Tukar</h5>
					</div>
					<div class="card-body table-border-style">
						<div class="table-responsive">
							<table class="table table-hover" id="tabel">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Produk</th>
										<th>Jumlah Poin</th>
										<th>Foto</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$produktukar = $koneksi->query("SELECT * FROM produktukar");
									$ambilproduktukar = $produktukar;
									while ($data = $ambilproduktukar->fetch_array()) {
									?>
										<tr>
											<td><?= $no ?></td>
											<td><?= $data['namaproduk'] ?></td>
											<td><?= $data['produkpoin'] ?></td>
											<td> <img src="../foto/<?php echo $data['fotoproduk'] ?>" width="100">
											</td>
											<td>
												<a class="btn btn-warning" href="index.php?halaman=produktukaredit&id=<?php echo $data['idproduktukar']; ?>">Edit</a>
												<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="index.php?halaman=produktukarhapus&id=<?php echo $data['idproduktukar']; ?>">Hapus</a>
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