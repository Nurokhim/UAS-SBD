<?php
error_reporting(E_ALL);
include 'koneksi.php';

if (isset($_POST['submit'])){
	$idPasien	= $_POST['id_Pasien'];
	$idDokter	= $_POST['id_Dokter'];
	$tgl		= date('Y-m-d');
	$keluhan 	= $_POST['keluhan'];
	$diagnosa	= $_POST['diagnosa'];
	$penata		= $_POST['penatalaksanaan'];

	$sql = "INSERT INTO berobat(id_pasien, id_dokter, tgl_berobat, keluhan_pasien, hasil_diagnosa, penatalaksanaan) 
	VALUES('{$idPasien}','{$idDokter}','{$tgl}','{$keluhan}','{$diagnosa}','{$penata}')";
	$result = mysqli_query($con, $sql);
	echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='berobat.php'</script>";
}

// Data Pasien
$stringPasien = "SELECT * FROM pasien order by id_pasien DESC";
$dataPasien	= mysqli_query($con, $stringPasien);
$arrayPasien = mysqli_fetch_array($dataPasien);

// Data Dokter
$stringDokter = "SELECT * FROM dokter order by id_dokter DESC";
$dataDokter	= mysqli_query($con, $stringDokter);
$arrayDokter = mysqli_fetch_array($dataDokter);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src ="js/bootstrap.min.js"></script>
	<title>Tambah Berobat</title>
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
		height: 800px;
		box-sizing: border-box;
		border-radius: 10px
	}
	</style>
</head>
<div class="main d-flex flex-column justify-content-center align-items-center">
		<div class="tambah-box p-5 shadow">
		<header class="irga">
		<h2 align="center" class="text-white">Tambah Berobat</h2>
		</header>
		<hr>
		<div id="container">
	<div class="hero" style="padding:2rem;">
		<h2 align="center">Tambah Berobat</h2>
		<div class="main">
			<form method="post" action="tambah_berobatphp" enctype="multipart/form-data">
				<div class="input mb-3">
					<label for="idPasien" class="col-sm-2 col-form-label">Pasien</label>
					<select class="form-control" name="idPasien" id="idPasien" required>
						<option value="">Pilih Pasien</option>
						<?php while($data2 = mysqli_fetch_array($dataPasien)){ ?>
							<option value="<?= $data2['id_pasien'];?>"><?= $data2['nama_pasien'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="input mb-3">
				<label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
						<input type="text" class="form-control" name="keluhan">
				</div>
				<div class="input mb-3">
					<label for="dokterLabel" class="col-sm-2 col-form-label">Dokter</label>
					<select class="form-control" id="DokterLabel" name="idDokter" required>
						<option value="">Pilih Dokter</option>
						<?php while($data = mysqli_fetch_array($dataDokter)){ ?>
						<option value="<?= $data['id_dokter'];?>"><?= $data['nama_dokter'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="input mb-3">
					<label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
					<input type="text" class="form-control" name="diagnosa" id="diagnosa" required>
				</div>
				<div class="input mb-3">
					<label for="penatalaksanaan" class="col-sm-2 col-form-label">Penatalaksanaan</label>
					<select class="form-control" name="penatalaksanaan" id="penatalaksanaan" required>
						<option value="Rawat Jalan">Rawat Jalan</option>
						<option value="Rawat Inap">Rawat Inap</option>
						<option value="Rujuk">Rujuk</option>
						<option value="lainnya">lainnya</option>
					</select>
				</div>
				<div class="submit">
				<div class="submit">
						<input class="btn btn-primary mt-2" type="submit" name="submit" value="Simpan Data" />
						<a href="berobat.php" role="button"button type="button" class="btn btn-primary  mt-2">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>