<?php 

if(!session_id()) session_start();

if(!isset($_SESSION['id_kustomer'])) header('Location: ../index.php');