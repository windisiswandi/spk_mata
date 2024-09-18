<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuzzy Mata - Hasil Diagnosa</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="css/common.css" />
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container my-5 px-4">
        <h2 class="fw-bold h-font text-center">Hasil Diagnosa</h2>
        <div class="h-line bg-dark"></div>

        <?php
        include "koneksi.php";
        // kosongkan tabel tmp_penyakit
        $kosong_tmp_penyakit = mysqli_query($koneksi, "DELETE FROM tmp_penyakit");
        echo "<hr>";

        $sqlpenyakit = "SELECT * FROM bobot GROUP BY kd_penyakit";
        $querypenyakit = mysqli_query($koneksi, $sqlpenyakit);
        $Similarity = 0;

        echo "<div style='display:none;'>";
        while ($rowpenyakit = mysqli_fetch_array($querypenyakit)) {
            $kd_pen = $rowpenyakit['kd_penyakit'];
            $query_gejala = mysqli_query($koneksi, "SELECT * FROM bobot WHERE kd_penyakit='$kd_pen'");
            $var1 = 0;
            $var2 = 0;
            $querySUM = mysqli_query($koneksi, "SELECT sum(bobot) AS jumlahbobot FROM bobot WHERE kd_penyakit='$kd_pen'");
            $resSUM = mysqli_fetch_array($querySUM);
            $SUMbobot = $resSUM['jumlahbobot'];
            while ($row_gejala = mysqli_fetch_array($query_gejala)) {
                $kode_gejala_bobot = $row_gejala['kd_gejala'];
                $bobotbobot = $row_gejala['bobot'];
                $query_tmp_gejala = mysqli_query($koneksi, "SELECT * FROM tmp_gejala WHERE kd_gejala='$kode_gejala_bobot'");
                $row_tmp_gejala = mysqli_fetch_array($query_tmp_gejala);
                $adadata = mysqli_num_rows($query_tmp_gejala);
                if ($adadata !== 0) {
                    $bobotNilai = $bobotbobot * 1;
                    $var1 += $bobotNilai / $SUMbobot;
                } else {
                    $bobotNilai = $bobotbobot * 0;
                    $var2 += $bobotNilai;
                }
                $Nilai_tmp_gejala = $var1 + $var2;
                $Nilai_bawah = $Nilai_bawah + $bobotbobot;
                $Nilai_Pembilang = $Nilai_tmp_gejala;
                $Nilai_Penyebut = $Nilai_bawah;
                $Similarity = $Nilai_Pembilang / $Nilai_Penyebut;
            }
            mysqli_query($koneksi, "INSERT INTO tmp_penyakit(kd_penyakit, nilai) VALUES ('$kd_pen', '$var1')");
            $nilaiMin = mysqli_query($koneksi, "SELECT kd_penyakit, MAX(nilai) AS NilaiAkhir FROM tmp_penyakit GROUP BY nilai ORDER BY nilai DESC");
            $rowMin = mysqli_fetch_array($nilaiMin);
            $rendah = $rowMin['NilaiAkhir'];
            $penyakitakhir = $rowMin['kd_penyakit'];
            echo "<input type='hidden' value='$rowMin[kd_penyakit]'>";
            $sql_pilih_penyakit = mysqli_query($koneksi, "SELECT * FROM penyakit WHERE kd_penyakit='$penyakitakhir'");
            $row_hasil = mysqli_fetch_array($sql_pilih_penyakit);
            $kd_penyakit = $row_hasil['kd_penyakit'];
            $penyakit = $row_hasil['nama_penyakit'];
            $keterangan_penyakit = $row_hasil['definisi'];
            $solusi = $row_hasil['solusi'];
        }
        echo "</div>";
        ?>

        <div class="my-4">
            <h4>Identitas Pasien:</h4>
            <?php
            include "koneksi.php";
            $query_pasien = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id_pasien DESC");
            $data_pasien = mysqli_fetch_array($query_pasien);
            ?>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $data_pasien['nama']; ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?php echo $data_pasien['kelamin']; ?></td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td><?php echo $data_pasien['umur']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $data_pasien['alamat']; ?></td>
                    </tr>
                </tbody>
            </table>

            <h4>Gejala yang diinputkan:</h4>
            <?php
            $query_gejala_input = mysqli_query($koneksi, "SELECT gejala.gejala AS namagejala, tmp_gejala.kd_gejala FROM gejala, tmp_gejala WHERE tmp_gejala.kd_gejala=gejala.kd_gejala");
            $nogejala = 0;
            echo "<ul>";
            while ($row_gejala_input = mysqli_fetch_array($query_gejala_input)) {
                $nogejala++;
                echo "<li>$nogejala. " . $row_gejala_input['namagejala'] . "</li>";
            }
            echo "</ul>";
            ?>

            <?php
            $query_nilai = mysqli_query($koneksi, "SELECT SUM(nilai) as nilaiSum FROM tmp_penyakit");
            $rowSUM = mysqli_fetch_array($query_nilai);
            $nilaiTotal = $rowSUM['nilaiSum'];
            $query_sum_tmp = mysqli_query($koneksi, "SELECT * FROM tmp_penyakit WHERE NOT nilai='0' ORDER BY nilai DESC");
            while ($row_sumtmp = mysqli_fetch_array($query_sum_tmp)) {
                $nilai = $row_sumtmp['nilai'];
                $nilai_persen = $nilai / $nilaiTotal * 100;
                $persen = number_format($nilai_persen, 2);
                $kd_pen2 = $row_sumtmp['kd_penyakit'];
                $query_penyasol = mysqli_query($koneksi, "SELECT * FROM penyakit WHERE kd_penyakit='$kd_pen2'");
                while ($row_penyasol = mysqli_fetch_array($query_penyasol)) {
                    if ($persen >= 70) {
                        echo "<div class='alert alert-success'>";
                        echo "<h5>Pasien Menderita Penyakit: " . $row_penyasol['nama_penyakit'] . "</h5>";
                        echo "<p>" . $row_penyasol['definisi'] . "</p>";
                        echo "<p><strong>Solusi Pengobatan:</strong> " . $row_penyasol['solusi'] . "</p>";
                        echo "</div>";
                        $query_temp = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id_pasien DESC") or die(mysqli_error());
                        $row_pasien = mysqli_fetch_array($query_temp) or die(mysqli_error());
                        $id_pasien = $row_pasien['id_pasien'];
                        $tanggal = $row_pasien['tanggal'];
                        $query_hasil = "INSERT INTO hasil(id_pasien, kd_penyakit, tanggal) VALUES ('$id_pasien', '$kd_pen2', '$tanggal')";
                        mysqli_query($query_hasil) or die(mysqli_error());
                    } else {
                        echo "<div class='alert alert-warning'>";
                        echo "<h5>Pasien Menderita Penyakit: " . $row_penyasol['nama_penyakit'] . " Sebesar " . $persen . "%</h5>";
                        echo "<p>" . $row_penyasol['definisi'] . "</p>";
                        echo "<p><strong>Solusi Pengobatan:</strong> " . $row_penyasol['solusi'] . "</p>";
                        echo "</div>";
                        $query_temp = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id_pasien DESC") or die(mysqli_error());
                        $row_pasien = mysqli_fetch_array($query_temp) or die(mysqli_error());
                        $id_pasien = $row_pasien['id_pasien'];
                        $tanggal = $row_pasien['tanggal'];
                        $query_hasil2 = "INSERT INTO hasil(id_pasien, kd_penyakit, tanggal) VALUES ('$id_pasien', '$kd_pen2', '$tanggal')";
                        mysqli_query($koneksi, $query_hasil2) or die(mysqli_error());
                    }
                }
            }
            ?>
        </div>
        <a class="btn btn-primary" href="proses-diagnosa.php?top=konsultasifm.php"><strong>Ulangi Diagnosa</strong></a>
    </div>
    <?php require ('inc/footer.php'); ?>
    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>

</html>