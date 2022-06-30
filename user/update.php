<?php 
session_start();
require "../vendor.php";
if( !isset($_SESSION['login']) ) {
	header("Location: login.php");
	exit;
}
$id = $_GET["id_ubah"];
$recipe = query("SELECT * FROM recipe WHERE id = $id")[0];


if( isset($_POST["submit"]) ) {
	if( ubah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			  </script>";
	} else {
		echo "<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			  </script>";
	}
}
$thumbnail = $recipe['thumbnail'];
if($thumbnail == null){
	$thumbnail = 'upload.png';
}
require 'header.php';
?>
<style type="text/css">
input[type=file]::file-selector-button {
    display: none;
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid  py-2 px-4">
        <a class="navbar-brand" href="<?=BASE_URL?>/user">
            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1.5em" height="1.5em"
                preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48">
                <path fill="#fff" d="m30.9 43l3.1-3.1L18.1 24L34 8.1L30.9 5L12 24z" />
            </svg>
        </a>
    </div>
</nav>
<main class="bg-light p-3 pt-5" style="min-height:100vh">
    <form class="container-fluid" method="post" action="" enctype="multipart/form-data">
        <input class="form-control form-control-lg" type="hidden" placeholder="Judul" name="id"
            value="<?=$recipe['id'] ?>">
        <div class="d-flex gap-2 justify-content-between" style="align-items: center;">
            <h2>Edit Resep</h2>
            <button type="submit" name="submit" class="btn btn-primary fw-bold"><i
                    class="fa-solid fa-floppy-disk me-2"></i>Simpan Perubahan</button>
        </div>
        <div class="row mt-4">

            <div class="col-lg-9 order-lg-0 order-1 mt-lg-0 mt-4">
                <div class="">
                    <input class="form-control form-control-lg" type="text" placeholder="Judul" name="title"
                        value="<?=$recipe['title'] ?>">
                </div>
                <div class="mt-5">
                    <textarea rows="10" class="form-control form-control-lg" name="content">
								<?=$recipe['content'] ?>
							</textarea>
                </div>
            </div>
            <div class="col-lg-3 px-2 order-0 order-lg-1">
                <div class="d-flex justify-content-end align-items-center">
                    <div class="position-relative" style="width: 100%; height: 400px">
                        <img width="100%" height="400px" src="../assets/img/<?=$thumbnail?>" class="img-preview"
                            style="object-fit: cover;" />
                        <input class="form-control form-control-lg position-absolute gambar" type="file"
                            placeholder="Judul" name="thumbnail" onchange="previewImage()"
                            style="height:400px; top:0; color: transparent; background-color: transparent">
                        <input type="hidden" name="thumbnail_old" value="<?=$thumbnail?>">
                    </div>
                </div>
                <div class="text-center">540 x 540 px</div>
            </div>
        </div>
    </form>
</main>
<script>
CKEDITOR.replace('content');
</script>
<?php
require 'footer.php';
?>