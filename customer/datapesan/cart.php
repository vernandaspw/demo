<?php
include "../../koneksi.php";
$id_kustomer = $_SESSION['id_kustomer'];
$sql = mysqli_query($koneksi, "SELECT * FROM data_kustomer where id_kustomer = '$id_kustomer'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);


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
                <?php
                if (isset($_POST['kd_barang'], $_POST['pembelian'])) {

                  $kd_barang = $_POST['kd_barang'];
                  $pembelian = $_POST['pembelian'];

                  $produk = mysqli_query($koneksi, "SELECT * FROM data_barang WHERE kd_barang = '$kd_barang'");
                  $dt_produk = $produk->fetch_assoc();

                  if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

                  $index = -1;
                  $cart = unserialize(serialize($_SESSION['cart']));

                  // jika produk sudah ada dalam cart maka pembelian akan diupdate
                  for ($i = 0; $i < count($cart); $i++) {
                    if ($cart[$i]['kd_barang'] == $kd_barang) {
                      $index = $i;
                      $_SESSION['cart'][$i]['pembelian'] = $pembelian;
                      break;
                    }
                  }

                  // jika produk belum ada dalam cart
                  if ($index == -1) {
                    $_SESSION['cart'][] = [
                      'kd_barang' => $kd_barang,
                      'nama_barang' => $dt_produk['nama_barang'],
                      'harga_jual' => $dt_produk['harga_jual'],
                      'pembelian' => $pembelian
                    ];
                  }
                }

                if (!empty($_SESSION['cart'])) {

                ?>
                  <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>

                      <tr align="center">
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Pembelian</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Aksi</th>
                      </tr>

                      <?php
                      if (isset($_SESSION['cart'])) {
                        $cart = unserialize(serialize($_SESSION['cart']));
                        $index = 0;
                        $no = 1;
                        $total = 0;
                        $total_bayar = 0;

                        for ($i = 0; $i < count($cart); $i++) {
                          $total = $_SESSION['cart'][$i]['harga_jual'] * $_SESSION['cart'][$i]['pembelian'];
                          $total_bayar += $total;
                      ?>

                          <tr>
                            <td align="center"><?= $no++; ?></td>
                            <td><?= $cart[$i]['nama_barang']; ?></td>
                            <td align="center"><?= $cart[$i]['pembelian']; ?></td>
                            <td><?php echo 'Rp. ' . number_format($cart[$i]['harga_jual']); ?></td>
                            <td><?php echo 'Rp. ' . number_format($total); ?></td>
                            <td align="center">
                              <a href="?index=<?= $index; ?>">
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                              </a>
                            </td>
                          </tr>

                      <?php
                          $index++;
                        }

                        // hapus produk dalam cart
                        if (isset($_GET['index'])) {
                          $cart = unserialize(serialize($_SESSION['cart']));
                          unset($cart[$_GET['index']]);
                          $cart = array_values($cart);
                          $_SESSION['cart'] = $cart;
                        }
                      }
                      ?>

                      <tr>
                        <td colspan="4" align="right"><strong>Total Bayar</strong></td>
                        <td><strong><?php echo 'Rp. ' . number_format($total_bayar); ?></strong></td>
                        <td align="center">
                          <a href="transaksi.php">
                            <button class="btn btn-success btn-sm">Checkout</button>
                          </a>

                        </td>
                      </tr>

                  </table>
                  <a href="index.php">
                    <button class="btn btn-success btn-sm">Lanjut Pesan</button>
                  </a>
                  <br>
                  <hr>

                <?php
                }

                if (isset($_GET['index'])) {
                  echo "<meta http-equiv='refresh' content='1 url=index.php'>";
                }
                ?>