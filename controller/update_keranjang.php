<?php 

session_start();
  include 'function.php';
  $id_product= $_GET['id_product'];
  if ($_GET['action'] == 'tambah') {
    $_SESSION['keranjang'][$id_product]+=1;
  } 

  if ($_GET['action'] == 'kurang') {
    $_SESSION['keranjang'][$id_product] -= 1; 
  }

  if ($_SESSION['keranjang'][$id_product] < 1) {
  	unset($_SESSION['keranjang'][$id_product]);
  }

  echo "<script> location='keranjang.php'; </script>";
 ?>