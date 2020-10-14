<?php
//menyimpan data ketika form disubmit
if( isset( $_POST['tbupdate'] ) )
{
	$a = $_POST['NIM'];
	$b = $_POST['Nama'];
	$c = $_POST['Alamat'];
	$d = $_POST['Tgl_lahir'];
	$e = $_POST['No_hp'];
	$f = $_POST['Password'];
	
	$sql = "UPDATE mhs SET nama = '$b', alamat = '$c', tgl_lahir = '$d', no_hp = '$e', password = '$f' WHERE NIM = " .$_GET['id'];
	mysql_connect("localhost", "root", "");
	mysql_select_db("simplesinak");
	if( mysql_query($sql))
	{
		echo "Data sudah terupdate";
		header('location:listmahasiswa.php');
	}else{
		echo mysql_error();	
	}
}
?>

<?php
//mengambil data dari database
//todo: tinggal ditampilkan di form
$sql = "SELECT * FROM mhs WHERE NIM = "  .$_GET['id'];
mysql_connect("localhost", "root", "");
mysql_select_db("simplesinak");
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
?>
<center>
<form method="post">

<table>
    <tr>
    <td>Nama</td>
    <td><input type="text" name="Nama" value="<?php echo $data['nama'] ?>"></td>
    </tr>
    
    <tr>
    <td>Alamat</td>
    <td><input type="text" name="Alamat" value="<?php echo $data['alamat'] ?>"></td>
    </tr> 
    
    <tr>
    <td>tgl_lahir</td>
    <td><input type="text" name="Tgl_lahir" value="<?php echo $data['tgl_lahir'] ?>"></td>
    </tr> 
    
    <tr>
    <td>No_Hp</td>
    <td><input type="text" name="No_hp" value="<?php echo $data['no_hp'] ?>"></td>
    </tr> 
    
    <tr>
    <td>Password</td>
    <td><input type="password" name="Password" value="<?php echo $data['password'] ?>"></td>
    </tr>      
</table>
<input type="submit" value="update" name="tbupdate">

</form>
</center>