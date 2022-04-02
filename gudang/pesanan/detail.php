<?php

include "../../koneksi.php";


if (!$koneksi) {
    die ("Koneksi gagal. " . mysqli_koneksiect_error()); // close koneksi
  }

  if (!isset($_GET['cari'])) {
    $query = mysqli_query($koneksi, "SELECT * FROM data_barang");
  } else {
    $query = mysqli_query($koneksi, "SELECT * FROM data_barang WHERE kd_barang LIKE '%" . $_GET['cari'] . "%'");
  }



    if (isset($_SESSION['pesan'])) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              ' . $_SESSION['pesan'] . '
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>';

      unset($_SESSION['pesan']);
    }
    ?>
    
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Halaman Customer</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../../style/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">PT. KEMILING AGRO</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
      <li class="app-search">
      <b>Hari ini : 
                        <?php
                            function tanggal($format,$nilai="now"){
                                $en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat","Jan","Feb",
                                "Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                                $id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
                                "Jan","Feb","Maret","April","Mei","Juni","Juli","Agustus","September",
                                "Oktober","November","Desember");
                                return str_replace($en,$id,date($format,strtotime($nilai)));
                            }

                            date_default_timezone_set('Asia/Jakarta');
                            echo tanggal("D, j M Y");
                        ?>
                    </a>

                    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
           
              <li><a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <div class="app-sidebar__overlay" data-toggle="sidebar">
        
        </div>
        <aside class="app-sidebar">
          <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../admin.png" width="60px" alt="User Image">
            <div>
                <?php 
                $username = $_SESSION['username'];  
                $sql11= mysqli_query($koneksi,"SELECT * FROM user where username = '$username'") or die (mysqli_error($con));
                $data11 = mysqli_fetch_array($sql11);
                ?>
              <p class="app-sidebar__user-name"><?php echo $data11['nama']; ?></p>
            </div>
          </div>
                    <?php require_once '../navbar.php'; ?>


 

      <main class="app-content">
      <div class="app-title">
      <div class="col-md-12">
            <h1 class="fa fa-table">Detail Pesanan</h1>
    </div>
</div>

<div class="col-md-12">
              <div class="tile">

                <br>
                <div class="panel-body">
                <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
    <thead align="center">
      <tr>
        <th>#</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Pembelian</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>

    <?php
$id_transaksi = @$_GET ['id_transaksi'];
    $query = mysqli_query($koneksi, "SELECT * FROM `detail_transaksi` INNER JOIN data_barang ON detail_transaksi.kd_barang = data_barang.kd_barang WHERE id_transaksi = '$_GET[id_transaksi]'");
    $no = 1;

    while($detail = $query->fetch_assoc()) :
    ?>

      <tr>
        <td align="center"><?= $no++; ?></td>
        <td><?= $detail['nama_barang']; ?></td>
        <td><?= $detail['harga_jual']; ?></td>
        <td align="center"><?= $detail['pembelian']; ?></td>
        <td align="center" width="100px">
        <a href="edit.php?id_detail=<?= $detail['id_detail'] ?>" class="badge badge-info">Pindahkan</a>
        </td>
      </tr>

    <?php endwhile; ?>

    </tbody>
        </table>

        <script src="../../style/js/jquery-3.3.1.min.js"></script>
    <script src="../../style/js/popper.min.js"></script>
    <script src="../../style/js/bootstrap.min.js"></script>
    <script src="../../style/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../../style/js/plugins/pace.min.js"></script>
    <!-- Google analytics script-->
    <script type="text/javascript" src="../../style/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../style/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>