<!DOCTYPE html>
<html>
	
<head>
	<meta charset="UTF-8">
	<title>Login Admin</title>
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<link href="bootstrap.min.css" rel="stylesheet" />
	<style>
		.main{
		height: 100vh;
	}

	.tambah-box{
		width: 500px;
		height: 400px;
		box-sizing: border-box;
		border-radius: 10px
	}
	</style>
</head>

<body>
<?php
				require('koneksi.php');
				session_start();
				// If form submitted, insert values into the database.
				if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `user` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: indeks2.php"); // Redirect user to index.php
            }else{
				echo "
			<div class='form'>
				<h3>Username/password is incorrect.</h3>
				<br/>Click here to 
				<a href='login.php'>Login</a>
			</div>";
				}
    }else{
?>

			
    <div id="login-wrapper">
        <div class="main d-flex flex-column justify-content-center align-items-center">
			<div class="tambah-box p-5 shadow mb-3">
                <form action="" method="post">
                    <h1>Sign In</h1>
                    <?php if (isset($error)) : ?>
                        <p style="color: red;font-style: italic;">Username / Password Salah!</p>
                    <?php endif; ?>
                    <div class="form-group">
                    <label class="form-label">Username</label>
                        <input type="username" name="username" class="form-control" placeholder="Username" autocomplete="off" autofocus />
                    </div>
                    <div class="form-group">
                    <label class="form-label">Passowrd</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="btn btn-primary mt-3 form-control" value="Login">
                     </div>
                </form>
		    </div>
        </div>
    </div>
    <?php }?>
</body>

</html>
