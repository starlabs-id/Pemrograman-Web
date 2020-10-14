<?php
$sql = "DELETE FROM matakuliah WHERE id_matkul = " .$_GET['id'] ;

//koneksi ke database mysql

mysql_connect("localhost", "root", "");

//pilih database
mysql_select_db("simplesinak");

//jalankan query
if( mysql_query($sql) )
{
	echo 'data sudah dihapus';
	header('location:listkurikulum.php');
}else{
	echo mysql_error();	
}


?>
