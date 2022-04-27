<?php

$ranking = [];
$hasil = [];
$j = 0;

$result = [];
foreach ($data_calon as $key => $calon) {
	$total_persen = 0;
	$kriteria = $calon['kriteria'];
	foreach ($data_kriteria['data'] as $nama => $dk) {
		$total_persen += ($dk['bobot'] * $kriteria[$nama]['utility_score']);
	}
	$result[$calon['nama']] = $total_persen * 100;
}
arsort($result);
$hasil = [];
foreach ($result as $nama => $persen) {
	$hasil[] = array(
		"nama" => $nama,
		"persen" => $persen,
	);
}

unset($result);
unset($data_calon);
unset($data_kriteria);
