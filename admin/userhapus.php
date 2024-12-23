
<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM user WHERE id='$_GET[id]'");
$koneksi->query("DELETE FROM pendaftaran WHERE iduser='$_GET[id]'");
echo "<script>alert('User Berhasil Di Hapus');</script>";
echo "<script> location ='index.php?halaman=userdaftar';</script>"; ?>