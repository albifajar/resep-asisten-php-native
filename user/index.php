<?php
session_start();
require "../vendor.php";

$login = [];

if( !isset($_SESSION['login']) ) {
	header("Location: login.php");
	exit;
}else{
  $login = $_SESSION['login'];
  
  $show_alert = $_SESSION['login']['show_alert'];

  $_SESSION['login']['show_alert'] = false;
}

$mahasiswa = query("SELECT * FROM recipe");

require "header.php";
?>	
<style type="text/css">
	input[type=file]::file-selector-button {
	display: none;
}
.dataTables_wrapper .dataTables_filter{
  float: none !important;
}
.dataTables_wrapper .dataTable{
  margin-top: 3rem !important;
}
</style>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <div class="container-fluid">
        <span class="navbar-brand">
        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1.5em" height="1.5em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M33.752 40.645v-6.177a2.131 2.131 0 0 1 .638-1.526c.96-.943 2.891-2.848 4.988-4.971l-.009-.005a9.947 9.947 0 0 0-5.072-17.038a3.408 3.408 0 0 1-2.188-1.387a9.948 9.948 0 0 0-16.218 0a3.408 3.408 0 0 1-2.188 1.387A9.947 9.947 0 0 0 8.63 27.966l-.01.005a473.615 473.615 0 0 0 4.989 4.972a2.131 2.131 0 0 1 .638 1.525v6.177a2 2 0 0 0 2 2h15.504a2 2 0 0 0 2-2Z"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M28.281 42.645V21.242A4.281 4.281 0 0 0 24 16.962h0a4.281 4.281 0 0 0-4.281 4.28v21.403"/></svg>
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="d-flex">
        <a class="btn btn-outline-light btn-sm" href="<?=BASE_URL?>/user/logout.php">Keluar</a>
        </form>
      </div>
    </nav>
    <main class="bg-light p-3 pt-5" style="min-height:100vh">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-11">
            <div class="d-flex gap-2" style="align-items: center;">
              <h1>Resep</h1>
              <a class="btn btn-sm btn-outline-primary" href="create.php" style="display: inline-block;">Tambah</a>
            </div>
          </div>
          <div class="col-11 bg-white px-4 py-5  mt-5">
          <table class="table-style" cellspacing="0" cellpadding="10" style="width: 100%;" id="dataTable">
            <thead>
              <tr>
                  <th width="70px">Gambar</th>
                  <th>Judul</th>
                  <th width="50px"></th>
              </tr>
          </thead>
          <tbody>
          <?php foreach ($mahasiswa as $i=>$mhs):?>
          <tr>
            <td><img width="50px" src="../assets/img/<?= $mhs['thumbnail']?>" alt=""></td>
            <td><a href="update.php?id_ubah=<?= $mhs['id']?>"><?= $mhs['title']?></a></td>
            <td>
              <div class="dropdown">
                <button class="btn" type="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg style="cursor: pointer;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="0.38em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 192 512"><path d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72s-72-32.2-72-72s32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8S24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72s-32.2-72-72-72s-72 32.2-72 72z" fill="currentColor"/></svg>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="update.php?id_ubah=<?= $mhs['id']?>">Ubah</a></li>
                  <li><a class="dropdown-item" href="delete.php?id_hapus=<?= $mhs['id']?>">Hapus</a></li>
                </ul>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
          </tbody>
          </table>
          </div>
        <div>
      </div>
    </main>
<?php
require 'footer.php';
?>