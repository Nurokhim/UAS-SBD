<?php
$host = "localhost";
$user = "adminklinik";
$pass = "312010064";
$db = "klinik_312010064";
$con = mysqli_connect($host, $user, $pass, $db);
if ($con == false)
{
echo "Koneksi ke server gagal.";
die();
} #else echo "Koneksi berhasil";
?>