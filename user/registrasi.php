<?php

require "../vendor.php";
if( isset($_POST["register"]) ) {
	if( register($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan, silahkan login!');
				document.location.href = 'login.php';
			  </script>";
	} else {
		echo mysqli_error($connection);
	}
}

require "header.php";
?>
<main class="conteiner-fluid bg-light">
    <div class="row justify-content-center align-items-center  vw-100 vh-100">
        <div class="col-3 shadow-sm bg-white  p-5 rounded-3">
            <h2 class="fw-bold mb-4">Registrasi</h2>
            <form method="post" action="">
                <div class="mb-3">
                    <label class="form-label" for="username">Nama Pengguna</label>
                    <input class="form-control" type="text" name="username" id="username">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Kata Sandi</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Konfirmasi Kata Sandi</label>
                    <input class="form-control" type="password" name="confpass" id="password">
                </div>
                <button class="btn btn-primary" type="submit" name="register">Daftar</button>
            </form>
            <div class="mt-3 d-block">
                <a href="login.php">Saya sudah punya akun!</a>
            </div>
        </div>
    </div>
    <main>
        <?php "footer.php"?>