<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
		
			if(($_POST['kode_matkul']=="") || ($_POST['nama_matkul']=="") || ($_POST['sks']=="")) 
			{					
				echo '<script language="javascript">';
				echo 'alert("pastikan semua data terisi")';
				echo '</script>';
				
			} else 
				{
			$koneksi = mysql_connect("localhost:3306","root","");
			$vkode_matkul = $_POST["kode_matkul"];
			$vnama_matkul = $_POST["nama_matkul"];
			$vsks = $_POST["sks"];	
			
			if($koneksi){
				mysql_select_db("simplesinak");
				$sqlstr="insert into matakuliah(kode_matkul, nama_matkul, sks)values('$vkode_matkul','$vnama_matkul','$vsks')";
				
				$hasil = mysql_query($sqlstr,$koneksi);
				echo "<br>";
				echo '<script language="javascript">';
				echo 'alert("Penambahan berhasil")';
				echo '</script>';
				header('location:listkurikulum.php');
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
		<td>Kode Mata Kuliah</td>
		</tr>
		<tr>	
		<td><input type="text" name="kode_matkul" placeholder="Kode Matakuliah">
		</tr>
		
		<tr>
		<td>Nama Matakuliah</td>
		</tr>
		<tr>
		<td><input type="text" name="nama_matkul" placeholder="Nama Matakuliah">
		</tr>

		<tr>
		<td>sks</td>
		</tr>
		<tr>
		<td><input type="text" name="sks" placeholder="sks">
		</tr>			
        
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