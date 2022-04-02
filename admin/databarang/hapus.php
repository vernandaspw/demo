<?php
include "../../koneksi.php";
$kd_barang = @$_GET ['kd_barang'];

mysqli_query($koneksi,"delete from data_barang where kd_barang = '$kd_barang'") or die (mysqli_error($koneksi));
?>   

<script type=" text/javascript">
	window.location.href="index.php";
</script>
