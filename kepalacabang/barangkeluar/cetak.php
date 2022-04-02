<?php

include '../../koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Cetak Laporan</title>
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
	<IMG SRC="../logo1.jpg" WIDTH="70%">
 <BR>
 Komplek Pergudangan Sukarami<BR>

    <FONT SIZE="4"><I>Jalan. Terminal Alang-Alang Lebar KM.12 Palembang Telp. (0711)5646-821</FONT>
    </TD>
    <TD ALIGN="CENTER" WIDTH="20%"></TD>
    </TR>
    </TABLE>
	<hr style="border: 2px solid;">
<h4><center> LAPORAN BARANG KELUAR</h4>
   	      <table width="100%" align="center" cellspacing="0" cellpadding="2" border="1px" class="style1">
            <tr>
                <th width="3%" align="center" class="style1" bgcolor="#CCCCCC">No</th>
                <th width="5%" align="center" class="style1" bgcolor="#CCCCCC">Nama Barang</th>
                <th width="10%" align="center" class="style1" bgcolor="#CCCCCC">Nama Transaksi</th>
                <th width="8%" align="center" class="style1" bgcolor="#CCCCCC">Jumlah Keluar</th>
                <th width="6%" align="center" class="style1" bgcolor="#CCCCCC">Tanggal Transaksi</th>
                <th width="3%" align="center" class="style1" bgcolor="#CCCCCC">Keterangan</th>
            </tr>
			            <?php
                           $no = 1;
                           $sql1 = mysqli_query($koneksi, "SELECT * FROM barang_keluar INNER JOIN data_barang ON barang_keluar.kd_barang = data_barang.kd_barang INNER JOIN transaksi ON barang_keluar.id_transaksi = transaksi.id_transaksi inner join data_kustomer on transaksi.id_kustomer = data_kustomer.id_kustomer") or die ($db->error);
                           while( $databarang = mysqli_fetch_array($sql1)) { ?>
                                <tr>
                                    <td><center><?php echo $no++; ?></td>
                                    <td><center><?php echo $databarang['nama_barang']; ?></td>
                                    <td><center><?php echo $databarang['nama_lengkap']; ?></td>
                                    <td><center><?php echo $databarang['jumlah_keluar']; ?></td>
                                    <td><center><?php echo $databarang['tanggal']; ?></td>
                                    <td><center><?php echo $databarang['keterangan']; ?></td>
                                </tr>
                               
            <?php } ?>
				</tbody>
			</table>
		</div><!-- col-lg-12-->      	
	</div><!-- /row -->

	<script>
		window.print()
	</script>
</body>
</html>