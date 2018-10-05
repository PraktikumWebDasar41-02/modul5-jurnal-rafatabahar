<?php

	session_start();
	$koneksi = mysqli_connect('localhost','root','','d_modul5');

	$pk = $_SESSION['pk'];

	$sql = "SELECT * FROM t_jurnal1 WHERE nim = '$pk' ";
	$query = mysqli_query($koneksi, $sql);
	$hasil = mysqli_fetch_array($query);

	echo "Nama : ".$hasil['Nama']."<br>";
	echo "komentar : ".$hasil['komentar']."<br>";
	echo "Email : ".$hasil['email']."<br>";

	session_destroy();
?>

