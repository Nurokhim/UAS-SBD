<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="fontawesome/fontawesome/css/all.css" />
    <title>Menampilkan data dari database</title>
	<style>
		.hero {
			background-color: 	#8FBC8F;
			border-radius: 5px;
			padding: 10px 23px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
<div class="container shadow p-3">
	<header>
	<h2 align="center" class="hero">Tabel Berobat</h2>
	</header>
	<div class="btn-toolbar mb-2 mb-md-10">
	<a class="btn btn-primary me-3" href="data.php" role="button">Kembali</a>
        <a class="btn btn-primary " href="tambah_berobat.php" role="button ">Tambah</a>
       
	</div> 
	<hr>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<td>No</td>
					<td>Id Berobat</td>
					<td>Id Pasien</td>
					<td>Id Dokter</td>
					<td>Tanggal Berobat</td>
					<td>Keluhan Pasien</td>
					<td>Hasil Diagnosa</td>
					<td>Penatalaksanaan</td>  
					<td>Aksi</td>
				</tr>
			</thead>
			<?php
			include "koneksi.php";
			$no = 1;
			$query = mysqli_query($con, 'SELECT * FROM berobat');
			while ($data = mysqli_fetch_array($query)) {
			?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $data['id_berobat'] ?></td>
					<td><?php echo $data['id_pasien'] ?></td>
					<td><?php echo $data['id_dokter'] ?></td>
					<td><?php echo $data['tgl_berobat'] ?></td>
					<td><?php echo $data['keluhan_pasien'] ?></td>
					<td><?php echo $data['hasil_diagnosa'] ?></td>
					<td><?php echo $data['penatalaksanaan'] ?></td>
					<td><a class="btn btn-success" href="edit_berobat.php?id=<?= $data['id_berobat'];?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
					<a class="btn btn-danger" href="pasien_hapus.php?id=<?= $data['id_berobat'];?>" role="button"><i class="fa-solid fa-trash-can"></i></a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
	<?php require "footer.php";?>
</div>
</body>
</html>