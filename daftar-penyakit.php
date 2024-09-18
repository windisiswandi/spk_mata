<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuzzy Mata - Informasi Penyakit Mata</title>

    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <style>
    .box {
        border-top-color: var(--teal) !important;
    }

    .h-line {
        height: 2px;
        width: 100%;
        background-color: #000;
    }
    </style>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container my-5">
        <h2 class="fw-bold h-font text-center">Informasi Penyakit Mata</h2>
        <div class="h-line mb-4"></div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="2" class="text-center">Daftar Jenis-jenis Penyakit Pada Mata</th>
                    </tr>
                    <tr>
                        <th>Nama Penyakit</th>
                        <th>Definisi dan Solusi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Database connection using mysqli
                    $mysqli = new mysqli("localhost", "root", "", "pakarmata");

                    // Check connection
                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }

                    $sql = "SELECT * FROM penyakit ORDER BY kd_penyakit";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><h3><em>" . htmlspecialchars($data['nama_penyakit']) . "</em></h3></td>";
                            echo "<td><strong>Definisi Penyakit:</strong> <p>" . htmlspecialchars($data['definisi']) . "</p>";
                            echo "<strong>Solusi:</strong> <p>" . htmlspecialchars($data['solusi']) . "</p></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2' class='text-center'>No data available</td></tr>";
                    }

                    $mysqli->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <!-- Link to Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>