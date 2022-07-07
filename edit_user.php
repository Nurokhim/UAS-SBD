<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $id = $_POST['id'];
	$username = $_POST['username'];
	$passd = $_POST['password'];
	$nama = $_POST['nama_lengkap'];	


    $sql = 'UPDATE user SET ';
    $sql .= "username = '{$username}', password  = '{$pass}', nama_lengkap = '{$nama}' " ;
    $sql .= "WHERE id = '{$id}'";
    $result = mysqli_query($con, $sql);
    header('location: user.php');
}
    $id= $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = '{$id}'";
    $result = mysqli_query($con, $sql);
    if (!$result) die('Error: Data tidak tersedia');
    $data = mysqli_fetch_array($result);

    function is_select($var, $val) {
        if ($var == $val) return 'selected="selected"';
        return false;
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
	<title>Edit User</title>
	<style>
	.irga {
		background-color: 	#DEB887;
		border-radius: 5px;
		padding: 10px 23px;
		margin-bottom: 20px;
	}
	form div > label {
			display: inline-block;
			width: 100px;
			height: 30px;
	}
	form div > label {
			display: inline-block;
			width: 100px;
			height: 50px;
	}
	form input[type="text"], form textarea {
			border: 1px solid;
	}
	
	.main{
		height: 100vh;
	}
	
	.tambah-box{
		width: 900px;
		height: 600px;
		box-sizing: border-box;
		border-radius: 10px
	}
	</style>
</head>
<div class="main d-flex flex-column justify-content-center align-items-center">
		<div class="tambah-box p-5 shadow">
		<header class="irga">
		<h2 align="center" class="text-white">Edit User</h2>
		</header>
		<hr>
		<div class="main">
			<form method="post" action="edit_user.php" enctype="multipart/form-data">
			<div class="input">
				<label for="username" class="col-sm-2 col-form-label">Username</label>
				<input type="text" class="form-control" name="username" value="<?php echo $data['username'];?>"/>
				</div>
				<div class="input">
					<label for="passwod" class="col-sm-2 col-form-label">Password</label>
					<input type="number"  class="form-control" name="password" value="<?php echo $data['password'];?>"/>
				</div>
                <div class="input">
				<label for="nama_lengkap" class="col-sm-2 col-form-label mb-2">Nama Lengkap</label>
					<input type="type"  class="form-control mb-3" name="nama_lengkap" value="<?php echo $data['nama_lengkap'];?>"/>
				</div>
				<div class="submit">
					<input type="hidden" name="id" value="<?php echo $data['id'];?>" />
					<input class="btn btn-success" type="submit" name="submit" value="Simpan" />
					<a href="user.php" role="button"button type="button" class="btn btn-success">Batal</a>
				</div>
			</form>
		</div>
	</div>	
</div>
</body>
</html>