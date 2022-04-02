<?php
include "../../koneksi.php";
$id_transaksi = @$_GET ['id_transaksi'];

mysqli_query($koneksi,"delete from transaksi where id_transaksi = '$id_transaksi'") or die (mysqli_error($koneksi));
echo "<script>alert('Data Berhasil Di Hapus')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
?>   

