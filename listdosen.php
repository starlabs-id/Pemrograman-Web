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
<title>List Dosen</title>
</head>

<body>
<center>
	<h1  style="font-size:24px; text-align:center"> Selamat Datang Di Halaman List Dosen</h1>
	<a href="adddosen.php"><input value="Tambah Dosen" class="submit" name="adddosen" type="submit"></a>
    <a href="admin.php"><input value="Kembali" class="submit" name="Kembali" type="submit" /></a><br /><br />
    
<?php

$sql = "SELECT * FROM dosen";

//konek ke database mysql
mysql_connect("localhost", "root", "");

//pilih database
mysql_select_db("simplesinak");

//jalankan perintah sql
$query = mysql_query($sql);

//tampilkan hasilnya

echo '<table border="1">';
echo '<tr><td>NIP</td><td>NAMA</td><td>ALAMAT</td><td>No_hp</td><td><center>Action</center></td></tr>';

//dengan perulangan, tampilkan semua data di dalam tabel
while($row = mysql_fetch_array($query))
{
	echo '<tr>' 
		.'<td>' .$row['nip'] .'</td>'
		.'<td>' .$row['nama'] .'</td>'
		.'<td>' .$row['alamat'] .'</td>'
		.'<td>' .$row['no_hp'] .'</td>'	
		.'<td>' 
		.'<a href="hapusdosen.php?id=' .$row['nip'] .'">Hapus |</a>' 
		.'<a href="updatedosen.php?id=' .$row['nip'] .'"> Update</a>' 
		.'</td>'	
		.'</tr>';
		
}
echo '</table>';
?>
</center>

</body>
</html>