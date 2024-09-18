<?php 
// include "../koneksi.php"; // Uncomment this line if you need to include the database connection
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Data Penyakit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    </style>
    <script type="text/javascript">
    function konfirmasi(id_user) {
        var kd_hapus = id_user;
        var url_str = "hapus_user.php?id_user=" + kd_hapus;
        var r = confirm("Yakin ingin menghapus data..? " + kd_hapus);
        if (r == true) {
            window.location = url_str;
        }
    }
    </script>
</head>

<body>
    <div class="container mt-5">
        <h2>Laporan Data Pengguna</h2>
        <hr>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelamin</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Penyakit Yang diderita</th>
                            <th>Tanggal Diagnosa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Query to get the data
                        // $sql = "SELECT hasil.id_hasil, hasil.id_pasien, hasil.kd_penyakit, hasil.tanggal, pasien.id_pasien, pasien.nama, pasien.kelamin, pasien.umur, pasien.alamat, penyakit.kd_penyakit, penyakit.nama_penyakit FROM hasil, pasien, penyakit WHERE hasil.kd_penyakit=penyakit.kd_penyakit";
                        $sql = "SELECT hasil.id_hasil, hasil.id_pasien, hasil.kd_penyakit, hasil.tanggal, pasien.id_pasien, pasien.nama, pasien.kelamin, pasien.umur, pasien.alamat, penyakit.kd_penyakit, penyakit.nama_penyakit 
                                FROM hasil 
                                JOIN pasien ON hasil.id_pasien = pasien.id_pasien
                                JOIN penyakit ON hasil.kd_penyakit = penyakit.kd_penyakit";
                        $qry = mysqli_query($koneksi, $sql) or die ("SQL Error: ".mysql_error());
                        $no = 0;
                        while ($data = mysqli_fetch_array($qry)) {
                            $no++;
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo htmlspecialchars($data['nama']); ?></td>
                            <td><?php echo htmlspecialchars($data['kelamin']); ?></td>
                            <td><?php echo htmlspecialchars($data['umur']); ?></td>
                            <td><?php echo htmlspecialchars($data['alamat']); ?></td>
                            <td><?php echo htmlspecialchars($data['nama_penyakit']); ?> (
                                <?php echo htmlspecialchars($data['kd_penyakit']); ?> )</td>
                            <td>
                                <?php echo htmlspecialchars($data['tanggal']); ?>
                                <a title="hapus pengguna" style="cursor:pointer;"
                                    onclick="return konfirmasi('<?php echo htmlspecialchars($data['id_hasil']); ?>')">
                                    <img src="image/hapus.jpeg" width="16" height="16" alt="Hapus">
                                </a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>