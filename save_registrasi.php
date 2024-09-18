<?php 
session_start();
//include "librari/inc.koneksidb.php";
include "koneksi.php";
# Baca variabel Form (If Register Global ON)
$TxtNama 	= $_REQUEST['TxtNama'];
$RbKelamin 	= $_POST['cbojk'];
$TxtUmur	= $_REQUEST['TxtUmur'];
$TxtAlamat 	= $_REQUEST['TxtAlamat'];
$email=$_POST['textemail'];
$NOIP = $_SERVER['REMOTE_ADDR'];
$username = $_POST['username'];
$password = md5($_POST['password']);

# Validasi Form

$NOIP = $_SERVER['REMOTE_ADDR'];

//$sqldel = "DELETE FROM pasien WHERE noip='$NOIP'";	mysqli_query($sqldel, $koneksi);

$sql  = " INSERT INTO pasien (nama,username,password,kelamin,umur,alamat,tanggal,email) 
			VALUES ('$TxtNama','$username','$password','$RbKelamin','$TxtUmur','$TxtAlamat',NOW(),'$email')";
mysqli_query($koneksi, $sql) 
		or die ("SQL Error 2".mysqli_error());

$sqlhapus = "DELETE FROM tmp_penyakit WHERE noip='$NOIP'";
mysqli_query($koneksi, $sqlhapus) or die ("SQL Error 1".mysqli_error());

$sqlhapus2 = "DELETE FROM tmp_analisa WHERE noip='$NOIP'";
mysqli_query($koneksi, $sqlhapus2) or die ("SQL Error 2".mysqli_error());
		
$sqlhapus3 = "DELETE FROM tmp_gejala WHERE noip='$NOIP'";
mysqli_query($koneksi, $sqlhapus3) or die ("SQL Error 3".mysqli_error());
#	$sqlhapus4 = "DELETE FROM analisa_hasil WHERE noip='$NOIP'";
#	mysqli_query($sqlhapus4, $koneksi) or die ("SQL Error 4".mysqli_error());

$_SESSION['username'] = $username;
$_SESSION['role'] = 'role';

echo "<meta http-equiv='refresh' content='0; url=konsultasifm.php'>";
?>
	