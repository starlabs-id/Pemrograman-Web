<html>
<head>
<title>Input KRS</title>
<center>
<?php
mysql_connect("localhost","root","");
mysql_select_db("simplesinak");

$nim = $_POST['nim'];
$sqlmhs = mysql_query("SELECT * FROM mhs WHERE nim='$nim'");

//cek nim
if(mysql_num_rows($sqlmhs)==0){
?>


<script>
alert("NIM Anda belum terdaftar di Kampus ini");
javascript:history.back(-1);
</script>


<?php
}

$mhs = mysql_fetch_array($sqlmhs);

//melakukan query ke database
$sqlmatkul = mysql_query("SELECT * FROM matakuliah");
while($k = mysql_fetch_array($sqlmatkul)){
$kode_matkul[] = $k['kode_matkul'];
$nama_matkul[] = $k['nama_matkul'];
$sks[] = $k['sks'];
}
?>


<script>


<?php
echo "var jumlah = ".count($kode_matkul).";\n";
echo "var sks = new Array();\n";
//mengambil sks matakuliah dan memasukkan ke array javascript
for($j=0; $j<count($kode_matkul); $j++){
echo "sks['".$kode_matkul[$j]."'] = ".$sks[$j].";\n";
}
?>


function hitungtotal(){
jum = 0;
for(i=0;i<jumlah;i++){
id = "mk"+i;
td1 = "k1"+i;
td2 = "k2"+i;
td3 = "k3"+i;
td4 = "k4"+i;
if(document.getElementById(id).checked){
kode_matkul = document.getElementById(id).value
jum = jum + sks[kode_matkul];
//untuk mengubah warna latar tabel apabila diceklist
document.getElementById(td1).style.backgroundColor = "lightblue";
document.getElementById(td2).style.backgroundColor = "lightblue";
document.getElementById(td3).style.backgroundColor = "lightblue";
document.getElementById(td4).style.backgroundColor = "lightblue";
}else {
document.getElementById(td1).style.backgroundColor = "white";
document.getElementById(td2).style.backgroundColor = "white";
document.getElementById(td3).style.backgroundColor = "white";
document.getElementById(td4).style.backgroundColor = "white";
}
}
//menampilkan total jumlah SKS yang diambil
document.getElementById("jsks").value = jum;
}
</script>
</head>
<body>
<div id="wrapper">
<h1>Input KRS</h1>
<span font-weight:bold;">Nama : <?=$mhs['nama'];?></span>
<div id="tabel_matkul">
<form name="inputkrs" method="post" action="outputkrs.php">
<input type="hidden" name="nim" value="<?=$mhs['nim'];?>">
<table border="1" width="500" cellpadding="1" cellspacing="1">
<tr align="center">
<th height="25" width="100">Kode Mata Kuliah</th>
<th>Nama Mata Kuliah</th>
<th>SKS</th>
<th>Ambil</th>
</tr>


<?php
//menampilkan matakuliah ke dalam tabel
for($i=0; $i<count($kode_matkul); $i++){
?>


<tr>
<td id="k1<?=$i;?>"><?=$kode_matkul[$i];?></td>
<td id="k2<?=$i;?>"><?=$nama_matkul[$i];?></td>
<td id="k3<?=$i;?>" align="center"><?=$sks[$i];?></td>
<td id="k4<?=$i;?>" align="center"><input type="checkbox" name="mk[]" onClick="hitungtotal()" value="<?=$kode_matkul[$i];?>" id="mk<?=$i;?>">
</tr>


<?php
}
?>


<tr>
<td colspan="3"><b>JUMLAH YANG DIAMBIL</b></td>
<td align="center"><input type="text" name="totalsks" size="3" maxlength="3" id="jsks" readonly="readonly" style="text-align:center; color:red;"></td>
</tr>
<tr><td colspan="4" align="center"><input type="submit" value="Proses" style="cursor:pointer;"></td></tr>
</table>
</form>
</div>
</div>
</center>
</body>
</html>
