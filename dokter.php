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
			background-color: 	#008B8B;
			border-radius: 5px;
			padding: 10px 23px;
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
<div class="container shadow p-3">
	<header>
	<h2 align="center" class="hero">Tabel Dokter</h2>
	</header>
	<div class="btn-toolbar mb-2 mb-md-10">
        <a class="btn btn-primary me-3" href="data.php" role="button">Kembali</a>
        <a class="btn btn-primary " href="tambah_dokter.php" role="button">Tambah</a>
	</div> 
	<hr>
	<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>No</td>
				<td>Id Dokter</td>
                <td>Nama Dokter</td>   
			    <td>Aksi</td>
            </tr>
        </thead>
        <?php
        include "koneksi.php";
        $no = 1;
        $query = mysqli_query($con, 'SELECT * FROM dokter');
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
				<td><?php echo $data['id_dokter'] ?></td>
                <td><?php echo $data['nama_dokter'] ?></td>
                <td><a class="btn btn-success" href="edit_dokter.php?id=<?= $data['id_dokter'];?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
					<a class="btn btn-danger" href="hapus_dokter.php?id=<?= $data['id_dokter'];?>" role="button"><i class="fa-solid fa-trash-can"></i></a>
            </tr>
        <?php } ?>
    </table>
	</div>
	<?php require "footer.php";?>
</div>
</body>
</html>