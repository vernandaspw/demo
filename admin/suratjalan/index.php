<?php
include "../../koneksi.php";

$username = $_SESSION['username'];  
$sql = mysqli_query($koneksi,"SELECT * FROM user where username = '$username'") or die (mysqli_error($con));
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
    <title>Halaman Admin</title>
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
              <p class="app-sidebar__user-name"><?php echo $data['nama']; ?></p>
              <p class="app-sidebar__user-designation"><?php echo $data['email']; ?></p>
            </div>
          </div>
                    <?php require_once '../navbar.php'; ?>

    <main class="app-content">
      <div class="app-title">
      <div class="col-md-12">
            <h1 class="fa fa-table"> Surat Jalan</h1>
    </div>
</div>
<div class="col-md-12">
              <div class="tile">
                <div class="panel-heading"><a href="tambah.php" class="btn btn-primary btn-sm">Tambah Data</a></div>
                <br>
                <div class="panel-body">
                <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Driver</th>
                                    <th>No Faktur</th>
                                    <th>Tanggal</th>
                        
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $sql1 = mysqli_query($koneksi, "SELECT * FROM surat_jalan INNER JOIN data_driver ON surat_jalan.id_driver = data_driver.id_driver INNER JOIN pembayaran ON surat_jalan.no_faktur = pembayaran.no_faktur") or die ($db->error);
                            while( $suratjalan = mysqli_fetch_array($sql1)) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $suratjalan['nama']; ?></td>
                                    <td><?php echo $suratjalan['no_faktur']; ?></td>
                                    <td><?php echo $suratjalan['tanggal_jalan']; ?></td>
                                   
                                    <td align="center" width="100px">
                                    <a href="cetak.php?id_surat_jalan=<?= $suratjalan['id_surat_jalan'] ?>" class="badge badge-primary">Cetak</a>
                                    <a href="edit.php?id_surat_jalan=<?= $suratjalan['id_surat_jalan'] ?>" class="badge badge-info">Edit</a>
                                        <a onclick="return confirm('Yakin akan menghapus data?');" href="hapus.php?id_surat_jalan=<?= $suratjalan['id_surat_jalan'] ?>" class="badge badge-danger">Hapus</a>
                                
                                    </td>
                                </tr>
                            <?php
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
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