<?php
include "vendor.php";

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Depan</title>
    <link href="<?= BASE_URL?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL?>/assets/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL?>/assets/css/font.css"/>
    <script src="<?= BASE_URL?>/assets/js/ckeditor/ckeditor.js"></script>
    <script>
      const BASE_URL = '<?=BASE_URL?>'
    </script>

	<style>
      a:hover{
        color: blue!important;
      }
      .bg-black-transparent{
        position: relative;
      }
      .bg-black-transparent:before{
        content: '';
        position: absolute;
        background: rgba(255, 255, 255, .9);
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100vw;
        height: 100vh;
        display: block;
      }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
      <div class="container-fluid">
        <span class="navbar-brand">
        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M33.752 40.645v-6.177a2.131 2.131 0 0 1 .638-1.526c.96-.943 2.891-2.848 4.988-4.971l-.009-.005a9.947 9.947 0 0 0-5.072-17.038a3.408 3.408 0 0 1-2.188-1.387a9.948 9.948 0 0 0-16.218 0a3.408 3.408 0 0 1-2.188 1.387A9.947 9.947 0 0 0 8.63 27.966l-.01.005a473.615 473.615 0 0 0 4.989 4.972a2.131 2.131 0 0 1 .638 1.525v6.177a2 2 0 0 0 2 2h15.504a2 2 0 0 0 2-2Z"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M28.281 42.645V21.242A4.281 4.281 0 0 0 24 16.962h0a4.281 4.281 0 0 0-4.281 4.28v21.403"/></svg>
        </span>
        <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="d-flex gap-2">
        <a class="btn btn-primary btn-sm" href="<?=BASE_URL?>/user/registrasi.php">Daftar</a>
        <a class="btn btn-sm" href="<?=BASE_URL?>/user/login.php">Masuk</a>
        </form>
      </div>
    </nav>
	<div class="vh-100 wh-100 d-flex justify-content-center align-items-center bg-black-transparent px-4" style="background-image: url('<?=BASE_URL?>/assets/img/home_background.jpg'); background-size: cover">
		<div class="w-100 position-relative">
			<div class="col-12">
				<h1 class="fw-bold text-dark text-center">Apa yang ingin anda masak hari ini?</h1>
			</div>
			<div class="d-flex justify-content-center mt-5">
				<div class="col-lg-4 col-12">
            <form class="d-flex" method="get" action="search.php">
              <input class="form-control form-control-lg" type="text" name="search" style="border-radius: 9999px 0px 0px 9999px;" value="ayam">
              <button class="btn btn-primary btn-lg" type="submit" style="border-radius: 0px 9999px 9999px 0px;">Cari</button>
            </form>
          </div>
        </div>
        <div class="text-center mt-4">
        <span>atau <a class="text-dark" href="<?=BASE_URL?>/user/registrasi.php" style="">anda ingin membagikan resep makanan lezat anda? </a></span>
        </div>        
      </div>
		</div>
  </div>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	</body>
</html>