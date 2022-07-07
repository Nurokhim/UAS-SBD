<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM berobat WHERE id_berobat = '{$id}'";
	$result = mysqli_query($con, $sql);
	header('location: berobat.php');
?>