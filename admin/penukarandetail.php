<?php

$idpenukaran = $koneksi->query("SELECT * FROM penukaran JOIN produktukar on penukaran.idproduk = produktukar.idproduktukar WHERE idpenukaran = '$_GET[id]'");
$data = $idpenukaran->fetch_assoc();
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
        <a class="btn btn-primary" name="konfirmasi" data-toggle="modal" data-target="#verifikasi">Konfirmasi</a>
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Penukaran</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-12">
                                <div class="contact-form-area2 mb-100">
                                    <div class="alert alert-primary">
                                        <strong>Data Penukaran</strong>
                                    </div>
                                    <div class="row">
                                        <div class=" col-md-12">
                                            <div class="form-group">
                                                <label>Nama </label>
                                                <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>No. Telepon</label>
                                                <input type="number" class="form-control" name="nohp" value="<?= $data['nohp'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea rows="5" class="form-control" name="alamat" readonly><?= $data['alamat'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Jenis Hadiah</label>
                                                <input type="text" class="form-control" name="idproduk" value="<?= $data['namaproduk'] ?>" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="modal fade" id="verifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Verifikasi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Pilih Status</label>
                                                                <input type="hidden" name="iduser" class="form-control" value="<?= $data['iduser'] ?>">
                                                                <select name="status" class="form-control" required>
                                                                    <option <?php if ($data['status'] == 'Penukaran Poin Sedang Di Proses') echo 'selected'; ?> value="Penukaran Poin Sedang Di Proses">Penukaran Poin Sedang Di Proses</option>
                                                                    <option <?php if ($data['status'] == 'Penukaran Poin Di Tolak') echo 'selected'; ?> value="Penukaran Poin Di Tolak">Penukaran Poin Di Tolak</option>
                                                                    <option <?php if ($data['status'] == 'Selesai') echo 'selected'; ?> value="Selesai">Selesai</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" name="simpan" class="btn btn-primary">Simpan
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php
if (isset($_POST["simpan"])) {
    $iduser = $_POST['iduser'];
    $status = $_POST['status'];
    $poinuser = $koneksi->query("SELECT poin FROM user WHERE id='$iduser'");
    $poinuser = $poinuser->fetch_assoc();
    $poin = $poinuser['poin'];

    $poinproduk = $koneksi->query("SELECT produkpoin FROM produktukar WHERE idproduktukar='$data[idproduk]'");
    $poinproduk = $poinproduk->fetch_assoc();
    $poinproduknya = $poinproduk['produkpoin'];

    $poinsekarang = $poin - $poinproduknya;

    $koneksi->query("UPDATE penukaran SET status='$status' WHERE idpenukaran='$_GET[id]' and iduser='$iduser'");

    if ($status == 'Penukaran Poin Sedang Di Proses') {
        mysqli_query($koneksi, "UPDATE user SET poin='$poinsekarang' WHERE id='$iduser'");
    }
    echo "<script>alert('Status Berhasil Di Simpan')</script>";
    echo "<script> location ='index.php?halaman=penukarandaftar&id=$_GET[id]';</script>";
}
?>