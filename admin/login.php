<?php 


session_start();
Include '../controller/function.php';

  if (isset( $_SESSION['login']) ) {
      header('Location: index.php?page=profile');
  }

	if (isset($_POST['login'])) {
		// var_dump($_POST);
		$username = $_POST["username"];
		$password = $_POST['password'];

		$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' ");

		if ( mysqli_num_rows($result) === 1) {

			$row = mysqli_fetch_assoc($result);

			if ($password == $row["password"]){
				// var_dump($row);
				$_SESSION['login'] = true; //set session
				header('Location: index.php?page=profile');
				exit;
			} 
      
	  } else{
    $error = true;
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/login.css">
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login Admin</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <a href="../index.php"><< Kembali</a>
                                <input type="submit" name="login" class="btn btn-info btn-md btn-block" value="login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>