<?php 

session_start();
if(isset($_POST['logout'])){
    unset($_SESSION['login']);
	echo (" <script>
            alert('Anda sudah logout');
            document.location.href = '../index.php';
            </script>");
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/main.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.css">
		<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/svg-with-js.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/svg-with-js.css">

    <?php if($_GET['page'] == "view"){ ?>
        <link rel="stylesheet" href="./assets/invoice.css">
        <script src="./assets/js/invoice.js"></script>
        <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <?php } ?>
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand ml-3 mb-5" href="" style="margin-left: 20px; margin-top:-10px; color:black">
                <h4><strong>Dashboard Admin</strong></h4>
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav" style="margin-top: 10px; margin-right:10px">
            <li>
                <form action="" method="post">
                    <input name="logout" type="submit" value="logout" class="btn btn-danger btn-sm"></input>
                </form>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav" id="list" >
                <li>
                    <a href="index.php?page=profile" class="menu"><i class="fa fa-fw fa-user"></i>Profile</a>
                </li>
                <li>
                    <a href="index.php?page=input"  class="menu"><i class="fas fa-plus"></i> Input Vespa</a>
                </li >
                <li>
                    <a href="index.php?page=data_vespa" class="menu"><i class="fas fa-table"></i> Data Vespa</a>
                </li>
                <li>
                    <a href="index.php?page=data_order" class="menu"><i class="fas fa-table"></i> Data Order</a>
                </li>
                <li>
                    <a href="index.php?page=messages" class="menu"><i class="fas fa-table"></i> Messages</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div style="margin-top: 30px;">
                <?php 

                	if (isset($_GET['page'])) {
                		if ($_GET['page'] == "profile") {
                			include './view/profile.php';
                        } elseif ($_GET['page'] == "input") {
                            include './view/input_vespa.php';
                        } elseif ($_GET['page'] == "data_vespa") {
                			include './view/table_vespa.php';
                		} elseif ($_GET['page'] == "data_order") {
                            include './view/table_order.php';
                        } elseif ($_GET['page'] == "hapus") {
                            include './controller/hapus.php';
                        } elseif ($_GET['page'] == "ubah") {
                            include './controller/ubah.php';
                        } elseif ($_GET['page'] == "view") {
                            include './view/invoice.php';
                        } elseif ($_GET['page'] == "messages") {
                            include './view/table_message.php';
                        } 
                	} else {
                		include 'profile.php';
                	} 

                 ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("list");
var btns = header.getElementsByClassName("menu");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
</body>
</html>