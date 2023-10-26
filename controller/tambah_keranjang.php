<?php 

session_start();
  $id_product= $_GET['id'];
  if (isset($_SESSION['keranjang'][$id_product])) {
    $_SESSION['keranjang'][$id_product]+=1;
  } else {
    $_SESSION['keranjang'][$id_product] = 1; 
  }

  echo "<script> alert('product telah ditambahkan ke keranjang'); </script>";
  echo "<script> location='all.php'; </script>";
 ?>