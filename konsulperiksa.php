<?php 
ob_start();
include "koneksi.php";
// mengambil variabel dari halaman konsultasiFM.php
$gejala 	= '';
$events 	= '';
if (isset($_POST['gejala']))
{
	$selectors 	= htmlentities(implode(',', $_POST['gejala']));
	//$events 	= htmlentities(implode('', $_POST['bobot']));
}
$data=$selectors;
//$databobot=$events;
echo "$selectors<br>";
//echo "$events";
$input = $data;
	  //memecahkan string input berdasarkan karakter '\r\n\r\n'
	  $pecah = explode("\r\n\r\n", $input);
	  // string kosong inisialisasi
	  $text = "";
	  //untuk setiap substring hasil pecahan, sisipkan <p> di awal dan </p> di akhir
	  // lalu menggabungnya menjadi satu string untuk $text
	  for ($i=0; $i<=count($pecah)-1; $i++)
	  {
	  	$part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
		$text .=$part;
	  }
	  //menampilkan outputnya
echo $text;
$kosongtabel=mysql_query("DELETE FROM tmp_gejala");
$text_line=$data;
$text_line =$data; //"Poll number 1, 1500, 250, 150, 100, 1000";
$text_line = explode(",",$text_line);
$posisi=0;
for ($start=0; $start < count($text_line); $start++) {
	$baris=$text_line[$start]; //echo "$baris<br>";
	// untuk nilai bobot	
	//$bobot=substr($databobot,$posisi,1); echo $bobot. "<br>";
	$sql="INSERT INTO tmp_gejala (kd_gejala) VALUES ('$baris')";
	$query=mysql_query($sql) or die(mysql_error());
	$posisi++;
print $text_line[$start] . "<BR>";
}
ob_start();
header("location:proses-diagnosa.php?top=hasil_diagnosa.php&id=1");
?>
