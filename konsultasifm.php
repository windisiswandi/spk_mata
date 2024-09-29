<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM KONSULTASI</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="css/common.css" />
</head>

<body class="bg-light">
    <?php require('inc/header.php') ?>

    <div class="container my-5 px-4">
        <h2 class="fw-bold h-font text-center">FORM KONSULTASI</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Silahkan Pilih Gejala Mata Yang Anda Alami...!</p>

        <?php 
        include "koneksi.php";
        $NOIP = $_SERVER['REMOTE_ADDR'];
        # Periksa apabila sudah ditemukan
        $sql_cekh = "SELECT * FROM tmp_penyakit WHERE id='$NOIP' GROUP BY kd_penyakit";
        $qry_cekh = mysqli_query($koneksi, $sql_cekh);
        $hsl_cekh = mysqli_num_rows($qry_cekh);
        if ($hsl_cekh == 1) {
            $hsl_data = mysqli_fetch_array($qry_cekh);
            $sql_pasien = "SELECT * FROM tmp_pasien WHERE id='$NOIP' order by id";
            $qry_pasien = mysqli_query($koneksi, $sql_pasien);
            $hsl_pasien = mysqli_fetch_array($qry_pasien);
            $sql_in = "INSERT INTO analisa_hasil SET
                      nama='$hsl_pasien[nama]',
                      kelamin='$hsl_pasien[kelamin]',
                      umur='$hsl_pasien[umur]',
                      alamat='$hsl_pasien[alamat]',
                      kd_penyakit='$hsl_data[kd_penyakit]',
                      id='$hsl_pasien[noip]',
                      tanggal='$hsl_pasien[tanggal]'";
            mysqli_query($koneksi, $sql_in);               
            echo "<meta http-equiv='refresh' content='0; url=?top=AnalisaHasil.php'>";
            exit;
        }
        $sqlcek = "SELECT * FROM tmp_analisa WHERE id='$NOIP'";
        $qrycek = mysqli_query($koneksi, $sqlcek);
        $datacek = mysqli_num_rows($qrycek);
        if ($datacek >= 1) {
            // Seandainya tmp kosong
            $sqlg = "SELECT gejala.* FROM gejala,tmp_analisa 
                     WHERE gejala.kd_gejala=tmp_analisa.kd_gejala 
                     AND tmp_analisa.id='$NOIP' 
                     AND NOT tmp_analisa.kd_gejala 
                     IN(SELECT kd_gejala 
                         FROM tmp_gejala WHERE id='$NOIP')
                     ORDER BY gejala.kd_gejala LIMIT 1";
            $qryg = mysqli_query($koneksi, $sqlg) or die ("Gagal $qryg : ".mysqli_error());
            $datag = mysqli_fetch_array($qryg) or die ("Gagal datag : ".mysqli_error());
            $kdgejala = $datag['kd_gejala'];
            $gejala = $datag['gejala'];
            echo " ADA BOS ($sqlg)";    
        } else {
            // Seandainya tmp kosong
            $sqlg = "SELECT * FROM gejala ORDER BY kd_gejala LIMIT 1";
            $qryg = mysqli_query($koneksi, $sqlg);
            $datag = mysqli_fetch_array($qryg);
            $kdgejala = $datag['kd_gejala'];
            $gejala = $datag['gejala'];
        }
        ?>

        <form method="post" action="hasil_diagnosa.php">
            <div class="form-group">
                <div class="row">
                    <?php
                    $kosong_tmp_gejala = mysqli_query($koneksi,"DELETE FROM tmp_gejala");
                    $kosong_tmp_analisa = mysqli_query($koneksi,"DELETE FROM tmp_analisa");
                    $kosong_tmp_penyakit = mysqli_query($koneksi,"DELETE FROM tmp_penyakit");
                    $query = mysqli_query($koneksi,"SELECT * FROM gejala") or die("Query Error..!" . mysqli_error());
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="gejala[]"
                                id="gejala<?php echo $row['kd_gejala'];?>" value="<?php echo $row['kd_gejala'];?>">
                            <label class="form-check-label" for="gejala<?php echo $row['kd_gejala'];?>">
                                <?php echo $row['gejala'];?>
                            </label>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group text-right mt-3">
                <button type="submit" name="Submit" class="btn btn-primary">Proses Diagnosa</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>

    <?php require('inc/footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>