<?php 
	session_start();
	$id_product = $_GET['id_product'];
	unset($_SESSION['keranjang'][$id_product]);
	echo (" <script>
                    document.location.href = '../index.php';
    </script>");
 ?>