<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$sql = "DELETE FROM user WHERE id = '{$id}'";
	$result = mysqli_query($con, $sql);
	header('location: user.php');
?>