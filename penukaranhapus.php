
<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM penukaran WHERE idpenukaran='$_GET[id]'");
echo "<script>alert('penukaran Berhasil Di Hapus');</script>";
echo "<script> location ='riwayat.php';</script>"; ?>