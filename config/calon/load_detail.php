<?php 
include 'config/koneksi.php';

$id = $_GET['id'];

$query = "SELECT calon.*, kriteria.nama as nama_kriteria, subkriteria.nama as nama_subkriteria, subkriteria.bobot as bobot_subkriteria, calon_subkriteria.value as value_calon_subkriteria, calon_subkriteria.id as calon_subkriteria_id FROM calon LEFT join calon_subkriteria on (calon.id=calon_subkriteria.calon_id) LEFT join subkriteria on (subkriteria.id=calon_subkriteria.subkriteria_id) LEFT join kriteria on (kriteria.id=subkriteria.kriteria_id) where calon.id='$id'";
$hasil = mysqli_query($koneksi, $query);
while ($data_row = mysqli_fetch_assoc($hasil)) {
	$datas[] = $data_row;
}
 
$data['id'] = $datas[0]['id'];
$data['keluarga'] = $datas[0]['keluarga'];
$data['nama'] = $datas[0]['nama'];

foreach ($datas as $key => $value) {
	$data['kriteria'][$value['nama_kriteria']]['value'] = $value['nama_subkriteria']!= 'input' ? $value['nama_subkriteria'] : $value['value_calon_subkriteria'] ;

	$data['kriteria'][$value['nama_kriteria']]['id'] = $value['calon_subkriteria_id'];

}
$data_calon = $data;
unset($data);
unset($datas);
// echo json_encode(count($datas));
 ?>