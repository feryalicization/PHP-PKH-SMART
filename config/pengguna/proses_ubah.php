<?php  
include '../koneksi.php';

$id = $_GET['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];


$sql = "UPDATE pengguna set username='$username', nama='$nama', password='$password', level='$level' where id='$id'";

if(mysqli_query($koneksi,$sql)){
	$_SESSION['pesan'] = "Berhasil update data pengguna";
}else{
	$_SESSION['pesan'] = "Gagal update data pengguna";
}
header('location:/smart/index.php?url=data_pengguna');


 ?>