<?php
include "../../koneksi.php";
$id_barang_keluar = @$_GET ['id_barang_keluar'];

mysqli_query($koneksi,"delete from barang_keluar where id_barang_keluar = '$id_barang_keluar'") or die (mysqli_error($koneksi));
echo "<script>alert('Data Berhasil Di Hapus')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
?>   
