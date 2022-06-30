<?php
require "vendor.php";
$data = [];
$search = "";
if(isset($_GET['search'])){
  $search = $_GET['search'];
  
  $query = "SELECT * FROM recipe WHERE 
    `title` LIKE '%$search%' OR 
    `name` LIKE '%$search%' OR 
    `content` LIKE '%$search%'";
  
  $data = query($query);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Halaman Admin</title>
    <link href="<?= BASE_URL?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <script>
      const BASE_URL = '<?=BASE_URL?>'
    </script>
  </head>
  <body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
      <div class="container-fluid">
      <a class="navbar-brand" href="<?=BASE_URL?>">
        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><path fill="current" d="m30.9 43l3.1-3.1L18.1 24L34 8.1L30.9 5L12 24z"/></svg>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      </div>
    </nav>
		<main class="container py-5 mt-5">
      <div class="row">
      <?php foreach ($data as $row):?>
      <div class="col-md-4 mt-4">
        <div class="card" style="width: 400px;">
          <img src="assets/img/<?=$row['thumbnail']?>" class="card-img-top" style="width: 100%; height: 400px; object-fit:cover">
          <div class="card-body py-2" style="bottom: 0; left:0; right: 0;">
            <a href="<?=$row['thumbnail']?>" class="text-dark" style="text-decoration: none"><h5 class="card-title fw-bold"><?=html_entity_decode($row['title'])?></h5></a>
            <?=html_entity_decode($row['content'])?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      </div>
		</main>
</body>
</html>