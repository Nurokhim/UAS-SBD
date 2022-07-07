<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $id = $_POST['id'];
	$id_berobat = $_POST['id_berobat'];
    $nama = $_POST['nama_obat'];


    $sql = 'UPDATE resep_obat SET ';
    $sql .= "id_berobat = '{$id_berobat}' , nama_obat = '{$nama}' " ;
    $sql .= "WHERE id_resep = '{$id}'";
    $result = mysqli_query($con, $sql);
    header('location: resep_obat.php');
}
    $id= $_GET['id'];
    $sql = "SELECT * FROM resep_obat WHERE id_resep = '{$id}'";
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
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.min.js"></script>
    <title>Ubah Data Resep Obat</title>
	<style>
		.irga {
		background-color: 	#FF4500;
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
<body>
<div class="main d-flex flex-column justify-content-center align-items-center">
	<div class="ubah-box p-5 shadow">
		<header class="irga">
		<h2 align="center">Edit Data Resep obat</h2>
		</header>
		<hr>
		<div class="main">
			<form method="post" action="edit_resep_obat.php" enctype="multipart/form-data">
				<div class="input">
					<label>Id Berobat</label>
					<input type="number" name="id_berobat" value="<?php echo $data['id_berobat'];?>"/>
				</div>
                <div class="input">
					<label>Nama Obat </label>
					<input type="text" name="nama_obat" value="<?php echo $data['nama_obat'];?>"/>
				</div>
				<div class="submit">
					<input type="hidden" name="id" value="<?php echo $data['id_resep'];?>" />
					<input class="btn btn-success" type="submit" name="submit" value="Simpan" />
				</div>
			</form>
		</div>
	</div>	
</div>
</body>
</html>