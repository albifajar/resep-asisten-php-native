<?php
require "config.php";
function query($query){
    global $connection;
    $result = mysqli_query($connection, $query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $connection;

    $title = htmlspecialchars($data['title']);
    $name = createSlug($data['title']);
    $content = htmlspecialchars($data['content']);
    $thumbnail = upload();
   
    $query = "INSERT INTO `recipe`(`title`, `name`, `content`, `thumbnail`) VALUES ('$title', '$name', '$content', '$thumbnail')";
    
    $result = mysqli_query($connection, $query);
        
    return mysqli_affected_rows($connection);
}

function ubah($data) {
	global $connection;

	$id = $data["id"];
    $title = htmlspecialchars($data['title']);
    $name = createSlug($data['title']);
    $content = htmlspecialchars($data['content']);
    $thumbnail = empty($data["thumbnail_old"])?null:htmlspecialchars($data["thumbnail_old"]);

    if($_FILES["thumbnail"]["error"] !== 4){
        $thumbnail = upload();
    }

	$query = "UPDATE `recipe` SET `title` = '$title', `name` = '$name', `content` = '$content', `thumbnail` = '$thumbnail' WHERE id = $id";
    // var_dump($query);die;
	mysqli_query($connection, $query);

	return mysqli_affected_rows($connection);
}


function hapus($id){
    global $connection;
    $mhs = query("SELECT * FROM `recipe` WHERE id = $id")[0];

    if($mhs['thumbnail'] !== 'nophoto.jpg'){
        unlink("../assets/img/".$mhs['thumbnail']);
    }
    
    mysqli_query($connection, "DELETE FROM `recipe` WHERE id = '$id'");    
    
    return mysqli_affected_rows($connection);
}


function upload(){
	// ambil data gambar
	$name = $_FILES["thumbnail"]["name"];
	$tmp_name = $_FILES["thumbnail"]["tmp_name"];
	$size = $_FILES["thumbnail"]["size"];
	$type = $_FILES["thumbnail"]["type"];
	$error = $_FILES["thumbnail"]["error"]; 

    // jika user tidak pilih gambar
	if( $error == 4 ) {
		return null;
	}

    //cek format yang didukung
    $ekstenstionValid = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $ektension = explode('.', $name);
    $ektension = strtolower(end($ektension));

    if(!in_array($ektension, $ekstenstionValid)){
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;        
    }

    //cek jika ukuran nya besar
    if($size>1000000){
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;        
    }
    $new_name = uniqid();
    $new_name .= '.';
    $new_name .= $ektension;

    move_uploaded_file($tmp_name, '../assets/img/'.$new_name);

    return $new_name;
}

function register($data){
    global $connection;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($connection, $data['password']);
    $confpass = mysqli_real_escape_string($connection, $data['confpass']);


    $result = mysqli_query($connection,
        "SELECT username FROM user WHERE username = '$username'"
    );
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username yang anda masukan tidak tersedia, silahkan menggunakan username lain');
            </script>";
        return false; 
    }

    if($password !== $confpass){
        echo "<script>
                alert('konfirmasi yang anda masukan salah!');
            </script>";
        return false;    
    }

    $password =  password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($connection, 
        "INSERT INTO `user`(`username`, `password`) VALUES ('$username', '$password')"
    );

    return mysqli_affected_rows($connection);
}
function createSlug($str, $delimiter = '-'){

    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;

} 