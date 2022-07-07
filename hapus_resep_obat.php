<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM resep_obat WHERE id_Resep = '{$id}'";
	$result = mysqli_query($con, $sql);
	header('location: resep_obat.php');
?>