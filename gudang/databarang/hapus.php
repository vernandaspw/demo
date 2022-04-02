<?php
include "../../koneksi.php";
$kd_barang = @$_GET ['kd_barang'];

mysqli_query($koneksi,"delete from data_barang where kd_barang = '$kd_barang'") or die (mysqli_error($koneksi));
echo "<script>alert('Data Berhasil Di Hapus')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
?>   

