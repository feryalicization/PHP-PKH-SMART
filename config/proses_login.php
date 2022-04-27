<?php 
 
// include('koneksi.php'); 

// // session_start();

// $koneksi = mysqli_connect('localhost','root','','smart');
// if ($koneksi===false)
// {
// 	die("connecttion error");

// }

// if($_SERVER["REQUEST_METHOD"]=="POST")
// {
// 	$username=$_POST["username"];
// 	$password=$_POST["password"];

// 	$sql = "select * from smart where username='".$username."' AND password='".$password."'";

// 	$result=mysqli_query($koneksi, $sql);

// 	$row=mysqli_fetch_array($result);

// 	if($row["level"]=="superadmin")
// 	{
// 		echo "admin";
// 	}
// 	elseif($row["level"]=="pustakawan")
// 	{
// 		echo "pustakawan";
// 	}
// 	else
// 	{
// 		echo "username or password incorrect";
// 	}


	

// }








include('koneksi.php'); 

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM pengguna where username ='$username' AND password='$password'";

$hasil = mysqli_query($koneksi, $query);

if(mysqli_num_rows($hasil)>0){
	$data = mysqli_fetch_assoc($hasil);
	$_SESSION['login'] = true;
	$_SESSION['id'] = $data['id'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['password'] = $data['password'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['level'] = $data['level'];

	$_SESSION['pesan'] = "Selamat Datang ".$data['nama'];
	header('location:../index.php?url=dashboard');
	// // var_dump($data);

if($data["level"]=="superadmin")
{
	$_SESSION["username"]=$username;
	header("location:../index.php?url=dashboard");
}
elseif($data["level"]=="pustakawan")
{
	$_SESSION["username"]=$username;
	header("location:../index.php?url=dashboard");
}

}else{
	header('location:../login.php');
	$_SESSION['pesan'] = "Username dan Password yang anda masukkan salah";
}

 ?>