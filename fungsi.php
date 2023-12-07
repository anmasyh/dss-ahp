<?php

// mencari ID kriteria
// berdasarkan urutan ke berapa (C1, C2, C3)
function getKriteriaID($no_urut) {
	include('koneksi.php');
	$query  = "SELECT id FROM kriteria ORDER BY id";
	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id'];
	}

	return $listID[($no_urut)];
}

// mencari ID alternatif
// berdasarkan urutan ke berapa (A1, A2, A3)
function getAlternatifID($no_urut) {
	include('koneksi.php');
	$query  = "SELECT id FROM subkriteria ORDER BY id";
	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id'];
	}

	return $listID[($no_urut)];
}

function getIDAlternatif($no_urut) {
	include('koneksi.php');
	$query  = "SELECT id FROM alternatif ORDER BY id";
	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($result)) {
		$listID[] = $row['id'];
	}

	return $listID[($no_urut)];
}

// mencari nama kriteria
function getKriteriaNama($no_urut) {
	include('koneksi.php');
	$query  = "SELECT nama FROM kriteria ORDER BY id";
	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama'];
	}

	return $nama[($no_urut)];
}

// mencari nama alternatif
function getAlternatifNama($no_urut) {
	include('koneksi.php');
	$query  = "SELECT nama FROM subkriteria ORDER BY id";
	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama'];
	}

	return $nama[($no_urut)];
}

// mencari nama alternatif
function getSubkriteriaNama($no_urut) {
	include('koneksi.php');
	$query  = "SELECT nama FROM alternatif ORDER BY id";
	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_array($result)) {
		$nama[] = $row['nama'];
	}

	return $nama[($no_urut)];
}

// mencari priority vector alternatif
function getAlternatifPV($id_alternatif,$id_kriteria) {
	include('koneksi.php');
	$query = "SELECT pv_subkriteria FROM pv_alternatif WHERE id_alternatif=$id_alternatif AND id_kriteria=$id_kriteria";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$pvsub = $row['pv_subkriteria'];
	}

	return $pvsub;
}

// mencari priority vector alternatif
function getAlternatifNilai($id_alternatif,$id_kriteria) {
	include('koneksi.php');
	$query = "SELECT nilai_alternatif FROM nilai_alt WHERE id_alternatif=$id_alternatif AND id_kriteria=$id_kriteria";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$nilai = $row['nilai_alternatif'];
	}

	return $nilai;
}

// mencari priority vector kriteria
function getKriteriaPV($id_kriteria) {
	include('koneksi.php');
	$query = "SELECT nilai FROM pv_kriteria WHERE id_kriteria=$id_kriteria";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$pv = $row['nilai'];
	}

	return $pv;
}

// mencari jumlah alternatif
function getJumlahAlternatif() {
	include('koneksi.php');
	$query  = "SELECT count(*) FROM subkriteria";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

function getJumlahSubkriteria() {
	include('koneksi.php');
	$query  = "SELECT count(*) FROM alternatif";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

// mencari jumlah kriteria
function getJumlahKriteria() {
	require 'koneksi.php';
	$query  = "SELECT count(*) FROM kriteria";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$jmlData = $row[0];
	}

	return $jmlData;
}

//mencari nilai ranking
function getTotalAkhir($id_alternatif){
	
	include 'koneksi.php';
	$query = "SELECT nilai FROM ranking WHERE id_alternatif=$id_alternatif";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$total = $row['nilai'];
	}

	return $total;
}

// memasukkan nilai priority vektor kriteria
function inputKriteriaPV ($id_kriteria,$pv) {
	include ('koneksi.php');

	$query = "SELECT * FROM pv_kriteria WHERE id_kriteria=$id_kriteria";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO pv_kriteria (id_kriteria, nilai) VALUES ($id_kriteria, $pv)";
	} else {
		$query = "UPDATE pv_kriteria SET nilai=$pv WHERE id_kriteria=$id_kriteria";
	}


	$result = mysqli_query($conn, $query);
	if(!$result) {
		echo "Gagal memasukkan / update nilai priority vector kriteria";
		exit();
	}

}

// memasukkan nilai priority vektor alternatif
function inputAlternatifPV ($id_alternatif,$id_kriteria,$pv,$pvsub) {
	include ('koneksi.php');

	$query  = "SELECT * FROM pv_alternatif WHERE id_alternatif = $id_alternatif AND id_kriteria = $id_kriteria";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO pv_alternatif (id_alternatif,id_kriteria,nilai,pv_subkriteria) VALUES ($id_alternatif,$id_kriteria,$pv,$pvsub)";
	} else {
		$query = "UPDATE pv_alternatif SET nilai=$pv WHERE id_alternatif=$id_alternatif AND id_kriteria=$id_kriteria";
	}

	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo "Gagal memasukkan / update nilai priority vector alternatif";
		exit();
	}

}


// memasukkan bobot nilai perbandingan kriteria
function inputDataPerbandinganKriteria($kriteria1,$kriteria2,$nilai) {
	include('koneksi.php');

	$id_kriteria1 = getKriteriaID($kriteria1);
	$id_kriteria2 = getKriteriaID($kriteria2);

	$query  = "SELECT * FROM perbandingan_kriteria WHERE kriteria1 = $id_kriteria1 AND kriteria2 = $id_kriteria2";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO perbandingan_kriteria (kriteria1,kriteria2,nilai) VALUES ($id_kriteria1,$id_kriteria2,$nilai)";
	} else {
		$query = "UPDATE perbandingan_kriteria SET nilai=$nilai WHERE kriteria1=$id_kriteria1 AND kriteria2=$id_kriteria2";
	}

	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo "Gagal memasukkan data perbandingan";
		exit();
	}

}

// memasukkan bobot nilai perbandingan alternatif
function inputDataPerbandinganAlternatif($alternatif1,$alternatif2,$pembanding,$nilai) {
	include('koneksi.php');


	$id_alternatif1 = getAlternatifID($alternatif1);
	$id_alternatif2 = getAlternatifID($alternatif2);
	$id_pembanding  = getKriteriaID($pembanding);

	$query  = "SELECT * FROM perbandingan_alternatif WHERE alternatif1 = $id_alternatif1 AND alternatif2 = $id_alternatif2 AND pembanding = $id_pembanding";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	// jika result kosong maka masukkan data baru
	// jika telah ada maka diupdate
	if (mysqli_num_rows($result)==0) {
		$query = "INSERT INTO perbandingan_alternatif (alternatif1,alternatif2,pembanding,nilai) VALUES ($id_alternatif1,$id_alternatif2,$id_pembanding,$nilai)";
	} else {
		$query = "UPDATE perbandingan_alternatif SET nilai=$nilai WHERE alternatif1=$id_alternatif1 AND alternatif2=$id_alternatif2 AND pembanding=$id_pembanding";
	}

	$result = mysqli_query($conn, $query);
	if (!$result) {
		echo "Gagal memasukkan data perbandingan";
		exit();
	}

}

// mencari nilai bobot perbandingan kriteria
function getNilaiPerbandinganKriteria($kriteria1,$kriteria2) {
	include('koneksi.php');

	$id_kriteria1 = getKriteriaID($kriteria1);
	$id_kriteria2 = getKriteriaID($kriteria2);

	$query  = "SELECT nilai FROM perbandingan_kriteria WHERE kriteria1 = $id_kriteria1 AND kriteria2 = $id_kriteria2";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}

	if (mysqli_num_rows($result)==0) {
		$nilai = "";
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['nilai'];
		}
	}

	return $nilai;
}

// mencari nilai bobot perbandingan alternatif
function getNilaiPerbandinganAlternatif($alternatif1,$alternatif2,$pembanding) {
	include('koneksi.php');

	$id_alternatif1 = getAlternatifID($alternatif1);
	$id_alternatif2 = getAlternatifID($alternatif2);
	$id_pembanding  = getKriteriaID($pembanding);

	$query  = "SELECT nilai FROM perbandingan_alternatif WHERE alternatif1 = $id_alternatif1 AND alternatif2 = $id_alternatif2 AND pembanding = $id_pembanding";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		echo "Error !!!";
		exit();
	}
	if (mysqli_num_rows($result)==0) {
		$nilai = "";
	} else {
		while ($row = mysqli_fetch_array($result)) {
			$nilai = $row['nilai'];
		}
	}

	return $nilai;
}

// menampilkan nilai IR
function getNilaiIR($jmlKriteria) {
	include('koneksi.php');
	$query  = "SELECT nilai FROM ir WHERE jumlah=$jmlKriteria";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$nilaiIR = $row['nilai'];
	}

	return $nilaiIR;
}

// menampilkan tabel perbandingan bobot
function showTabelPerbandingan($jenis,$kriteria) {
	require 'koneksi.php';

	if ($kriteria == 'kriteria') {
		$n = getJumlahKriteria();
	} else {
		$n = getJumlahAlternatif();
	}

	$query = "SELECT nama FROM $kriteria ORDER BY id";
	$result	= mysqli_query($conn, $query);
	if (!$result) {
		echo "Error koneksi database!!!";
		exit();
	}

	// buat list nama pilihan
	while ($row = mysqli_fetch_array($result)) {
		$pilihan[] = $row['nama'];
	}

	// tampilkan tabel
	?>

	<form id="formpkt" action="proses.php" method="post">
	<table class="table table-bordered" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th colspan="2">Silahkan pilih yang lebih penting!</th>
				<th>Nilai perbandingan</th>
			</tr>
		</thead>
		<tbody>

	<?php

	//inisialisasi
	$urut = 0;

	for ($x=0; $x <= ($n - 2); $x++) {
		for ($y=($x+1); $y <= ($n - 1) ; $y++) {

			$urut++;

	?>
			<tr>
				<td>
					<div class="field">
						<div class="ui radio checkbox">
							<input name="pilih<?php echo $urut?>" value="1" checked="" class="hidden" type="radio">
							<label><?php echo $pilihan[$x]; ?></label>
						</div>
					</div>
				</td>
				<td>
					<div class="field">
						<div class="ui radio checkbox">
							<input name="pilih<?php echo $urut?>" value="2" class="hidden" type="radio">
							<label><?php echo $pilihan[$y]; ?></label>
						</div>
					</div>
				</td>
				<td>
					<div class="field">

	<?php
	if ($kriteria == 'kriteria') {
		$nilai = getNilaiPerbandinganKriteria($x,$y);
	} else {
		$nilai = getNilaiPerbandinganAlternatif($x,$y,($jenis-1));
	}

	?>
						<input type="number" min="1" max="9" name="bobot<?php echo $urut?>" value="<?php echo $nilai?>" required>
					</div>
				</td>
			</tr>
			<?php
		}
	}

	?>
		</tbody>
	</table>
	<input type="text" name="jenis" value="<?php echo $jenis; ?>" hidden>
	

	</form>

	<?php
}

?>
