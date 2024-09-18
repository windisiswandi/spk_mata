<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Data Relasi</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 800px;
        margin: auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h3 {
        text-align: center;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    td {
        padding: 10px;
        border: 1px solid #ddd;
        background-color: #fff;
    }

    td:first-child {
        width: 30%;
        font-weight: bold;
    }

    select,
    input[type="submit"],
    input[type="button"] {
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    select {
        width: calc(100% - 22px);
    }

    input[type="submit"],
    input[type="button"] {
        cursor: pointer;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        border: none;
    }

    input[type="button"] {
        background-color: #f44336;
        color: #fff;
        border: none;
    }

    input[type="button"]:hover,
    input[type="submit"]:hover {
        opacity: 0.8;
    }
    </style>
</head>

<body>
    <div class="container">
        <h3>Edit Data Relasi</h3>
        <hr>
        <form id="form1" name="form1" method="post" action="update_relasi.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Kode</td>
                    <td>
                        <select name="TxtKdPenyakit" id="TxtKdPenyakit">
                            <option value="NULL">[ Daftar Penyakit ]</option>
                            <?php 
	$sqlp = "SELECT * FROM penyakit ORDER BY kd_penyakit";
	$qryp = mysqli_query($koneksi, $sqlp) 
		    or die ("SQL Error: ".mysql_error());
	while ($datap=mysql_fetch_array($qryp)) {
		if ($datap['kd_penyakit']==$kdsakit) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datap[kd_penyakit]' $cek>$datap[kd_penyakit]&nbsp;|&nbsp;$datap[nama_penyakit]</option>";
	}
  ?>
                        </select><?php $id_relasi=$_GET['id_bobot'];?>
                        </label><input name="textrelasi" type="hidden" value="<?php echo $id_relasi?>" />
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>Gejala</td>
                    <td>
                        <select name="TxtKdGejala" id="TxtKdGejala">
                            <option value="NULL">[ Daftar Gejala]</option>
                            <?php 
	$sqlp = "SELECT * FROM gejala ORDER BY kd_gejala";
	$qryg = mysqli_query($koneksi, $sqlp) 
		    or die ("SQL Error: ".mysql_error());
	while ($datag=mysql_fetch_array($qryg)) {
		if ($datag['kd_gejala']==$kdgejala) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datag[kd_gejala]' $cek>$datag[kd_gejala]&nbsp;|&nbsp;$datag[gejala]</option>";
	}
  ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Bobot</td>
                    <td>
                        <select name="txtbobot" id="txtbobot">
                            <option value="0">[ Bobot Penyakit ]</option>
                            <option value="5">5 | Gejala Dominan</option>
                            <option value="3">3 | Gejala Sedang</option>
                            <option value="1">1 | Gejala Biasa</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" name="Submit" value="Update">
                        <input type="button" value="Kembali" onclick="window.history.back();">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>