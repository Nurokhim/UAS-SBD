<?php
include_once 'koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM pasien WHERE id_pasien = '{$id}'";
$result = mysqli_query($con, $sql);
header('location: pasien.php');
?>