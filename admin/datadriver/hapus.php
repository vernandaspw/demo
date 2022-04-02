<?php
include "../../koneksi.php";
$id_driver = @$_GET ['id_driver'];

mysqli_query($koneksi,"delete from data_driver where id_driver = '$id_driver'") or die (mysqli_error($koneksi));
echo "<script>alert('Data Berhasil Di Hapus')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
?>   

