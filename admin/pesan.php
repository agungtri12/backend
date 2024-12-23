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
							<h5 class="m-b-10">Daftar Pesan</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Daftar Pesan</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5>Daftar Pesan</h5>
					</div>
					<div class="card-body table-border-style">
						<div class="table-responsive">
							<table class="table table-hover" id="tabel">
								<thead>
								<tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. HP</th>
                                        <th>Pesan / Saran</th>
                                            <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $result = $koneksi->query("SELECT * FROM pesan order by idpesan desc");
                                    while ($data = $result->fetch_array()) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['email'] ?></td>
                                            <td><?= $data['nohp'] ?></td>
                                            <td><?= $data['pesan'] ?></td>
                                                <td>
                                                    <a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="pesanhapus.php?id=<?= $data['idpesan'] ?>">Hapus</a>
                                                </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>