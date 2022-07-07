<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $id = $_POST['id_berobat'];
    $nama_pasien = $_POST['nama_pasien'];
    $nama_dokter = $_POST['nama_dokter'];
	$tgl = $_POST['tgl_berobat'];
	$keluhan = $_POST['keluhan'];
	$hasil  = $_POST['hasil_diagnosa'];	
    $penata  = $_POST['pentalaksanaan'];	


    $sql = 'UPDATE berobat SET ';
    $sql .= "id_pasien = '{$id_pasien}', nama_dokter  = '{$nama_dokter}', tgl_berobat= '{$tgl}', keluhan = '{$keluhan}',' hasil_diagnosa = '{$hasil}', penatalaksaan = '{$penata} '" ;
    $sql .= "WHERE id_berobat = '{$id}'";
    $result = mysqli_query($con, $sql);
    header('location: berobat.php');
}
    $id= $_GET['id'];
    $sql = "SELECT * FROM berobat WHERE id_berobat = '{$id}'";
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
	<link rel="stylesheet" href="bootstrap.min.css" />
    <script src="../js/bootstrap.min.js"></script>
    <title>Ubah Barang</title>
	<style>
		.oim{
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
		height: 700px;
		box-sizing: border-box;
		border-radius: 10px
	}
	</style>
</head>
<body>
<div class="main d-flex flex-column justify-content-center align-items-center">
		<div class="tambah-box p-5 shadow">
		<header class="oim">
		<h2 align="center" class="text-white">Edit Berobat</h2>
		</header>
		<hr>
		<div class="main">
			<form method="post" action="edit_berobat.php" enctype="multipart/form-data">
				<div class="input">
					<label>Id Berobat</label>
					<input type="text" name="id_berobat" value="<?php echo $data['id_berobat'];?>"/>
				</div>
				<div class="input">
					<label>Id pasien</label>
					<input type="text" name="id_pasien" value="<?php echo $data['id_pasien'];?>"/>
				</div>
                <div class="input">
					<label>Id Dokter</label>
					<input type="text" name="id_dokter" value="<?php echo $data['id_dokter'];?>"/>
				</div>
                <div class="input">
					<label>Tanggal Berobat</label>
					<input type="date" name="tgl_berobat" value="<?php echo $data['tgl_berobat'];?>"/>
				</div>
                <div class="input">
					<label>Keluhan pasien</label>
					<input type="text" name="keluhan_pasien" value="<?php echo $data['keluhan_pasien'];?>"/>
				</div>
                <div class="input">
					<label>Hasil Diagnosa</label>
					<input type="text" name="hasil_diagnosa" value="<?php echo $data['hasil_diagnosa'];?>"/>
				</div>
				<div class="input">
					<label>Penaksanaan</label>
					<select name="penatalaksanaan">
						<option <?php echo is_select ('Rawat_Jalan', $data['penatalaksanaan']);?> value="Rawat_Jalan">Rawat_Jalan</option>
						<option <?php echo is_select ('Rawat_Inap', $data['penatalaksanaan']);?> value="Rawat_Inap">Rawat_Inap</option>
                        <option <?php echo is_select ('Rujuk', $data['penatalaksanaan']);?> value="Rujuk">Rujuk</option>
                        <option <?php echo is_select ('isolasi', $data['penatalaksanaan']);?> value="isolasi">Isolasi</option>

					</select>
				<div class="submit">
					<input type="hidden" name="id" value="<?php echo $data['id_berobat'];?>" />
					<input class="btn btn-success" type="submit" name="submit" value="Simpan" />
				</div>
			</form>
		</div>
	</div>	
</div>
</body>
</html>