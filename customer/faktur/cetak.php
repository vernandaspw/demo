<?php

include '../../koneksi.php';


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Laporan</title>
	<!-- Bootstrap core CSS -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../style/css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
<body>
<center>

      <?php
        $id_pembayaran = @$_GET ['id_pembayaran'];
        $no = 1;
        $sql1 = mysqli_query($koneksi, "SELECT * FROM pembayaran inner join transaksi on pembayaran.id_transaksi = transaksi.id_transaksi INNER JOIN data_kustomer on transaksi.id_kustomer = data_kustomer.id_kustomer where id_pembayaran = '$id_pembayaran'") or die ($koneksi->error);
        $databarang=mysqli_fetch_array($sql1);
        ?>
        <div class="col-md-9">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-5">
                  <h2 class="page-header"></i>Faktur Penjualan</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right"><?php echo $databarang['tgl_transaksi']; ?></h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">
                  <address><strong>PT. KEMILING ARGO</strong><br>Jalan. Terminal Alang-Alang Lebar<br> KM.12 Palembang<br>Telp. (0711)5646-821</address>
                </div>
                <div class="col-4">
                  <address><strong>Customer : <?php echo $databarang['nama_lengkap']; ?></strong><br>Alamat : <?php echo $databarang['alamat']; ?><br>No Hp : <?php echo $databarang['no_hp']; ?></address>
                </div>
                <div class="col-4"><b>No Faktur : <?php echo $databarang['no_faktur']; ?></b><br><b>Total Bayar :  <td><?php echo 'Rp. '.number_format($databarang['total_bayar']); ?></td><br></div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                <table width="100%" align="center" cellspacing="0" cellpadding="2" border="1px" class="style1">
                    <thead>
                      <tr>
                      <th width="5%" class="style1"><center>Kode Barang</th>
                      <th width="7%" class="style1"><center>Nama Barang</th>
                      <th width="5%" class="style1"><center>Jumlah Barang</th>
                      <th width="5%" class="style1"><center>Harga Jual</th>
        
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                     $no = 1;
                     $id_pembayaran = @$_GET ['id_pembayaran'];
                     $sql1 = mysqli_query($koneksi, "SELECT * FROM pembayaran inner join transaksi on pembayaran.id_transaksi = transaksi.id_transaksi inner join data_kustomer on transaksi.id_kustomer = data_kustomer.id_kustomer inner join detail_transaksi on transaksi.id_transaksi = detail_transaksi.id_transaksi inner join data_barang on detail_transaksi.kd_barang = data_barang.kd_barang where id_pembayaran = '$id_pembayaran'") or die ($koneksi->error);
                      while( $datauser = mysqli_fetch_array($sql1)) { ?>
                           <tr>
                            <td><center><?php echo $datauser['kd_barang']; ?></td>
                            <td><center><?php echo $datauser['nama_barang']; ?></td>
                            <td><center><?php echo $datauser['total_barang']; ?></td>           
                            <td><center><?php echo 'Rp. '.number_format($datauser['harga_jual']); ?></td>  
                            </tr>
                            <?php
                            } ?>
                    </tbody>
                  </table>
                </div>
              </div>
          
          </div>
        </div>
      </div>
    </main>
	<script>
		window.print()
	</script>
</body>
</html>