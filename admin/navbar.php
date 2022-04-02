<?php 
require_once 'cek_session.php';
$base_url = "http://localhost/distribusi/admin" ?>
   
    <!-- Sidebar menu-->
  
      <ul class="app-menu">
     
        <li><a class="app-menu__item active"  href="<?= $base_url ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Data Master</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= $base_url ?>/datauser/index.php"><i class="icon fa fa-circle-o"></i> Data User</a></li>
            <li><a class="treeview-item" href="<?= $base_url ?>/datakustomer/index.php"><i class="icon fa fa-circle-o"></i> Data Costumer</a></li>
            <li><a class="treeview-item" href="<?= $base_url ?>/datadriver/index.php"><i class="icon fa fa-circle-o"></i> Data Driver</a></li>
          </ul>
        </li>
      
       
        <li><a class="app-menu__item" href="<?= $base_url ?>/databarang/index.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Data Barang</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/faktur/index.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Faktur</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/datatopup/index.php"><i class="app-menu__icon fa fa-credit-card"></i><span class="app-menu__label">Data TopUp Saldo</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/suratjalan/index.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Surat Jalan</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/pembayaran/index.php"><i class="app-menu__icon fa fa-credit-card"></i><span class="app-menu__label">Pembayaran</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/laporan/index.php"><i class="app-menu__icon fa fa-print"></i><span class="app-menu__label">Laporan</span></a></li>
       
        </ul>
    </aside>
   