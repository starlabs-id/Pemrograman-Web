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
<title>Add Mahasiswa</title>
</head>

<html>

	<style>
		.tables {
			padding:20px;
			border-spacing:5px;	
			border-bottom-style:groove;
			border-top:groove;
	}
		th {
			background-color:#333;
			color:#FFF	;
			padding:10px;
	}


	</style>
    
    <?php
	
		if (isset($_POST['simpan']))
		{
		
			if(($_POST['NIM']=="") || ($_POST['nama']=="") || ($_POST['alamat']=="") || ($_POST['tgl_lahir']=="") || ($_POST['no_hp']=="") || ($_POST['password']=="")) 
			{					
				echo '<script language="javascript">';
				echo 'alert("pastikan semua data terisi")';
				echo '</script>';
				
			} else 
				{
			$koneksi = mysql_connect("localhost:3306","root","");
			$vNIM = $_POST["NIM"];
			$vnama = $_POST["nama"];
			$valamat = $_POST["alamat"];			
			$vtgl_lahir = $_POST["tgl_lahir"];
			$vno_hp = $_POST["no_hp"];
			$vpassword = $_POST["password"];
			
			if($koneksi){
				mysql_select_db("simplesinak");
				$sqlstr="insert into mhs(NIM, nama, alamat, tgl_lahir, no_hp, password)values('$vNIM','$vnama','$valamat','$vtgl_lahir','$vno_hp','$vpassword')";
				
				$hasil = mysql_query($sqlstr,$koneksi);
				echo "<br>";
				echo '<script language="javascript">';
				echo 'alert("pendaftaran berhasil")';
				echo '</script>';
				header('location:listmahasiswa.php');
				mysql_close($koneksi);				
			}else{
				echo "Tidak tersambung ke koneksi Database...!!!";
			}
			
				}
			
		}
		
	
	?>

	<body>

	<form method="post">
	

	<table class="tables" align="center">
		
		<tr>
		<td>HALAMAN ADD MAHASISWA</td>
		</tr>

	</table>

	<br><br>

	<table align="center">


		<tr>
		<td>NIM</td>
		</tr>
		<tr>	
		<td><input type="text" name="NIM" placeholder="NIM">
		</tr>
		
		<tr>
		<td>Nama</td>
		</tr>
		<tr>
		<td><input type="text" name="nama" placeholder="Nama anda">
		</tr>

		<tr>
		<td>Alamat</td>
		</tr>
		<tr>
		<td><input type="text" name="alamat" placeholder="alamat">
		</tr>


		<tr>
		<td>Tgl. Lahir</td>
		</tr>
		<tr>
		<td><input type="date" name="tgl_lahir" id="tanggallahir" /></td>
		</tr>
            
        <tr>
		<td>No_ HP</td>
		</tr>
		<tr>
		<td><input type="text" name="no_hp" placeholder="no.hp">
		</tr>			
			

		</table>
		</tr>
	</table>

	<table align="center">
		<tr>
		<td>Password</td>
		</tr>
		<tr>
		<td><input type="text" name="password" placeholder="password"</td>
		</tr>

	</table>


	<br><br>

	<table align="center">

		<tr>
		<td><input type="submit" name="simpan" value="Simpan"/></td>
		</tr>

	</table>

	</form>
	</body>

</html>

<body>
</body>
</html>