
<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM produktukar WHERE idproduktukar='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script> location ='index.php?halaman=produktukardaftar';</script>"; ?>