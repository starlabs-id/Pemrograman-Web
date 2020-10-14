<?php
//menyimpan data ketika form disubmit
if( isset( $_POST['tbupdate'] ) )
{
	$a = $_POST['nama_matkul'];
	$b = $_POST['sks'];
	
	$sql = "UPDATE matakuliah SET nama_matkul = '$a' ,sks = '$b' WHERE id_matkul = " .$_GET['id'];
	mysql_connect("localhost", "root", "");
	mysql_select_db("simplesinak");
	if( mysql_query($sql))
	{
		echo "Data sudah terupdate";
		header('location:listkurikulum.php');
	}else{
		echo mysql_error();	
	}
}
?>

<?php
//mengambil data dari database
//todo: tinggal ditampilkan di form
$sql = "SELECT * FROM matakuliah WHERE id_matkul = "  .$_GET['id'];
mysql_connect("localhost", "root", "");
mysql_select_db("simplesinak");
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
?>
<center>
<form method="post">

<table>
    <tr>
    <td>Nama Matakuliah</td>
    <td><input type="text" name="nama_matkul" value="<?php echo $data['nama_matkul'] ?>"></td>
    </tr>
    
    <tr>
    <td>SKS</td>
    <td><input type="text" name="sks" value="<?php echo $data['sks'] ?>"></td>
    </tr> 
        
</table>
<input type="submit" value="update" name="tbupdate">

</form>
</center>