<?php

include "../../koneksi.php";
$id_kustomer = $_SESSION['id_kustomer'];
$sql = mysqli_query($koneksi, "SELECT * FROM data_kustomer where id_kustomer = '$id_kustomer'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);
if (!$koneksi) {
  die("Koneksi gagal. "); // close koneksi
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
          function tanggal($format, $nilai = "now")
          {
            $en = array(
              "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Jan", "Feb",
              "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
            );
            $id = array(
              "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",
              "Jan", "Feb", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
              "Oktober", "November", "Desember"
            );
            return str_replace($en, $id, date($format, strtotime($nilai)));
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
        <p class="app-sidebar__user-name"><?php echo $data['nama_lengkap']; ?></p>
      </div>
    </div>
    <?php require_once '../navbar.php'; ?>




    <main class="app-content">
      <div class="app-title">
        <div class="col-md-12">
          <h1 class="fa fa-table">Pesan Barang</h1>
        </div>
      </div>

      <div class="col-md-12">
        <div class="tile">

          <br>
          <div class="panel-body">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Produk</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Pembelian</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $no = 1;
                    while ($dt = $query->fetch_assoc()) :
                    ?>

                      <form method="POST" action="cart.php">
                        <input type="hidden" name="kd_barang" value="<?= $dt['kd_barang']; ?>"></input>
                        <tr>
                          <th scope="row"><?= $no++; ?></th>
                          <td><?= $dt['nama_barang']; ?></td>
                          <td><?php echo 'Rp. ' . number_format($dt['harga_jual']); ?></td>
                          <td><?= $dt['stok']; ?></td>
                          <td width="106">
                            <input class="form-control form-control-sm" type="number" name="pembelian" value="1" min="1" max="<?= $dt['stok']; ?>">
                          </td>
                          <td>
                            <button class="btn btn-primary btn-sm" type="submit" name="submit">
                              <i class="fa fa-shopping-cart"></i>
                            </button>
                          </td>
                        </tr>
                      </form>

                    <?php endwhile; ?>

                  </tbody>
                </table>

                <a href="faktur.php"><button class="btn btn-danger">Lihat Transaksi</button></a>
              </div>
              <script src="../../style/js/jquery-3.3.1.min.js"></script>
              <script src="../../style/js/popper.min.js"></script>
              <script src="../../style/js/bootstrap.min.js"></script>
              <script src="../../style/js/main.js"></script>
              <!-- The javascript plugin to display page loading on top-->

              <script type="text/javascript" src="../../style/js/plugins/jquery.dataTables.min.js"></script>
              <script type="text/javascript" src="../../style/js/plugins/dataTables.bootstrap.min.js"></script>

</body>

</html>