<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Gejala-gejala</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
    }

    form {
        width: 50%;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
    }

    th,
    td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    input[type="text"],
    textarea {
        width: calc(100% - 10px);
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"],
    input[type="reset"] {
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin: 5px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
    }

    input[type="reset"] {
        background-color: #f44336;
        color: white;
    }

    a {
        text-decoration: none;
    }

    img {
        vertical-align: middle;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
    }

    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background: linear-gradient(180deg, #343a40, #495057);
        color: white;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        overflow-y: auto;
    }

    .sidebar h4 {
        margin-bottom: 20px;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .sidebar a {
        color: #adb5bd;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 10px;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
        margin-bottom: 10px;
        /* Add spacing between links */
    }

    .sidebar a:hover {
        color: #ffffff;
        background-color: #495057;
    }

    .sidebar i {
        margin-right: 10px;
        font-size: 1.2rem;
        /* Ensure icon size consistency */
    }

    .content {
        margin-left: 250px;
        padding: 20px;
    }

    .header {
        background-color: #343a40;
        color: white;
        padding: 15px 20px;
        border-radius: 8px 8px 0 0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-header {
        background: linear-gradient(135deg, #6c757d 0%, #343a40 100%);
        color: white;
        padding: 15px 20px;
        border-bottom: 1px solid #ddd;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }

    .card-body {
        background: #ffffff;
        padding: 20px;
        font-size: 16px;
        line-height: 1.6;
    }

    .card-body p {
        margin: 0;
    }
    </style>
    <script type="text/javascript">
    function validasi(form) {
        if (form.kd_gejala.value == "") {
            alert("Masukkan kode gejala..!");
            form.kd_gejala.focus();
            return false;
        } else if (form.gejala.value == "") {
            alert("Masukkan gejala..!");
            form.gejala.focus();
            return false;
        }
        form.submit();
    }

    function konfirmasi(kd_gejala) {
        var url_str = "hpsgejala.php?kdhapus=" + kd_gejala;
        var r = confirm("Yakin ingin menghapus data..? " + kd_gejala);
        if (r) {
            window.location = url_str;
        }
    }
    </script>
</head>

<body>
    <h2>Data Gejala-gejala</h2>

    <form name="form3" onsubmit="return validasi(this);" method="post" action="simpangejala.php">
        <div>
            <label for="kd_gejala">Kd gejala:</label>
            <input name="kd_gejala" type="text" id="kd_gejala" size="4" maxlength="4">
        </div>
        <div>
            <label for="gejala">Gejala:</label>
            <textarea name="gejala" id="gejala" rows="4"></textarea>
        </div>
        <div>
            <input name="simpan" type="submit" id="simpan" value="Simpan">
            <input type="reset" name="reset" value="Reset">
        </div>
    </form>

    <table>
        <thead>
            <tr>
                <th>Kode Gejala</th>
                <th>Gejala</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php
        // include("inc.connect/connect.php");
        include "../koneksi.php";
        $sql = "SELECT * FROM gejala ORDER BY kd_gejala";
        $qry = mysqli_query($koneksi, $sql) or die("SQL Error: " . mysql_error());
        while ($data = mysqli_fetch_array($qry)) {
        ?>
            <tr>
                <td><?php echo htmlspecialchars($data['kd_gejala']); ?></td>
                <td><?php echo htmlspecialchars($data['gejala']); ?></td>
                <td><a title="Edit Gejala" href="edgejala.php?kdubah=<?php echo urlencode($data['kd_gejala']); ?>"><img
                            src="image/edit.jpeg" width="16" height="16" alt="Edit"></a></td>
                <td><a title="Hapus Gejala" href="#"
                        onclick="return konfirmasi('<?php echo urlencode($data['kd_gejala']); ?>');"><img
                            src="image/hapus.jpeg" width="16" height="16" alt="Hapus"></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>