<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simpan Data Penyakit</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../Image/icon.png">
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
    }

    .container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 80%;
        max-width: 500px;
    }

    .success {
        color: #4CAF50;
        font-size: 18px;
    }

    .error {
        color: #f44336;
        font-size: 18px;
    }

    a {
        color: #2196F3;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="container">
        <?php
    include "../koneksi.php";
    $kd_gejala = $_REQUEST['kd_gejala2'];
    $gejala = $_REQUEST['gejala'];

    // Escape special characters to prevent SQL injection
    $kd_gejala = mysqli_real_escape_string($koneksi, $kd_gejala);
    $gejala = mysqli_real_escape_string($koneksi, $gejala);

    $sql = "UPDATE gejala SET gejala='$gejala' WHERE kd_gejala='$kd_gejala'";
    $result = mysqli_query($koneksi, $sql) or die ("SQL Error: " . mysql_error());

    if ($result) {
        echo "<p class='success'>Data Telah Berhasil Diubah</p>";
        echo "<p><a href='haladmin.php?top=gejala.php'>OK</a></p>";
    } else {
        echo "<p class='error'>Data tidak dapat di Update..!</p>";
        echo "<p><a href='../admin/haladmin.php?top=gejala.php'>Kembali</a></p>";
    }
    ?>
    </div>
</body>

</html>