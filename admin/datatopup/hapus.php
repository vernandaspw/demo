<?php
include "../../koneksi.php";
$id_topup = @$_GET ['id_topup'];

mysqli_query($koneksi,"delete from topup_saldo where id_topup = '$id_topup'") or die (mysqli_error($koneksi));
echo "<script>alert('Data Berhasil Di Hapus')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
?>   
