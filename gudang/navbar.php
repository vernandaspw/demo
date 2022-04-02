<?php 
require_once 'cek_session.php';
$base_url = "http://localhost/distribusi/gudang" ?>
   
    <!-- Sidebar menu-->
  
      <ul class="app-menu">
        <li><a class="app-menu__item active"  href="<?= $base_url ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/datauser/index.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Data Profil</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/databarang/index.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Data Barang</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/pesanan/index.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Surat Pesanan Barang</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/barangmasuk/index.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Barang Masuk</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/barangkeluar/index.php"><i class="app-menu__icon fa fa-credit-card"></i><span class="app-menu__label">Barang Keluar</span></a></li>

       
        </ul>
    </aside>
   