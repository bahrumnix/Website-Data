<?php 
// Koneksi ke database
include('koneksi\config.php');

//Fungsi Registrasi----Awal
function registrasi($data){
	global $koneksi;
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($koneksi, $data['password']);
	$konfirmasi = mysqli_real_escape_string($koneksi, $data['konfirmasi']);

	// cek username dan password apakah sudah diisi
	if (empty($username) or empty($password)) {
		echo 
		"<script>
			alert('silahkan masukkan username / password');
		</script>";
	return false;
	}


	//Mengecek apakah username sudah ada
	$result = mysqli_query($koneksi, "SELECT username FROM users  WHERE username ='$username'");
	if (mysqli_fetch_assoc($result)) {
		echo 
		"<script>
			alert('Username sudah pernah dipakai!');
		</script>";
	return false;
	}

	// cek apakah password dan konfirmasi password sama
	if ($password !== $konfirmasi) {
		echo 
		"<script>
			alert('Konfirmasi dan Password berbeda!');
		</script>";
	return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	// menambahkan userbaru ke database
	mysqli_query($koneksi, "INSERT INTO users VALUES('', '$username', '$password')");

	return mysqli_affected_rows($koneksi);

}

// Cek apakah sign up sudah ditekan
if (isset($_POST['register'])) {
	if (registrasi($_POST) > 0) {
		echo 
		"<script>
			alert('user baru berhasil ditambahkan');
		</script>";
	} else {
		echo mysqli_error($koneksi);
	}
}
//Fungsi Registrasi----Akhir
 ?>


<!-- AWAL KODE HTML -->

 <!DOCTYPE html>
 <html lang="en">
 <head>

 <title>Registrasi</title>
 <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

 </head>
 <body>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('images/fotouniv.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<!-- AWAL FORM REGISTRASI -->

				<form class="login100-form validate-form" action="" method="post">
						<span class="login100-form-title p-t-20 p-b-45">
								REGISTRASI
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

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
							<input class="input100" type="password" name="konfirmasi" placeholder="Konfirmasi Password" id="konfirmasi">
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
						<button class="login100-form-btn" type="submit" name="register" >
							Sign Up
						</button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="login.php" class="txt1">
							Sign In
						</a>
					</div>

					</div>
				</form>
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
<!--===============================================================================================-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
 				<!-- AKHIR FORM REGISTRASI -->
 </body>
 </html>
 <!-- AKHIR KODE HTML -->