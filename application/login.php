<?php 
//Memulai Session
session_start();

// Masuk ke database 
include('koneksi\config.php');

// Cek Cookie
if (isset($_COOKIE['info']) && isset($_COOKIE['key'])){
	$id = $_COOKIE['info'];
	$key = $_COOKIE['username'];
	// Ambil username dari database berdasarkan id
	$result = mysqli_query($koneksi, "SELECT username FROM users WHERE id = $id");
	// Username berbentuk array associative
	$row = mysqli_fetch_assoc($result);
	// jika cookie username masukan yang sudah diacak sama dengan username dari database setelah di enkripsi, maka buat session (bernama login) 
	if ($key === hash('sha224', $row['username']) ){
		$_SESSION['login'] = true;
	}

}

// Jika session login sudah true, maka arahkan ke halaman index2.php
if (isset($_SESSION["login"])) {
	header("Location:index2.php");
	exit;

}

//Menangkap username dan password setelah tombol sign ditekan
//menggunakan metode POST
if (isset($_POST["login"])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Mencari username apakah ada di database users
	$result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

	//Jika username ada kembalikan nilai 1
	if (mysqli_num_rows($result) === 1) {

		// Ambil semua data user di database
		$row = mysqli_fetch_assoc($result);

		// Cek apakah password sama dengan di database, jika iya buat session login bernilai true
		if (password_verify($password, $row["password"])){
			$_SESSION['login'] = true;

			// Jika cek box ditekan, buat set cookie
			if (isset($_POST['remember'])){
				//buat cookie berdasarkan 
				setcookie('info', $row['id']);
				setcookie('key', hash('sha224', $row['username']));
			}
			header("Location: index2.php");
			exit;
		}
	}
	$error = true;
}
?>


<!-- AWAL KODE HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<title>Login</title>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../assets/img/ublogo2.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<!-- AWAL FORM LOGIN -->
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/fotouniv.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form" action="" method="post">
						<span class="login100-form-title p-t-20 p-b-45">
							Please Sign In
							</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username" id="username" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
							<input class="input100" type="password" name="password" placeholder="Password" id="password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock"></i>
							</span>
						</div>
					<div class="mb-3 form-check">
								<input type="checkbox" name="remember" class="form-check-input" id="remember">
								<label class="form-check-label" for="remember">Remember Me</label>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit" name="login">
							Sign In
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230" >
						<a href="registrasi.php" class="txt1"  name="register">
							Sign Up
						</a>
					</div>

					</div>
				</form>
				<!-- ALERT PENGECEKAN APAKAH PASSWORD ADA ATAU TIDAK -->
				<?php if (isset($error)) :
					echo "<script>
						    alert('Username/Password yang dimasukkan salah!');
				 		 </script>";
				endif; ?>
			</div>
		</div>
	</div>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<!-- AKHIR FORM LOGIN -->
</body>
</html>
<!-- AKHIR KODE HTML -->