<?php 
include '../koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];


$sql = "INSERT INTO pengguna VALUES('$nama', $email, '$username','$password', $level)";

if(mysqli_query($koneksi,$sql)){
	$_SESSION['pesan'] = "Berhasil tambah data pengguna";
}else{
	$_SESSION['pesan'] = "Gagal tambah data pengguna";
}
header('location:/smart/smart/index.php?url=data_pengguna');
		



// $sql = "INSERT INTO users (nama, email, username, password, level) VALUES(?,?,?,?,?)";
// $stmtinsert = $koneksi->prepare($sql);
// $result = $stmtinsert->execute([$nama, $email, $username, $password, $level]);

// if($result){
// 	$_SESSION['pesan'] = "Berhasil tambah data pengguna";
// }else{
// 	$_SESSION['pesan'] = "Gagal tambah data pengguna";
// }

// header('location:/smart/smart/index.php?url=data_pengguna');

// $sql = "INSERT INTO pengguna VALUES(NULL,'$nama','$username','$password')";

// if(mysqli_query($koneksi,$sql)){
// 	$_SESSION['pesan'] = "Berhasil tambah data pengguna";
// }else{
// 	$_SESSION['pesan'] = "Gagal tambah data pengguna";
// }
// header('location:/smart/smart/index.php?url=data_pengguna');


 ?>