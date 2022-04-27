<?php
include '../koneksi.php';
session_start();

$keluarga = $_POST['keluarga'];
$nama = $_POST['nama'];
$sub_id = $_POST['sub_id'];
$submit_by = $_SESSION['id'];

$sql = "INSERT INTO calon VALUES(NULL,'$keluarga','$nama','$submit_by')";

$result = mysqli_query($koneksi, $sql);
if ($result) {
	$calon_id = $koneksi->insert_id;

	foreach ($sub_id as $key => $value) {
		mysqli_query($koneksi, "INSERT INTO 
		calon_subkriteria(calon_id, subkriteria_id, `value`, utility_score) 
		SELECT '$calon_id','$sub_id[$key]', bobot, (IF(bobot=5,1,IF(bobot=4,0.75,IF(bobot=3,0.5,IF(bobot=2,0.25,0))))) FROM subkriteria WHERE id = '$sub_id[$key]' LIMIT 1");
	}

	$_SESSION['pesan'] = "Berhasil tambah data calon";
} else {
	var_dump($result);
	die;
	$_SESSION['pesan'] = "Gagal tambah data calon";
}
header('location:/smart/index.php?url=data_calon');
