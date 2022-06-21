<?php
session_start();
require "../vendor.php";


// jika tombol login ditekan
if( isset($_POST['login']) ) {

	// cek login
	// cek usernamenya dulu
	global $connection;
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cek_username = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");

	if( mysqli_num_rows($cek_username) === 1 ) {
		$row = mysqli_fetch_assoc($cek_username);
		// cek password
		if( password_verify($password, $row['password']) ) {
			$_SESSION['login'] = $_POST;
            $_SESSION['login']['show_alert'] = true;
			header('Location: index.php');
			exit;
		}
	}
	
	$error = true;

}
require "header.php";
?>
	<main class="conteiner-fluid bg-light">
		<div class="row justify-content-center align-items-center  vw-100 vh-100">
			<div class="col-3 shadow-sm bg-white pt-2 pb-5 px-4">
				<h2 class="fw-bold my-4">Login</h2>
				<?if(isset($error)):?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Username/password</strong> yang dimasukan salah!
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php endif?>
				<form method="post" action="">
					<div class="mb-3">
						<label class="form-label" for="username">Nama Pengguna</label>
						<input class="form-control" type="text" name="username" id="username">
					</div>
					<div class="mb-3">
						<label class="form-label" for="password">Kata Sandi</label>
						<input class="form-control" type="password" name="password" id="password">
					</div>
					<button class="btn btn-primary" type="submit" name="login" class="green">Masuk</button>
				</form>
				<div class="mt-3 d-block">
				<a href="registrasi.php">Belum punya akun?</a>
				</div>
			</div>
		</div>
	<main>
<?php require "footer.php"?>
