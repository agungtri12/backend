<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah Produk Tukar</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Tambah Produk Tukar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Produk Tukar</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Nama Produk</label>
                                                <input type="text" class="form-control" name="namaproduk" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Jumlah Poin</label>
                                                <input type="number" class="form-control" name="produkpoin" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Foto </label>
                                                <input type="file" class="form-control" name="fotoproduk" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right" name="simpan">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if (isset($_POST['simpan'])) {
    $namafotoproduk = $_FILES['fotoproduk']['name'];
    $lokasifotoproduk = $_FILES['fotoproduk']['tmp_name'];
    move_uploaded_file($lokasifotoproduk, "../foto/" . $namafotoproduk);
    $koneksi->query("INSERT INTO produktukar
		(namaproduk,produkpoin,fotoproduk)
		VALUES('$_POST[namaproduk]','$_POST[produkpoin]','$namafotoproduk')");
    echo "<script>alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='index.php?halaman=produktukardaftar';</script>";
}
?>