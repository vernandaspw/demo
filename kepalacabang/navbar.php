<?php 
require_once 'cek_session.php';
$base_url = "http://localhost/distribusi/kepalacabang" ?>
   
    <!-- Sidebar menu-->
  
      <ul class="app-menu">
        <li><a class="app-menu__item active"  href="<?= $base_url ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/databarang/index.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Data Barang</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/barangmasuk/index.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Data Barang Masuk</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/barangkeluar/index.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Data Barang Keluar</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/transaksi/index.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Data Transaksi</span></a></li>
       
        </ul>
    </aside>
   