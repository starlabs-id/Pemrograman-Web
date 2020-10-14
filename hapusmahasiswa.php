<?php
$sql = "DELETE FROM mhs WHERE NIM = " .$_GET['id'] ;

//koneksi ke database mysql

mysql_connect("localhost", "root", "");

//pilih database
mysql_select_db("simplesinak");

//jalankan query
if( mysql_query($sql) )
{
	echo 'data sudah dihapus';
	header('location:listmahasiswa.php');
}else{
	echo mysql_error();	
}


?>
