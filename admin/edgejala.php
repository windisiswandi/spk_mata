<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Data Gejala</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../Image/icon.png">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        width: 60%;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td,
    th {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
    }

    input[type="text"],
    textarea {
        width: calc(100% - 22px);
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    input[type="submit"],
    input[type="button"] {
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        color: #fff;
        margin: 5px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
    }

    input[type="button"] {
        background-color: #f44336;
    }

    a {
        text-decoration: none;
    }

    .form-group {
        margin-bottom: 15px;
    }
    </style>
    <script>
    function validasi(form) {
        if (form.gejala.value.trim() === "") {
            alert("Masukkan Gejala..!");
            form.gejala.focus();
            return false;
        }
        return true;
    }
    </script>
</head>

<body>

    <div class="container">
        <h2>Edit Gejala</h2>

        <?php
    include "../koneksi.php";
    $kdubah = $_REQUEST['kdubah'];
    if ($kdubah !== "") {
        $sql = "SELECT * FROM gejala WHERE kd_gejala='$kdubah'";
        $qry = mysqli_query($koneksi, $sql) or die("SQL ERROR: " . mysql_error());
        $data = mysql_fetch_array($qry);
        
        $kd_gejala = htmlspecialchars($data['kd_gejala']);
        $gejala = htmlspecialchars($data['gejala']);
    }
    ?>

        <form id="form1" name="form1" onsubmit="return validasi(this);" method="post" action="edsimgejala.php">
            <div class="form-group">
                <label for="kd_gejala">Kode Gejala</label>
                <input name="kd_gejala" type="text" id="kd_gejala" value="<?php echo $kd_gejala; ?>" disabled>
                <input name="kd_gejala2" type="hidden" id="kd_gejala2" value="<?php echo $kd_gejala; ?>">
            </div>
            <div class="form-group">
                <label for="gejala">Gejala</label>
                <textarea name="gejala" id="gejala" rows="5"><?php echo $gejala; ?></textarea>
            </div>
            <div class="form-group">
                <a href="haladmin.php?top=gejala.php">
                    <input type="submit" name="simpan" id="simpan" value="Update">
                </a>

                <a href="haladmin.php?top=gejala.php">
                    <input type="button" name="batal" id="batal" value="Batal">
                </a>
            </div>
        </form>
    </div>

</body>

</html>