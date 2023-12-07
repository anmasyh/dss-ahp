<?php

// menambah data kriteria
function tambahKrt($id,$nama) {
	include('koneksi.php');

	$query 	= "INSERT INTO kriteria VALUES ('$id','$nama')";
	mysqli_query($conn, $query);

}

//ubah data kriteria
function ubahKrt($id,$nama) {
	include('koneksi.php');

	$query 	= "UPDATE kriteria SET nama='$nama' WHERE id=$id";
	mysqli_query($conn, $query);

}

// hapus kriteria
function deleteKriteria($id) {
	include('koneksi.php');

	// hapus record dari tabel kriteria
	$query 	= "DELETE FROM kriteria WHERE id=$id";
	mysqli_query($conn, $query);

	// hapus record dari tabel pv_kriteria
	$query 	= "DELETE FROM pv_kriteria WHERE id_kriteria=$id";
	mysqli_query($conn, $query);

	// hapus record dari tabel pv_alternatif
	$query 	= "DELETE FROM pv_alternatif WHERE id_kriteria=$id";
	mysqli_query($conn, $query);

	$query 	= "DELETE FROM perbandingan_kriteria WHERE kriteria1=$id OR kriteria2=$id";
	mysqli_query($conn, $query);

	$query 	= "DELETE FROM perbandingan_alternatif WHERE pembanding=$id";
	mysqli_query($conn, $query);
}

// menambah data subkriteria
function tambahSbkrt($id,$nama) {
	include('koneksi.php');

	$query 	= "INSERT INTO subkriteria VALUES ('$id','$nama')";
	mysqli_query($conn, $query);

}

//ubah data kriteria
function ubahSbkrt($id,$nama) {
	include('koneksi.php');

	$query 	= "UPDATE subkriteria SET nama='$nama' WHERE id=$id";
	mysqli_query($conn, $query);

}

// hapus kriteria
function deleteSbkrt($id) {
	include('koneksi.php');

	// hapus record dari tabel kriteria
	$query 	= "DELETE FROM subkriteria WHERE id=$id";
	mysqli_query($conn, $query);
}

// menambah data alternatif
function tambahAlt($id,$no,$nama,$alamat) {
	include('koneksi.php');

	$query 	= "INSERT INTO alternatif VALUES ('$id','$no','$nama','$alamat')";
	mysqli_query($conn, $query);

}

// ubah data alternatif
function ubahAlt($id,$no,$nama,$alamat) {
	include('koneksi.php');

	$query 	= "UPDATE alternatif SET no_kk='$no', nama='$nama', alamat='$alamat' WHERE id=$id";
	mysqli_query($conn, $query);

}

// hapus alternatif
function deleteAlternatif($id) {
	include('koneksi.php');

	// hapus record dari tabel alternatif
	$query 	= "DELETE FROM alternatif WHERE id=$id";
	mysqli_query($conn, $query);

	// hapus record dari tabel pv_alternatif
	$query 	= "DELETE FROM pv_alternatif WHERE id_alternatif=$id";
	mysqli_query($conn, $query);

	// hapus record dari tabel ranking
	$query 	= "DELETE FROM ranking WHERE id_alternatif=$id";
	mysqli_query($conn, $query);

	$query 	= "DELETE FROM perbandingan_alternatif WHERE alternatif1=$id OR alternatif2=$id";
	mysqli_query($conn, $query);

	$query = "DELETE FROM nilai_alt WHERE id_alternatif=$id";
	mysqli_query($conn, $query);
}


//hapus data user
function deleteUser($id) {
	include('koneksi.php');
	$query = "DELETE FROM user WHERE id=$id";
	mysqli_query($conn, $query);
}