<?php
session_start();
include "../koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

if (trim($username)=="") {
	///include "login2.php"; 
	echo "<div align=center><b>Nama Belum diisi !!</b><br>";
	echo "Harap diisi terlebih dahulu</div>";
	exit;
}
elseif (trim($password)=="") {
	//include "login3.php"; 
	echo "<div align=center><b>Password Belum diisi !!</b><br>";
	echo "Harap diisi terlebih dahulu</div>";
	exit;
}
$passwordhash = md5($password);  // mengenkripsikannya untuk dicocokan dengan database
$perintahnya = "select username, password from login where username = '$username' and PASSWORD = '$passwordhash'";
$jalankanperintahnya = mysqli_query($koneksi, $perintahnya);
$ada_apa_enggak = mysqli_num_rows($jalankanperintahnya);
if ($ada_apa_enggak >= 1 )
{
	$_SESSION['username']=$username;
	$_SESSION['role']='admin';
	
header("location: haladmin.php?top=home.php");
}
else
//include "login.php";
echo "<div align=center style='margin-top:200px;'><center><font color='red'><strong>Username dan Password tidak sesuai</strong></font></center></div>";
echo "<center><a href='index.php'>Coba Lagi</a></center>";      
?>