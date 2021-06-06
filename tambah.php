<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit']))
{
 $nim = $_POST['nim'];
 $nama = $_POST['nama'];
 $email = $_POST['email'];
 $no_telp = $_POST['no_telp'];

 $sql = 'INSERT INTO data_siswa (nim,nama,email,no_telp) ';
 $sql .= "VALUE ('{$nim}', '{$nama}','{$email}', 
'{$no_telp}')";
 $result = mysqli_query($conn, $sql);
 header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en"><html>
<head>
	<title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Baru</h1>
<form action="tambah.php" method="post" enctype="multipart/form-data">
		<table width="45%">
            <tr>
                <td>Nim</td>
                <td><input type="text" name="nim"></td>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr> 
				<td>No Telp</td>
				<td><input type="text" name="no_telp"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Tambah">
                <a href="tambah.php"><button style=background-color:red>Hapus</button></a></td>
                <tr><td><a href="index.php">Kembali</a></td></tr>
	
			</tr>
		</table>
	</form>
	
</body>
</html>
</body>
</html>