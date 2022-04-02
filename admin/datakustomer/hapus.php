<?php
include "../../koneksi.php";
$id_kustomer = @$_GET ['id_kustomer'];

mysqli_query($koneksi,"delete from data_kustomer where id_kustomer = '$id_kustomer'") or die (mysqli_error($koneksi));
echo "<script>alert('Data Berhasil Di Hapus')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
?>   

