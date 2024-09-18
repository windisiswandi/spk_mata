<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyakit dan Solusi</title>
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
    }

    .sidebar a:hover {
        color: #ffffff;
        background-color: #495057;
    }

    .sidebar i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
    }

    .card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .card-header {
        background: linear-gradient(135deg, #6c757d 0%, #343a40 100%);
        color: white;
        padding: 15px 20px;
        border-bottom: 1px solid #ddd;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .card-body {
        background: #ffffff;
        padding: auto;
        font-size: 16px;
        line-height: 1.6;
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

    .table thead th {
        background-color: #343a40;
        color: white;
    }

    .table td,
    .table th {
        vertical-align: auto;
    }

    .btn-sm {
        font-size: 0.875rem;
    }
    </style>
</head>

<body>
    <div class="sidebar">
        <h4>Administrator</h4>
        <a href="home.php"><i class="fas fa-home"></i> Home</a>
        <a href="haladmin.php?top=penyakit_solusi.php"><i class="fas fa-diagnoses"></i> Data Penyakit</a>
        <a href="haladmin.php?top=gejala.php"><i class="fas fa-diagnoses"></i> Data Gejala</a>
        <a href="haladmin.php?top=relasi.php"><i class="fas fa-random"></i> Rule & Himpunan Fuzzy</a>
        <a href="haladmin.php?top=lapuser.php"><i class="fas fa-file-alt"></i> Hasil Diagnosa</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    Data Penyakit dan Solusi Penanganannya
                </div>
                <div class="card-body">
                    <form name="form3" method="post" onSubmit="return validasi(this);" action="simpanpenyakit.php">
                        <div class="form-group">
                            <label for="kd_penyakit">Kd Penyakit</label>
                            <input name="kd_penyakit" type="text" id="kd_penyakit" class="form-control" maxlength="4">
                        </div>
                        <div class="form-group">
                            <label for="nama_penyakit">Nama Penyakit</label>
                            <input type="text" name="nama_penyakit" id="nama_penyakit" class="form-control"
                                maxlength="100">
                        </div>
                        <div class="form-group">
                            <label for="definisi">Definisi</label>
                            <textarea name="definisi" id="definisi" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="solusi">Solusi</label>
                            <textarea name="solusi" id="solusi" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Daftar Penyakit
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Penyakit</th>
                                <th>Nama Penyakit</th>
                                <th>Definisi</th>
                                <th>Solusi</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // include "../koneksi.php";
                            $sql = "SELECT * FROM penyakit ORDER BY kd_penyakit";
                            $qry = mysqli_query($koneksi, $sql) or die("SQL Error: " . mysqli_error());
                            $no = 0;
                            while ($data = mysqli_fetch_array($qry)) {
                                $no++;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['kd_penyakit']; ?></td>
                                <td><?php echo $data['nama_penyakit']; ?></td>
                                <td><?php echo substr($data['definisi'], 0, 150) . (strlen($data['definisi']) > 150 ? '...' : ''); ?>
                                </td>
                                <td><?php echo substr($data['solusi'], 0, 150) . (strlen($data['solusi']) > 150 ? '...' : ''); ?>
                                </td>
                                <td>
                                    <a href="edpenyakit.php?kdubah=<?php echo $data['kd_penyakit']; ?>"
                                        class="btn btn-warning btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        onclick="return konfirmasi('<?php echo $data['kd_penyakit']; ?>');"
                                        class="btn btn-danger btn-sm">Hapus</a>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function validasi(form) {
        if (form.kd_penyakit.value == "") {
            alert("Masukkan Kode Penyakit..!");
            form.kd_penyakit.focus();
            return false;
        } else if (form.nama_penyakit.value == "") {
            alert("Masukkan Nama Penyakit..!");
            form.nama_penyakit.focus();
            return false;
        } else if (form.definisi.value == "") {
            alert("Masukkan Definisi Penyakit..!");
            form.definisi.focus();
            return false;
        } else if (form.solusi.value == "") {
            alert("Masukkan Solusi Penyakit..!");
            form.solusi.focus();
            return false;
        }
    }

    function konfirmasi(kd_penyakit) {
        var url_str = "hpspenyakit.php?kdhapus=" + kd_penyakit;
        var r = confirm("Yakin ingin menghapus data..? " + kd_penyakit);
        if (r == true) {
            window.location = url_str;
        }
    }
    </script>
</body>

</html>