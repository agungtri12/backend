
<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM penukaran WHERE idpenukaran='$_GET[id]'");
echo "<script>alert('Penukaran Berhasil Di Hapus');</script>";
echo "<script> location ='index.php?halaman=penukarandaftar';</script>"; ?>