<?php 

include 'koneksi.php';

$username =($_POST['username']);
$password =md5($_POST['password']);

$login1 = mysqli_query($koneksi,"SELECT * FROM data_kustomer WHERE username= '$username' AND password = '$password'");

$cek1 = mysqli_num_rows($login1);

// cek apakah username dan password di temukan pada database
if($cek1 > 0){
 $data1 = mysqli_fetch_assoc($login1);

  $_SESSION['id_kustomer'] = $data1['id_kustomer'];
  $_SESSION['username'] = $username;
  $_SESSION['nama_lengkap'] = $data1['nama_lengkap'];

  echo "<script>alert('Berhasil Login')</script>";
  echo "<meta http-equiv='refresh' content='1 url=customer/index.php'>";


}else{
    echo "<script>alert('Username atau Password salah')</script>";
    echo "<meta http-equiv='refresh' content='1 url=index.php'>";
    }
    



?>