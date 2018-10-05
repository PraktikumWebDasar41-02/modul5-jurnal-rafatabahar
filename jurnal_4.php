<form action="" method="post">
	NIM: <input type="text" name="nim"><br>
	Nama: <input type="text" name="nama"><br>
	email: <input type="text" name="email"><br>
	<input type="submit" name="submit"><br>
</form>

<?php
	if (isset($_POST['submit'])) {
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];	

		$cek = true;


		if (empty($nim)) {
			echo "NIM tidak boleh kosong<br>";
			$cek = false;
		}else{
			if (strlen($nim)!=10 && !is_numeric($nim)) {
				echo "NIM Harus 10 digit dan angka<br>";
				$cek = false;
			}
		}
		
		if (empty($nama)) {
			echo "Nama tidak boleh kosong<br>";
			$cek = false;
		}else{
			if (strlen($nama)>20) {
				echo "Maksimal panjang nama 20 huruf<br>";
				$cek = false;
			}	
		}
		
		if (empty($email)) {
			echo "Email tidak boleh kosong";	
			$cek = false;
		}else{
			if (!strpos($email, '@') || !strpos($email, '.com')) {
				echo "Format email harus @ .com<br>";
				$cek = false;
			}
		}

		if ($cek) {
			$koneksi = mysqli_connect('localhost','root','','d_modul5');

			$sql = "INSERT INTO t_jurnal1 values ('$nim','$nama','$email','') ";
			mysqli_query($koneksi, $sql);
			session_start();
			$_SESSION['pk'] = $nim;
			header("Location:soal2.php");
		}
		
	}
	

	


?>
