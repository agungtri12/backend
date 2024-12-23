<?php
$idadmin = $_SESSION['admin']['idadmin'];
$ambil = $koneksi->query("SELECT * FROM admin WHERE idadmin='$idadmin'");
$row = $ambil->fetch_assoc();
?>
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Edit Profil</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Edit Profil</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Profil</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" value="<?php echo $row['nama']; ?>" class="form-control" name="nama">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control" name="password">
                                                <input type="hidden" class="form-control" name="passwordlama" value="<?php echo $row['password']; ?>">
                                                <span class="text-danger">Kosongkan Password jika tidak ingin mengganti</span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right" name="ubah">Simpan</button>
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
if (isset($_POST['ubah'])) {
    if ($_POST['password'] == "") {
        $password = $_POST['passwordlama'];
    } else {
        $password = $_POST['password'];
    }
    $koneksi->query("UPDATE admin SET nama='$_POST[nama]', email='$_POST[email]', password='$password' WHERE idadmin='$idadmin'") or die(mysqli_error($koneksi));
    echo "<script>alert('Profil Berhasil Di Ubah');</script>";
    echo "<script> location ='index.php?halaman=profiledit';</script>";
}
?>