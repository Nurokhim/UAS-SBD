<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
{
 if (isset($_POST['submit'])){
	$idObat	= $_POST['idObat'];
	$idBerobat	= $_POST['idBerobat'];

	$sql = "INSERT INTO resep_obat(id_berobat, id_obat) VALUES('{$idBerobat}', '{$idObat}')";
	$result = mysqli_query($con, $sql);
	header('location: resep_obat.php');
}
 
 
 // Data Obat
$stringObat = "SELECT * FROM obat order by id_obat DESC";
$dataObat	= mysqli_query($con, $stringObat);
$arrayObat = mysqli_fetch_array($dataObat);

// Data Berobat
$stringBerobat = "SELECT * FROM berobat order by id_berobat DESC";
$dataBerobat	= mysqli_query($con, $stringBerobat);
$arrayBerobat = mysqli_fetch_array($dataBerobat);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
	<style>
	.nurokhim {
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
		<header class="nurokhim">
		<h2 align="center" class="text-white">Tambah Resep Obat</h2>
		</header>
		<hr>
		<div id="container">
	<div class="hero" style="padding:2rem;">
		<div class="main">
			<form method="post" action="tambah_resep_obat.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label for="obatLabel" class="col-sm-2 col-form-label">Id Obat</label>
					<select class="form-control" name="idObat" id="obatLabel" required>
						<option value="">Pilih Obat</option>
						<?php while($data = mysqli_fetch_array($dataObat)){ ?>
							<option value="<?= $data['id_obat'];?>"><?= $data['nama_obat'];?></option>
						<?php } ?>
					</select>
				</div>	
				<div class="input mb-3">
					<label for="idBerobat" class="col-sm-2 col-form-label">Berobat</label>
					<select class="form-control" id="idBerobat" name="idBerobat" required>
						<option value="">Pilih Berobat</option>
						<?php while($data2 = mysqli_fetch_array($dataBerobat)){ ?>
					<option value="<?= $data2['id_berobat'];?>"><?= $data2['id_berobat'];?> | <?= $data2['hasil_diagnosa'];?> </option>
						<?php } ?>
					</select>
				</div>
					<div class="submit">
						<input class="btn btn-primary mt-2" type="submit" name="submit" value="Simpan Data" />
						<a href="resep_obat.php" role="button"button type="button" class="btn btn-primary  mt-2">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>