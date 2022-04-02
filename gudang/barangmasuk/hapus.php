<?php
include "../../koneksi.php";
$id_barang_masuk = @$_GET ['id_barang_masuk'];

mysqli_query($koneksi,"delete from barang_masuk where id_barang_masuk = '$id_barang_masuk'") or die (mysqli_error($koneksi));
?>   

<script type=" text/javascript">
echo "<script>alert('Data Berhasil Di Hapus')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
</script>
