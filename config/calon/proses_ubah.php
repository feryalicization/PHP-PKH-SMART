<?php 
include '../koneksi.php';

$id = $_POST['id'];
$keluarga = $_POST['keluarga'];
$nama = $_POST['nama'];
$sub_id = $_POST['sub_id'];
$old_sub_id = $_POST['old_sub_id'];
$new_sub = isset($_POST['new_sub']) ? $_POST['new_sub'] : null;

$sql = "UPDATE calon set keluarga='$keluarga',nama='$nama' where id='$id'";

if(mysqli_query($koneksi,$sql)){
	foreach ($old_sub_id as $key => $value) {
		$value = isset($_POST['value'][$key]) ? $_POST['value'][$key] : 0;

		mysqli_query($koneksi,"UPDATE calon_subkriteria set 
		subkriteria_id='$sub_id[$key]', 
		value=(SELECT bobot FROM subkriteria WHERE id = '$sub_id[$key]' LIMIT 1),
		utility_score = (SELECT (IF(bobot=5,1,IF(bobot=4,0.75,IF(bobot=3,0.5,IF(bobot=2,0.25,0))))) FROM subkriteria WHERE id = '$sub_id[$key]' LIMIT 1) 
		WHERE id=".$old_sub_id[$key]);
	}
	if(isset($new_sub)){
		foreach ($new_sub as $key => $value) {
			$value = isset($_POST['value'][$key]) ? $_POST['value'][$key] : 0;
			mysqli_query($koneksi,"INSERT INTO calon_subkriteria(calon_id, subkriteria_id, `value`, utility_score) 
			SELECT '$id','$sub_id[$key]', bobot, (IF(bobot=5,1,IF(bobot=4,0.75,IF(bobot=3,0.5,IF(bobot=2,0.25,0)))))  FROM subkriteria WHERE id = '$sub_id[$key]' LIMIT 1");
		}
	}

	$_SESSION['pesan'] = "Berhasil tambah data calon";
}else{
	$_SESSION['pesan'] = "Gagal tambah data calon";
}
header('location:/smart/index.php?url=data_calon');

 
 ?>