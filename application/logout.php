<?php 
//Memulai session
session_start();

// Hapus session 
$_SESSION = []; 
session_unset();
session_destroy();
// Hapus cookie 
setcookie('info', '', time() - 3600);
setcookie('key', '', time() - 3600);
// Kembali ke halaman login
header("Location:login.php");
exit;
 ?>