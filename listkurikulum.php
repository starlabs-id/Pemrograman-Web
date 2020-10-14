<?php

	session_start ();
	//jika nilainya false
if(! $_SESSION['LoginSukses'] )
{
	//redirect ke halaman login
	header('location:login.php');
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kurikulum</title>
</head>

<body>
<center>
	<h1  style="font-size:24px; text-align:center"> Selamat Datang Di Halaman Kurikulum</h1>
    <a href="addmatkul.php"><input value="Tambah Matakuliah" class="submit" name="addmatkul" type="submit"></a>
    <a href="admin.php"><input value="Kembali" class="submit" name="Kembali" type="submit" /></a><br /><br />
    
<?php

$sql = "SELECT * FROM matakuliah";

//konek ke database mysql
mysql_connect("localhost", "root", "");

//pilih database
mysql_select_db("simplesinak");

//jalankan perintah sql
$query = mysql_query($sql);

//tampilkan hasilnya

echo '<table border="1">';
echo '<tr><td>Kode Mata Kuliah</td><td>Nama Mata Kuliah</td><td>SKS</td><td><center>Action</center></td></tr>';

//dengan perulangan, tampilkan semua data di dalam tabel
while($row = mysql_fetch_array($query))
{
	echo '<tr>' 
		.'<td>' .$row['kode_matkul'] .'</td>'
		.'<td>' .$row['nama_matkul'] .'</td>'
		.'<td>' .$row['sks'] .'</td>'	
		.'<td>' 
		.'<a href="hapusmatkul.php?id=' .$row['id_matkul'] .'">Hapus |</a>' 
		.'<a href="updatematkul.php?id=' .$row['id_matkul'] .'"> Update</a>' 
		.'</td>'	
		.'</tr>';
	
}
echo '</table>';
?>
</center>
</body>
</html>