<?php
	session_start();
	$koneksi = mysqli_connect('localhost','root','','d_modul5');

	$pk = $_SESSION['pk'];

	$sql = "SELECT nama FROM t_jurnal1 WHERE nim = '$pk' ";
	$query = mysqli_query($koneksi, $sql);
	$hasil = mysqli_fetch_array($query);

	echo $hasil['nama'];
?>

<form method="post">
	Komentar: <textarea name="Komentar"></textarea><br>
	<input type="submit" name="submit"><br>
</form>

<?php
	if (isset($_POST['submit'])) {
		$komen = $_POST['Komentar'];
		$cek = true;

		if (empty($komen)) {
			echo "Komentar tidak boleh kosong";
			$cek = false;
		}else{
			if (str_word_count($komen)<5) {
				echo "Komentar minimal 5 kata";
				$cek = false;
			}	
		}
		
		if ($cek) {
			$tambah = "UPDATE t_jurnal1 SET komentar = '$komen' WHERE nim = '$pk' ";
			mysqli_query($koneksi, $tambah);
			header("Location:hal3.php");
		}
		
	}
	
?>