<?php
include 'koneksi.php';
include 'fungsi.php';

$hasil = array();
    $query  = "SELECT nama FROM alternatif";
    $result = mysqli_query($conn, $query);
        for ($i=0; $i < $row = mysqli_fetch_array($result) ; $i++) {
    
    $select = mysqli_query($conn, "SELECT * FROM kriteria");
	$count = mysqli_num_rows($select);
		for ($j=0; $j < $count ; $j++) {

    $ab = $_POST['subkrt'][$i][$j];
if (isset($_POST['submit'])) {
    if(isset($ab)){
        $hasil = $ab[$i][$j] * $pv[$x];
    }
    echo $hasil;
    }
    }
}?>