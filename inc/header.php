<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Fuzzy Mata</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="konsultasifm.php">Proses Diagnosa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="informasi.php">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="tentang.php">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="daftar-penyakit.php">Daftar Penyakit</a>
                </li>
            </ul>
            <?php if(isset($_SESSION['username'])) : ?>
                <div class="row text-center px-4">
                    <div class="col-sm-9">
                        <a><span class="l"></span><span class="r"></span><span
                            class="t">Hallo! <?= $_SESSION['username']; ?></span>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="logout.php"><div>logout</div></a>
                    </div>
                    
                </div> 
            <?php else: ?>
                <div class="row text-center">
                    <div class="col-sm-6">
                        <a href="login.php">Login</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="pasien_add_fm.php"><div>register</div></a>
                    </div>
                    
                </div>  
            <?php endif; ?>
            
        </div>
    </div>
</nav>