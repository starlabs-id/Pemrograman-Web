<?php

session_start();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
<center>
<?php
if( isset($_POST['btLogin']) )
{
	echo 'Form disubmit';
	$xU = $_POST['u']; //mengambil username yg diinputkan user
	$xP = $_POST['p'];
	$xP_enc = md5( $_POST['p'] ); //enkrip password dgn MD5
	
	//koneksi ke server
	mysql_connect("localhost", "root", "");
	
	//pilih database yg digunakan
	mysql_select_db("simplesinak");
	
	$sql = "SELECT * FROM admin  WHERE username = '$xU'  AND password = '$xP' ";
	$sql1 = "SELECT * FROM dosen  WHERE nip = '$xU'  AND password = '$xP' ";
	$sql2 = "SELECT * FROM mhs  WHERE nim = '$xU'  AND password = '$xP' ";
	
	//kirimkan perintah SQL ke database server
	$result = mysql_query($sql);
	$result1 = mysql_query($sql1);
	$result2 = mysql_query($sql2);
	
	//hitung jumlah data yg dihasilkan oleh perintah SQL 
	$jml = mysql_num_rows($result);
	$jml1 = mysql_num_rows($result1);
	$jml2 = mysql_num_rows($result2);


	if($jml >= 1)
	{
		$_SESSION['LoginSukses'] = true;
		
		echo 'Login sukses';
		header('location:admin.php');
	}
	if($jml1 >= 1)
	{
		$_SESSION['LoginSukses1'] = true;
		
		echo 'Login sukses';
		header('location:dosen.php');
	}
	if($jml2 >= 1)
	{
		$_SESSION['LoginSukses2'] = true;
		
		echo 'Login sukses';
		header('location:mahasiswa.php');
	}
	else
		echo 'Login Gagal';	
}
	
?>
<br />
<br />
<br />
<br />

<table class="tables" align="center">
		
		<tr>
		<td><h1>Silahkan Login</h1></td>
		</tr>

</table>
<br />

<form method="post" >
	<input type="text" name="u" placeholder="Identitas" /> <br />
    <input type="password" name="p" placeholder="Password" /> <br /><br />
    <input type="submit" name="btLogin" value="Login"  />
    
    
</form>

<p>
Keterangan :
Admin : identitas = admin password = admin<br />
Dosen : identitas = 930255 password = 12345<br />
Mahasiswa : identitas = 1500 password = 111111<br />
Mahasiswa : identitas = 1500 password = 121212<br />
Mahasiswa : identitas = 1500 password = 131313<br />
User_2 (1500)<br/>
User_4 (1500)<br/>
User_3 (1500)<br/>
</p>
</center>
</body>
</html>
