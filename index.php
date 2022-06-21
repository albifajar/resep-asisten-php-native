<?php
include "vendor.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Halaman Admin</title>
    <link href="<?= BASE_URL?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL?>/assets/css/jquery.dataTables.min.css"/>
    <script src="<?= BASE_URL?>/assets/js/ckeditor/ckeditor.js"></script>
    <script>
      const BASE_URL = '<?=BASE_URL?>'
    </script>
  </head>
  <body>
	<div class="vh-100 wh-100 d-flex justify-content-center align-items-center" style="background-image: url('<?=BASE_URL?>/assets/img/home_background.jpg'); background-size: cover">
		<div class="w-100">
			<div class="col-12">
				<h1 class="fw-bold text-white text-center">Apa yang ingin anda masak hari ini?</h1>
			</div>
			<div class="d-flex justify-content-center mt-5">
				<div class="col-3">
					<form class="d-flex" method="get" action="search.php">
						<input class="form-control" type="text" name="search">
						<button class="btn btn-primary" type="submit">Search</button>
					</form>
				</div>
			</div>
		</div>
  </div>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	</body>
</html>