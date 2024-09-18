<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="css/common.css" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>

<body class="bg-light">
    <?php  require('inc/header.php') ?>
    <div class="my-5 px-4">
        <h2 class=" fw-bold h-font text-center">Registrasi Pengguna</h2>

        <div class="h-line bg-dark "></div>
            <p class="text-center mt-3">
                Silahkan melakukan registrasi untuk menggunakan aplikasi ini...!
            </p>
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-4">Masukkan Data Anda</h5>
                                <form onSubmit="return validasi(this)" method="post" name="form1"
                                    action="save_registrasi.php">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="TxtNama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="TxtNama" name="TxtNama" maxlength="30">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="cbojk" class="form-label">Jenis Kelamin</label>
                                            <select id="cbojk" name="cbojk" class="form-select">
                                                <option value="0" selected>- Jenis Kelamin -</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Wanita">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="TxtUmur" class="form-label">Umur</label>
                                            <input type="text" class="form-control" id="TxtUmur" name="TxtUmur" maxlength="3">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="TxtAlamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="TxtAlamat" name="TxtAlamat" maxlength="50">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="textemail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="textemail" name="textemail"
                                            maxlength="25">
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary">Daftar</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Include Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
            <script type="text/javascript">
            function validasi(form) {
                if (form.TxtNama.value == "") {
                    alert("Masukkan nama !");
                    form.TxtNama.focus();
                    return false;
                } else if (form.cbojk.value == 0) {
                    alert("Masukkan jenis kelamin !");
                    form.cbojk.focus();
                    return false;
                } else if (form.TxtUmur.value == "") {
                    alert("Masukkan umur anda !");
                    form.TxtUmur.focus();
                    return false;
                } else if (form.TxtAlamat.value == "") {
                    alert("Masukkan alamat anda !");
                    form.TxtAlamat.focus();
                    return false;
                } else if (form.textemail.value == "") {
                    alert("Masukkan email !");
                    form.textemail.focus();
                    return false;
                }
                form.submit();
            }
            </script>


        </div>
        <div class="cleared"></div>
    </div>

    <?php  require('inc/footer.php') ?>

         
</body>

</html>