<?php 
require_once 'cek_session.php';
$base_url = "http://localhost/distribusi/sales" ?>
   
    <!-- Sidebar menu-->
  
      <ul class="app-menu">
     
        <li><a class="app-menu__item active"  href="<?= $base_url ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="<?= $base_url ?>/datauser/index.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Profile</span></a></li>
        <li><a class="app-menu__item"  href="<?= $base_url ?>/datacostumer/index.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Data Costumer</span></a></li>
        
       
        </ul>
    </aside>
   