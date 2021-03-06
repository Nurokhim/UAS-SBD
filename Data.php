<?php
	require "koneksi.php";
	
	$querypasien = mysqli_query($con, "SELECT * FROM pasien");
	$jumlahpasien = mysqli_num_rows($querypasien);
	
	$queryobat = mysqli_query($con, "SELECT * FROM obat");
	$jumlahobat = mysqli_num_rows($queryobat);
	
	$querydokter = mysqli_query($con, "SELECT * FROM dokter");
	$jumlahdokter = mysqli_num_rows($querydokter);
	
	$queryberobat = mysqli_query($con, "SELECT * FROM berobat");
	$jumlahberobat = mysqli_num_rows($queryberobat);
	
	$queryresep = mysqli_query($con, "SELECT * FROM resep_obat");
	$jumlahresep = mysqli_num_rows($queryresep);
	
	$queryuser = mysqli_query($con, "SELECT * FROM user");
	$jumlahuser = mysqli_num_rows($queryuser);
	
	// IMPLEMETASI FUNCTION (untuk menampilkan total pasien)
	$data_pasien = mysqli_query($con, "SELECT fn_totalUsers() as total");
	$jumlah_pasien = mysqli_fetch_row($data_pasien);
	// END IMPLEMENTASI FUNCTION

	// IMPLEMENTASI SUBQUERY (menampilkan total posien yang belum berobat)
	$totalPasienBelumBerobat = mysqli_query($con, "SELECT count(id_pasien) as total FROM pasien WHERE id_pasien NOT IN(SELECT DISTINCT id_pasien FROM berobat)");
	$totalPasienBelumBerobat = mysqli_fetch_row($totalPasienBelumBerobat);
	// END IMPLEMENTASI SUBQUERY
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="fontawesome/fontawesome/css/all.css" />
		<title>Hello, world!</title>
	<style>
	
		<style>

.hero {
	background-color: #E0FFFF;
	padding: 50px 23px;
	margin-bottom: 20px;
}
.super {
	background-color: #E6E6FA;
	padding: 50px 23px;
	margin-bottom: 20px;
}
.no-decoration{
	text-decoration: none;
}
.navbar{
	background-color: #008080;
}
.container-data {
	background-color: #E0FFFF;
	padding: 50px 23px;
	margin-bottom: 20px;
}
		.kotak {
			border: solid;
		}
		.summary-pasien{
			background-color: #FF0000;
			border-radius: 15px;
		}
		.summary-obat{
			background-color: #FF0000;
			border-radius: 15px;
		}
		.summary-dokter{
			background-color: #008B8B;
			border-radius: 15px;
		}
		.summary-berobat{
			background-color: #008B8B;
			border-radius: 15px;
		}
		.summary-resep{
			background-color: #DEB887 ;
			border-radius: 15px;
		}
		.summary-user{
			background-color: #DEB887;
			border-radius: 15px;
		}
		.no-decoration{
			text-decoration: none;
		}
		.navbar{
			background-color: #008080;
		}
		.container-data {
			background-color: #E0FFFF;
			padding: 50px 23px;
			margin-bottom: 20px;
		}
	</style>
	<body>
<div id="container">
        <header>
            <h1 align="center">Sistem Informasi Klinik</h1>
        </header>
		<nav>
 <a href="indeks2.php">Home</a>
 <a href="data.php"class="active">Data</a>
</nav>
<section id="hero"></section>
<section id="wrapper">
 <section id="main"></section>
 <aside id="sidebar"></aside>
</section>
<style css >
/* navigasi */
nav {
 display: block;
 background-color: #A52A2A;
}
nav a {
 padding: 15px 30px;
 display: inline-block;
 color: #ffffff;
 font-size: 14px;
 text-decoration: none;
 font-weight: bold;
}
nav a.active,
nav a:hover {
 background-color: #A52A2A;
}
</style>

		<h2><i class="fa-solid fa-user"></i> Selamat Datang Di Klinik Nurokhim</h2>
		<hr>
		<div class="container-data mt-4">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-pasien p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-bed-pulse fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Pasien</h3>
								<p class="fs-4"><?php echo $jumlahpasien; ?> Pasien</p>
								<p> <a href="pasien.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-obat p-3">
						<div class="row">
							<div class="col-6">
							<i class="fa-solid fa-pills fa-7x"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Obat</h3>
								<p class="fs-4"><?php echo $jumlahobat; ?> Obat</p>
								<p> <a href="obat.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-dokter p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-user-doctor fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Dokter</h3>
								<p class="fs-4"><?php echo $jumlahdokter; ?> Dokter</p>
								<p> <a href="dokter.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-berobat p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-syringe fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Berobat</h3>
								<p class="fs-4"><?php echo $jumlahberobat; ?> Berobat</p>
								<p> <a href="berobat.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-resep p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-receipt fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">Resep</h3>
								<p class="fs-4"><?php echo $jumlahresep; ?> Resep</p>
								<p> <a href="resep_obat.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 col-12 mb-3">
					<div class="summary-user p-3">
						<div class="row">
							<div class="col-6">
								<i class="fa-solid fa-hospital-user fa-7x text-black-50"></i>
							</div>
							<div class="col-6 text-white">
								<h3 class="fs-2">User</h3>
								<p class="fs-4"><?php echo $jumlahuser; ?> User</p>
								<p> <a href="user.php" class="text-white no-decoration">Lihat Detail</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- IMPLEMENTASI SUBQUERY -->
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="summary-user p-3">
										<div class="row">
											<div class="col-4">
												<i class="fa-solid fa-hospital-user fa-7x text-black-5"></i>
											</div>
											<div class="col-8 text-white">
												<h3 class="fs-2">Belum Berobat</h3>
												<p class="fs-4">
													<?= $totalPasienBelumBerobat[0] ; ?> 
													Pasien
												</p>
												<p><a href="#" class="text-white no-decoration" style="text-decoration:underline"></a></p>
											</div>
										</div>
									</div>
								</div>
								<!-- END IMPLEMENTASI SUBQUERY -->

								<!-- IMPLEMENTASI FUNCTION -->
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="summary-user p-3">
										<div class="row">
											<div class="col-4">
												<i class="fa-solid fa-hospital-user fa-7x text-black-5"></i>
											</div>
											<div class="col-8 text-white">
												<h3 class="fs-2">Total Pasien</h3>
												<p class="fs-4">
													<?= $jumlah_pasien[0] ; ?>
													Total Pasien
												</p>
												<p><a href="#" class="text-white no-decoration" style="text-decoration:underline"></a></p>
											</div>
										</div>
									</div>
								</div>
								<!-- END IMPLEMENTASI FUNCTION -->
								
                <!-- IMPLEMENTASI VIEW -->
			<div class="card" style="margin-top:2rem;">
				<div class="card-body">
					<h4>Data Berobat Laki-Laki</h4>
					<div class="container mt-4">
						<table class="table" style="margin-top:1rem;">
							<thead>
								<tr>
									<td>No.</td>
									<td>Nama Pasien</td>
									<td>Jenis Kelamin</td>
									<td>Umur</td>
									<td>Keluhan</td>
									<td>Hasil Diagnosa</td>
									<td>Nama Dokter</td>
								</tr>
							</thead>
							<?php
								$no = 1;
								$query = mysqli_query($con, 'SELECT * FROM viewPenyakit');
								while ($data = mysqli_fetch_array($query)) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $data['nama_pasien'] ?></td>
								<td><?= $data['jenis_kelamin'] ?></td>
								<td><?= $data['umur'] ?></td>
								<td><?= $data['keluhan_pasien'] ?></td>
								<td><?= $data['hasil_diagnosa'] ?></td>
								<td><?= $data['nama_dokter'] ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
	
	<?php require "footer.php";?>
</div>
</body>
</html>