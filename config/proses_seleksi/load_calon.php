<?php
include 'config/koneksi.php';


$min= 0;
$max = $_POST['max'];


$h = mysqli_query($koneksi, "SELECT id, keluarga, nama FROM CALON where id between $min and $max");


while ($d = mysqli_fetch_assoc($h)) {
	$ds[] = $d;
}
 

foreach ($ds as $d) {
	$id = $d['id'];
	$query = "SELECT calon.*, 
	kriteria.nama as nama_kriteria, 
	subkriteria.nama as nama_subkriteria, 
	subkriteria.bobot as bobot_subkriteria, 
	calon_subkriteria.value as value_calon_subkriteria,
	calon_subkriteria.utility_score as utility_score_calon_subkriteria,
	calon_subkriteria.id as calon_subkriteria_id 
	FROM calon LEFT join calon_subkriteria on (calon.id=calon_subkriteria.calon_id) LEFT join subkriteria on (subkriteria.id=calon_subkriteria.subkriteria_id) LEFT join kriteria on (kriteria.id=subkriteria.kriteria_id) where calon.id='$id'";
	$hasil = mysqli_query($koneksi, $query);
	while ($data_row = mysqli_fetch_assoc($hasil)) {
		$datas[] = $data_row;
	}

	$data['id'] = $d['id'];
	$data['keluarga'] = $d['keluarga'];
	$data['nama'] = $d['nama'];

	foreach ($datas as $key => $value) {
		$data['kriteria'][$value['nama_kriteria']]['value'] = $value['nama_subkriteria'] != 'input' ? $value['nama_subkriteria'] : $value['value_calon_subkriteria'];
		$data['kriteria'][$value['nama_kriteria']]['bobot'] =$value['value_calon_subkriteria'];
		$data['kriteria'][$value['nama_kriteria']]['utility_score'] =$value['utility_score_calon_subkriteria'];
		$data['kriteria'][$value['nama_kriteria']]['id'] = $value['calon_subkriteria_id'];
	}
	$calon_datas[] = $data;
}
$data_calon = $calon_datas;

unset($datas);
unset($calon_datas);
unset($ds);
