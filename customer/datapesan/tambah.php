<?php
include "../../koneksi.php";

$id_kustomer = $_SESSION['id_kustomer'];  
$sql = mysqli_query($koneksi,"SELECT * FROM data_kustomer where id_kustomer = '$id_kustomer'") or die (mysqli_error($con));
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
              <p class="app-sidebar__user-name"><?php echo $data['nama_lengkap']; ?></p>
            </div>
          </div>
                    <?php require_once '../navbar.php'; ?>

    <main class="app-content">
      <div class="app-title">
      <div class="col-md-12">
            <h1 class="fa fa-table"> Pesan Barang</h1>
    </div>
</div>
<div class="col-md-12">
          <div class="tile">
                <div class="panel-heading">Tambah Pesan Barang&nbsp; <a href="index.php" class="btn btn-warning btn-sm">Kembali</a></div>
                <br>
                <div class="tile-body">
	            <div class="panel-body">
                    <form method="post">
                    <div class="form-group">
                            <label>Nama </label>
                            <select name="id_kustomer" class="form-control" readonly>
                            <?php
                            $id_kustomer = $_SESSION['id_kustomer'];  
                            $user = mysqli_query($koneksi,"SELECT * from data_kustomer WHERE id_kustomer = '$id_kustomer' ");
                            while($duser = mysqli_fetch_array($user)) {                           
                              echo "<option value='$duser[id_kustomer]'> $duser[nama_lengkap]</option>";
                             }                        
                            ?>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Barang </label>
                            <select name="kd_barang" class="form-control">
                            <?php
                        
                            $user1 = mysqli_query($koneksi,"SELECT * from data_barang");
                            while($duser1 = mysqli_fetch_array($user1)) {                           
                              echo "<option value='$duser1[kd_barang]'> $duser1[nama_barang]</option>";
                             }                        
                            ?>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Barang</label>
                            <input type="text" name="jumlah_stok" class="form-control" placeholder="Masukan Jumlah Barang" required />
                        </div>
                        <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <input type="date" name="tanggal_transaksi" class="form-control" placeholder="" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-success" />
                            <input type="reset" value="Reset" class="btn btn-danger" />
                        </div>
                    </form>
                    <?php
                        if (isset($_POST['simpan'])) {
                       
                        
                        $id_kustomer = mysqli_real_escape_string($koneksi, $_POST['id_kustomer']);
                        $kd_barang = mysqli_real_escape_string($koneksi, $_POST['kd_barang']);
                        $jumlah_stok = mysqli_real_escape_string($koneksi, $_POST['jumlah_stok']);
                        $tanggal_transaksi = mysqli_real_escape_string($koneksi, $_POST['tanggal_transaksi']);

                        
                        $sql1 = mysqli_query($koneksi, "INSERT INTO transaksi(id_transaksi, id_kustomer, kd_barang, jumlah_stok, tanggal_transaksi) VALUES (null, '$id_kustomer', '$kd_barang', '$jumlah_stok', '$tanggal_transaksi')") or die ($koneksi->error);
                      
                        echo "<script>alert('Pesanan Berhasil')</script>";
                        echo "<meta http-equiv='refresh' content='1 url=index.php'>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- User Menu-->
    <script type="text/javascript" src="../../style/js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
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