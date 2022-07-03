<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit']))
{
 $id_dokter = $_POST['id_dokter'];
 $nama_dokter = $_POST['nama_dokter'];
 $sql = 'INSERT INTO dokter (id_dokter, nama_dokter) ';
 $sql .= "VALUE ('{$id_dokter}', '{$nama_dokter}')";
 $result = mysqli_query($con, $sql);
 header('location: dokter.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
	<title>Tambah Dokter</title>
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
		<h2 align="center" class="text-white">Tambah Dokter</h2>
		</header>
		<hr>
		<div class="main">
				<form method="post" action="tambah_dokter.php" enctype="multipart/form-data">
				<div class="input mb-3">
				<label for="nama_dokter" class="col-sm-2 col-form-label">Nama Dokter</label>
						<input type="text" class="form-control" name="nama_dokter">
				</div>
					<div class="submit">
						<input class="btn btn-primary mt-2" type="submit" name="submit" value="Simpan Data" />
						<a href="dokter.php" role="button"button type="button" class="btn btn-primary  mt-2">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>