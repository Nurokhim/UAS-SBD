<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM dokter WHERE id_dokter = '{$id}'";
	$result = mysqli_query($con, $sql);
	header('location: dokter.php');
?>