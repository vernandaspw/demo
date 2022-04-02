<?php 
require_once 'cek_session.php';
$base_url = "http://localhost/distribusi/customer" ?>
   
    <!-- Sidebar menu-->
  
      <ul class="app-menu">
        <li><a class="app-menu__item active"  href="<?= $base_url ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/datauser/index.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Data Profile</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/datapesan/index.php"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Pesan Barang</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/saldo/index.php"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">TopUp Saldo</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/faktur/index.php"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Pembayaran</span></a></li>
       
        </ul>
    </aside>
   