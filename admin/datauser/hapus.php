<?php
include "../../koneksi.php";
$id_user = @$_GET ['id_user'];

mysqli_query($koneksi,"delete from user where id_user = '$id_user'") or die (mysqli_error($koneksi));
echo "<script>alert('Data Berhasil Di Hapus')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
?>   
