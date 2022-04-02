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
</head>
<body>
<div class="col-md-12">
<div class="panel panel-default">
<TABLE WIDTH="100%">
    <TR>
    <TD ALIGN="right" WIDTH="20%"></TD>

    <TD ALIGN="CENTER" WIDTH="60%"><FONT SIZE="5">
	<IMG SRC="../laporan/logo1.jpg" WIDTH="70%">
 <BR>
 Komplek Pergudangan Sukarami<BR>

    <FONT SIZE="4"><I>Jalan. Terminal Alang-Alang Lebar KM.12 Palembang Telp. (0711)5646-821</FONT>
    </TD>
    <TD ALIGN="CENTER" WIDTH="20%"></TD>
    </TR>
    </TABLE>
	<hr style="border: 2px solid;">
<h4><center> LAPORAN TRANSAKSI</h4>
   	      <table width="100%" align="center" cellspacing="0" cellpadding="2" border="1px" class="style1">
            <tr>
            <tr>
                <th width="3%" align="center" class="style1" bgcolor="#CCCCCC">No</th>
                <th width="5%" align="center" class="style1" bgcolor="#CCCCCC">No Faktur</th>
                <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Nama Transaksi</th>
                <th width="8%" align="center" class="style1" bgcolor="#CCCCCC">Total Bayar</th>
                <th width="6%" align="center" class="style1" bgcolor="#CCCCCC">Tanggal Transaksi</th>
               
            </tr>
            <?php
                                          if(isset($_POST['submit'])){
                           
                                            $tanggal_bayar=mysqli_real_escape_string($koneksi,@$_POST['tanggal_bayar']);
                               
                                            $no = 1;
                                            $sql1 = mysqli_query($koneksi, "SELECT * FROM pembayaran inner join transaksi on pembayaran.id_transaksi = transaksi.id_transaksi INNER JOIN data_kustomer on transaksi.id_kustomer = data_kustomer.id_kustomer  where tanggal_bayar = '$tanggal_bayar'") or die ($koneksi->error);
                                            while( $datauser = mysqli_fetch_array($sql1)) { ?>
                               <tr>
                                    <td><center><?php echo $no++; ?></td>
                                    <td><center><?php echo $datauser['no_faktur']; ?></td>
                                    <td><center><?php echo $datauser['nama_lengkap']; ?></td>
                                    <td><center><?php echo 'Rp. '.number_format($datauser['total_bayar']); ?></td>
                                    <td><center><?php echo $datauser['tanggal_bayar']; ?></td>
                                  
                                </tr>
                            <?php } ?>     <?php } ?>
				</tbody>
			</table>
		</div><!-- col-lg-12-->      	
	</div><!-- /row -->

	<script>
		window.print()
	</script>
</body>
</html>