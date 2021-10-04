<?php
include('koneksi\config.php');
session_start();

if(!isset($_SESSION['login'])){
	header("Location:login.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tambah Data</title>
    <!--===============================================================================================-->	
    <link rel="icon" type="image/png" href="../assets/img/ublogo2.png"/>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/stylehal.css">

    <!-- NAVBAR AWAL -->
    <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-primary">
              <div class="container-fluid">
                <a class="navbar-brand" href="#"> <img src="../assets/img/ublogo2.png" alt="">  Universitas Brawijaya</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                  <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index1.php">Tambah</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index2.php">Data</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                  </ul>
                  <form class="d-flex" action="" method="post">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id= "keyword" autocomplete="off">
                    <button class="btn btn-outline-success" type="submit" name="cari" id="tombol-cari">Search</button>
                  </form>
                </div>
              </div>
            </nav>
    </header>
    <!-- NAVBAR AKHIR -->
</head>
<body>
    <!-- Container Awal -->
    <div class="container">
        <h1  class="text-center"> <img src="../assets/img/ublogo.png" alt=""></h1>
        <h1 class="text-center">FORM DATA MAHASISWA</h1>
        <!-- Awal Card Form -->
        <div class="card mt-3">
            <div class="card header bg-primary text-white">
                Form Input Data Mahasiswa
            </div>
            <div class="card-body">
                <form method="POST" action="index2.php">
                    <div class="form-group">
                        <label for="nama"> NAMA </label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="<?=@$vnama?>" required>
                    </div>
                    <div class="form-group">
                            <label for="nim"> NIM </label>
                            <br>
                            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" value="<?=@$vnim?>" required>
                    </div>
                    <div class="form-group">
                            <label for="nohp"> NOMOR HP </label>
                            <br>
                            <input type="tel" name="nohp" class="form-control"  placeholder="Masukkan Nomor HP Aktif" value="<?=@$vnohp?>" required>
                    </div>
                    <div class="form-group">
                            <label for="agama"> AGAMA </label>
                            <br>
                            <select name="agama" id="agama" class="form-control" required>
                            <option value="<?=$vagama?>"><?=@$vagama?></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Kong-hu-chu">Kong-Hu-Chu</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                    </div>
                    <div class="form-group">
                            <label for="alamat"> ALAMAT</label>
                            <br>
                            <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat"  rows="10" required>
                            <?=@$valamat?>
                            </textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                    <button type="reset" class="btn btn-danger" name="reset">Reset</button>
                </form>
            </div>    
        </div>
        <!-- Akhir Card Form -->
    </div>
    <br>
    <br>
    <br>
    <!-- Container Akhir -->
    <!-- FOOTER -->
    <footer class="bg-primary text-center text-lg-start ">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              © 2020 Copyright:
              <a class="text-dark" href="https://getbootstrap.com/">getbootstrap.com</a>
            </div>
            <!-- Copyright -->
    </footer>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>