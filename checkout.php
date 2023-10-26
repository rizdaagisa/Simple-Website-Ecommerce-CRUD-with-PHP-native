<?php 

require './controller/function.php';
session_start();
if(isset($_POST['checkout'])){
    $id_pelanggan = add_pelanggan($_POST);
    foreach($_SESSION['keranjang'] as $id_product_keranjang => $jumlah){
        add_order($id_product_keranjang,$id_pelanggan['newid'],$jumlah);
    }
    echo (" <script>
                    alert('terimakasih, kami akan segera menghubungi anda');
                    document.location.href = 'index.php';
                </script>");
    unset($_SESSION['keranjang']);
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="fonawesome/css/fontawesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <!-- <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all"> -->

    <!-- Main CSS-->
    <link href="css/checkout.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper p-t-45 p-b-50" style="background-color: wheat;">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading" style="background-color: gray;">
                    <h2 class="title">Checkout Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nama">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Alamat</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="alamat">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nomor">
                                </div>
                            </div>
                        </div>
                        <div>
                            <input class="btn btn-block btn--red" type="submit" style="width: 100%; margin-bottom:15px;" name="checkout">Checkout</button>
                            <a href="index.php" style="margin-top: 15px !important;"><< kembali</a>
                        </div>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->