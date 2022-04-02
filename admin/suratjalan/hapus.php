<?php
include "../../koneksi.php";
$id_surat_jalan = @$_GET ['id_surat_jalan'];

mysqli_query($koneksi,"delete from surat_jalan where id_surat_jalan = '$id_surat_jalan'") or die (mysqli_error($koneksi));
echo "<script>alert('Data Berhasil Di Hapus')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
?>   
