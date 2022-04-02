<?php
include "../../koneksi.php";
$id_kustomer = $_SESSION['id_kustomer'];  
$sql = mysqli_query($koneksi,"SELECT * FROM data_kustomer where id_kustomer = '$id_kustomer'") or die (mysqli_error($con));
$data = mysqli_fetch_array($sql);

if (!isset($_SESSION['cart'])) {
	header('Location: index.php');
}

$cart = unserialize(serialize($_SESSION['cart']));
$id_kustomer = $_SESSION['id_kustomer'];  
$total_barang = 0;
$total_bayar = 0;

for ($i=0; $i<count($cart); $i++) { 
    $id_kustomer = $_SESSION['id_kustomer'];  
	$total_barang += $cart[$i]['pembelian'];
	$total_bayar += $cart[$i]['pembelian'] * $cart[$i]['harga_jual'];
}

// proses penyimpanan data
$query = mysqli_query($koneksi, "INSERT INTO transaksi (id_kustomer, total_barang, total_bayar, tgl_transaksi) VALUES ('$id_kustomer','$total_barang', '$total_bayar', '" . date('Y-m-d') . "')");

$id_transaksi = mysqli_insert_id($koneksi);

for ($i=0; $i<count($cart); $i++) { 
   
	$kd_barang = $cart[$i]['kd_barang'];
	$pembelian = $cart[$i]['pembelian'];

	$query = mysqli_query($koneksi, "INSERT INTO detail_transaksi (id_transaksi, kd_barang, pembelian) VALUES ('$id_transaksi', '$kd_barang', '$pembelian')");
}

// unset session
unset($_SESSION['cart']);
echo "<script>alert('Anda Berhasil Memesan Barang')</script>";
echo "<meta http-equiv='refresh' content='1 url=faktur.php'>";