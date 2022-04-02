<?php 

include 'koneksi.php';

$username =($_POST['username']);
$password =md5($_POST['password']);

$login = mysqli_query($koneksi,"SELECT * FROM user WHERE username= '$username' AND password = '$password'");

$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
 $data = mysqli_fetch_assoc($login);

 // cek jika user login sebagai admin
 if($data['level']=="Admin"){

  // buat session login dan username
  $_SESSION['id_user'] = $data['id_user'];
  $_SESSION['username'] = $data['username'];
  $_SESSION['level'] = $data['level'];

  echo "<script>alert('Berhasil Login')</script>";
    echo "<meta http-equiv='refresh' content='1 url=admin/index.php'>";

 }else if($data['level']=="Sales"){
  // buat session login dan username
  $_SESSION['id_user'] = $data['id_user'];
  $_SESSION['username'] = $data['username'];

  $_SESSION['level'] = $data['level'];

  echo "<script>alert('Berhasil Login')</script>";
  echo "<meta http-equiv='refresh' content='1 url=sales/index.php'>";

}else if($data['level']=="Gudang"){
    // buat session login dan username
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];
  
    echo "<script>alert('Berhasil Login')</script>";
    echo "<meta http-equiv='refresh' content='1 url=gudang/index.php'>";
  

}else if($data['level']=="Kepala Cabang"){
    // buat session login dan username
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];
  
    echo "<script>alert('Berhasil Login')</script>";
    echo "<meta http-equiv='refresh' content='1 url=kepalacabang/index.php'>";
    
 }else{
    echo "<script>alert('Username atau Password salah')</script>";
    echo "<meta http-equiv='refresh' content='1 url=dwadwadwad.php'>";
 } 
}else{
 header("location:index.php?pesan=gagal");
}

?>

			                