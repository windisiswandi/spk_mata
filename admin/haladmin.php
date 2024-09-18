<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }else if($_SESSION['role'] != 'admin') {
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Pakar Mata</title>
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
</head>

<body>
    <div class="sidebar">
        <h4>Administrator</h4>
        <a href="haladmin.php?top=home.php"><i class="fas fa-home"></i> Home</a>
        <a href="haladmin.php?top=penyakit_solusi.php"><i class="fas fa-diagnoses"></i> Data Penyakit</a>
        <a href="haladmin.php?top=gejala.php"><i class="fas fa-diagnoses"></i> Data Gejala</a>
        <a href="haladmin.php?top=relasi.php"><i class="fas fa-random"></i> Rule & Himpunan Fuzzy</a>
        <a href="haladmin.php?top=lapuser.php"><i class="fas fa-file-alt"></i> Hasil Diagnosa</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>

    <div class="content">
        <div class="header">
            <h2>Selamat Datang di Administrator</h2>
        </div>

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <?php
                    include "../koneksi.php";
                    $top = isset($_GET['top']) ? $_GET['top'] : 'home.php';
                    include "$top";
                    ?>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>