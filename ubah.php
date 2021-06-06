<?php
error_reporting(0); //abaikan error pada browser
//panggil file koneksi.php yang sudah anda buat
include "koneksi.php";
?>
<!doctype html public >
<html>
<head>
       <title>Ubah Data</title>
</head>
<body>
<h1> Edit Produk</h1>
<?php
//ambil data berdasarkan parameter GET id
$b = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM data_siswa where nim='$_GET[id]'"));

//buat variabel dari setiap field name form data_siswa
$nim= mysqli_real_escape_string($conn, $_POST['nim']);    //varibel field nim
$nama= mysqli_real_escape_string($conn, $_POST['nama']);    //varibel field nama
$email= mysqli_real_escape_string($conn, $_POST['email']);  //varibel field email
$no_telp= mysqli_real_escape_string($conn, $_POST['no_telp']);        //varibel field no_telp

if(isset($_POST['simpan'])){
 if(empty($nim)){    //jika nama kosong maka muncul pesan
        $error="<p style='color:#F00;'>* Masukan Nim</p>";
    }
    elseif(empty($nama)){ //jika kategori kosong maka muncul pesan
        $error="<p style='color:#F00;'>* Pilih nama</p>";
    }
    elseif(empty($email)){  //jika deskripsi kosong maka muncul pesan
        $error="<p style='color:#F00;'>* Masukan email</p>";
    }
    elseif(strlen($no_telp) < 10){  //jika deskripsi kosong maka muncul pesan
        $error="<p style='color:#F00;'>* Masukan No Telp</p>";
    }
    else{  //jika semua sudah terpenuhi maka update ke data_siswa

    $save=mysqli_query($conn, "UPDATE data_siswa set nama='$nama',email='$email',no_telp='$no_telp' where nim='$_GET[id]'");
    if($save){ //jika update berhasil maka muncul pesan dan menuju ke halaman produk
        echo "<script>alert('Data Berhasil disimpan ke database');document.location='index.php'</script>";
    }else{  //jika update gagal maka muncul pesan
         echo "<script>alert('Proses simpan gagal, coba kembali');document.location='ubah.php'</script>";
    }
}
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <table cellspacing="10" width="800" >
    <tbody>
    <tr><td colspan="3"><?php echo $error;?></td></tr>
    <tr>
        <td>Nim</td>
        <td></td>
        <td><input type="text" name="nim" placeholder="nim" size="50" maxlength="30" autocomplete="off" autofocus value="<?php echo $b['nim'];?>"/>
        </td>
    </tr>
    <tr>
        <td>Nama</td>
        <td></td>
        <td><input type="text" name="nama" placeholder="nama" size="20" maxlength="50" value="<?php echo $b['nama'];?>"/></td>
    </tr>
    <tr>
        
    <td>Email</td>
        <td></td>
        <td><input type="text" name="email" placeholder="email" size="20" maxlength="50" value="<?php echo $b['email'];?>"/></td></tr>
    <tr>
        <td>No Telp</td>
        <td></td>
        <td><input type="text" name="no_telp" placeholder="no_telp" size="20" maxlength="13" value="<?php echo $b['no_telp'];?>"/></td></tr>
    
    <tr>
        <td><button type="submit" name="simpan">Simpan</button></td>
    </tr>
</tbody>

</table>
</form>

</body>
</html>