<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rule & Himpunan Fuzzy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
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

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: auto;
        overflow: hidden;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .form-container {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container select,
    .form-container input {
        padding: 8px;
        margin: 5px 0;
        width: calc(100% - 18px);
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .form-container input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    .form-container input[type="submit"]:hover {
        background-color: #45a049;
    }

    .action-links a {
        margin: 0 5px;
        color: #007bff;
        text-decoration: none;
    }

    .action-links a:hover {
        text-decoration: underline;
    }
    </style>
    <script>
    function konfirmasi(id_bobot) {
        var url_str = "hapus_bobot.php?id_bobot=" + id_bobot;
        var r = confirm("Yakin ingin menghapus data " + id_bobot + "?");
        if (r) {
            window.location = url_str;
        }
    }
    </script>
</head>

<body>
    <div class="container">
        <h2>Rule & Himpunan Fuzzy</h2>
        <hr>
        <div class="form-container">
            <form id="form1" name="form1" method="post" action="relasisim.php" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td colspan="2" style="text-align: center;"><b>SET BOBOT PENYAKIT</b></td>
                    </tr>
                    <tr>
                        <td>Gejala</td>
                        <td>
                            <select name="txtkdgejala" id="txtkdgejala">
                                <option value="NULL">[ Daftar Gejala]</option>
                                <?php
                                    include "../koneksi.php";
                                    $sqlp = "SELECT * FROM gejala ORDER BY kd_gejala";
                                    $qryg = mysqli_query($koneksi, $sqlp) or die("SQL Error: ".mysql_error());
                                    while ($datag = mysqli_fetch_array($qryg)) {
                                        $cek = ($datag['kd_gejala'] == $kdgejala) ? "selected" : "";
                                        $dt = $datag['gejala'];
                                        $tek = substr($dt, 0, 80);
                                        echo "<option value='{$datag['kd_gejala']}' $cek>{$datag['kd_gejala']} | $tek</option>";
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
                        <td>Penyakit</td>
                        <td>
                            <select name="txtkdpenyakit" id="txtkdpenyakit">
                                <option value="NULL">[ Daftar Penyakit ]</option>
                                <?php
                                    $sqlp = "SELECT * FROM penyakit ORDER BY kd_penyakit";
                                    $qryp = mysqli_query($koneksi, $sqlp) or die("SQL Error: ".mysql_error());
                                    while ($datap = mysqli_fetch_array($qryp)) {
                                        $cek = ($datap['kd_penyakit'] == $kdsakit) ? "selected" : "";
                                        echo "<option value='{$datap['kd_penyakit']}' $cek>{$datap['kd_penyakit']} | {$datap['nama_penyakit']}</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" name="Submit" value="Simpan" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penyakit</th>
                    <th>Gejala <span style="float: right; margin-right: 25px;">Bobot</span></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($koneksi, "SELECT bobot.kd_gejala, bobot.kd_penyakit, penyakit.kd_penyakit, penyakit.nama_penyakit AS penyakit FROM bobot, penyakit WHERE bobot.kd_penyakit=penyakit.kd_penyakit GROUP BY bobot.kd_penyakit") or die(mysql_error());
                    $no = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $idpenyakit = $row['kd_penyakit'];
                        $no++;
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['kd_penyakit']; ?> | <strong><?php echo $row['penyakit']; ?></strong></td>
                    <td>
                        <?php
                            $query2 = mysqli_query($koneksi,"SELECT bobot.id_bobot, bobot.kd_gejala, bobot.bobot, bobot.kd_penyakit, gejala.gejala AS namagejala FROM bobot, gejala WHERE bobot.kd_penyakit='$idpenyakit' AND gejala.kd_gejala=bobot.kd_gejala") or die(mysql_error());
                            while ($row2 = mysqli_fetch_array($query2)) {
                                echo "<div style='margin-bottom: 5px; border: 1px solid #ddd; padding: 5px; background: #f9f9f9; border-radius: 4px;'>
                                        <span style='display: inline-block; width: 50px;'>{$row2['kd_gejala']}</span>
                                        <span style='display: inline-block; width: 300px;'>{$row2['namagejala']}</span>
                                        <span style='display: inline-block; width: 50px;'>{$row2['bobot']}</span>
                                        <span class='action-links'>
                                            <a href='haladmin.php?top=edit_bobot.php&id_bobot={$row2['id_bobot']}'>Edit</a>
                                            <a href='javascript:void(0);' onclick='konfirmasi({$row2['id_bobot']})'>Hapus</a>
                                        </span>
                                      </div>";
                            }
                        ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>