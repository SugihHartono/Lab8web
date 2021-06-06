<?php
// Create database connection using config file
include("koneksi.php");
 
// Fetch all users data from database
$sql = 'SELECT * FROM data_siswa';
$result = mysqli_query($conn, $sql);

?>

<DOCTYPE html>
<html lang="en">
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="tambah.php"><button>Tambah Data</button></a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>NIM</th> <th>NAMA</th> <th>Email</th> <th>NO HP</th> <th>UPDATE</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['nim']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['email']."</td>";    
        echo "<td>".$user_data['no_telp']."</td>";
        echo "<td><a href='ubah.php?id=$user_data[nim]'>Edit</a> | <a href='hapus.php?id=$user_data[nim]'>Delete</a></td></tr>";        
    }
    ?>
    
    </table>
</body>
</html>