<?php 

if(!session_id()) session_start();

if(!isset($_SESSION['level'])) header('Location: ../index.php');