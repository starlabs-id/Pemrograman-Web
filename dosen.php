<?php

	session_start ();
//jika nilainya false
if(! $_SESSION['LoginSukses1'] )
{
	//redirect ke halaman login
	header('location:login.php');
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dosen</title>
</head>

<body>
    	<center>
        	<h1  style="font-size:24px; text-align:center"> Selamat Datang Di Halaman Dosen</h1>
        	<p>
        		<a href="logout.php"><input value="Logout" class="submit" name="logout" type="submit"></a>
        	</p>
        </center>

</body>
</html>