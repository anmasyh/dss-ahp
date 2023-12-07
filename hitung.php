<?php
include 'koneksi.php';
include 'fungsi.php';
$jmlsub = array();
$qwery = mysqli_query($conn, "SELECT nilai FROM pv_kriteria");
while ($row = mysqli_fetch_array($qwery)){ 
    $rows[] = $row['nilai'];
    $jmlsub[] = 0;
}

$query  = "SELECT nama FROM alternatif";
$result = mysqli_query($conn, $query);

for ($i=0; $i < $row = mysqli_fetch_array($result) ; $i++) {?>
	<?php
	$select = mysqli_query($conn, "SELECT * FROM kriteria");
	$count = mysqli_num_rows($select);
	for ($j=0; $j < $count ; $j++) {
        if(isset($_POST['subkrt'][$i][$j])){
            $matriks[$i][$j] = $_POST['subkrt'][$i][$j] * $rows[$j]; //penghitungan matriks alternatif dengan nested loop
            $value = $matriks[$i][$j];
            $jmlsub[$i] += $value; //total penjumlahan matriks hasil akhir alternatif

        $id_alternatif = getIDAlternatif($i);
        $id_kriteria = getKriteriaID($j);
        //insert matriks ke tabel nilai_alternatif
            $b = "INSERT INTO nilai_alt VALUES('',$id_alternatif,$id_kriteria,$value) ON DUPLICATE KEY UPDATE nilai_alternatif=$value";
        
        $rsult = mysqli_query($conn,$b);
        if (!$rsult) {
            echo "Gagal memasukkan / mengupdate nilai alternatif";
            exit();
        }
    }
}
}
    
$jmlAlternatif	= getJumlahSubKriteria();
for ($i=0; $i < ($jmlAlternatif); $i++) { //insert total hasil akhir ke tabel ranking
    $id_alternatif = getIDAlternatif($i);
    $queryy = "INSERT INTO ranking VALUES ($id_alternatif,$jmlsub[$i]) ON DUPLICATE KEY UPDATE nilai=$jmlsub[$i]";
    $resultt = mysqli_query($conn,$queryy);
    if (!$resultt) {
        echo "Gagal mengupdate ranking";
        exit();
    }
}

header('Location: hasil_subkrt.php');
?>