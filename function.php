<?php

function getKritriaID($no_urut) {
	include('koneksi.php');
	$query  = "SELECT id FROM kriteria ORDER BY id";
	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id'];
	}

	return $listID[($no_urut)];
}


function inputNilaiAlternatif($id_alternatif,$id_kriteria,$value){
	include ('koneksi.php');
	$a = mysqli_query($conn, "SELECT * FROM nilai_alt WHERE id_alternatif = $id_alternatif AND id_kriteria = $id_kriteria");

	if (!$a) {
		echo "Error !!!";
		exit();
	}

	if (mysqli_num_rows($a)==0) {
		$b = "INSERT INTO nilai_alt VALUES('',$id_alternatif,$id_kriteria,$value)";
	} else {
		$b = "UPDATE nilai_alt SET nilai_alternatif=$value WHERE id_alternatif = $id_alternatif AND id_kriteria = $id_kriteria";
	}

	$rsult = mysqli_query($conn,$b);
        if (!$rsult) {
            echo "Gagal memasukkan / mengupdate nilai alternatif";
            exit();
        }
}

function getIDAlternatiff($no_urut) {
	include('koneksi.php');
	$query  = "SELECT id FROM alternatif ORDER BY id";
	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id'];
	}

	return $listID[($no_urut)];
}

