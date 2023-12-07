<?php
$page = 'hasil';
error_reporting(0);
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
include('koneksi.php');
include('fungsi.php');

// menghitung perangkingan
$jmlKriteria 	= getJumlahKriteria();
$jmlAlternatif	= getJumlahAlternatif();
$nilai			= array();

// mendapatkan nilai tiap alternatif
for ($x=0; $x <= ($jmlAlternatif-1); $x++) {
	// inisialisasi
	$nilai[$x] = 0;

	for ($y=0; $y <= ($jmlKriteria-1); $y++) {
		$id_alternatif 	= getAlternatifID($x);
		$id_kriteria	= getKriteriaID($y);

		$pv_alternatif	= getAlternatifPV($id_alternatif,$id_kriteria);
		$pv_kriteria	= getKriteriaPV($id_kriteria);

		$nilai[$x]	 	+= ($pv_alternatif * $pv_kriteria);
	}
}

// update nilai ranking
for ($i=0; $i <= ($jmlAlternatif-1); $i++) { 
	$id_alternatif = getAlternatifID($i);
	$query = "INSERT INTO ranking VALUES ($id_alternatif,$nilai[$i]) ON DUPLICATE KEY UPDATE nilai=$nilai[$i]";
	$result = mysqli_query($conn,$query);
	if (!$result) {
		echo "Gagal mengupdate ranking";
		exit();
	}
}

include('header.php');

?>

<div class="container-fluid">
<div class="card shadow mb-4">
<div class="card-header">
	
<div class="card-body">
		<?php
		$result = mysqli_query($conn, "SELECT * FROM pv_alternatif");
		if (mysqli_num_rows($result)>0) {
		?>
    <div class="table-responsive">
	<h1 class="h4 mb-2 text-gray-800">Hasil Perhitungan</h1>
	<table class="table table-bordered" width="100%" cellspacing="0">
		<thead>
		<tr>
			<th>Overall Composite Height</th>
			<th>Priority Vector (rata-rata)</th>
			<?php
			for ($i=0; $i <= (getJumlahAlternatif()-1); $i++) { 
				echo "<th>".getAlternatifNama($i)."</th>\n";
			}
			?>
		</tr>
		</thead>
		<tbody>

		<?php
			for ($x=0; $x <= (getJumlahKriteria()-1) ; $x++) { 
				echo "<tr>";
				echo "<td>".getKriteriaNama($x)."</td>";
				echo "<td>".round(getKriteriaPV(getKriteriaID($x)),5)."</td>";

				for ($y=0; $y <= (getJumlahAlternatif()-1); $y++) { 
					echo "<td>".round(getAlternatifPV(getAlternatifID($y),getKriteriaID($x)),5)."</td>";
				}
				echo "</tr>";
			}
		?>
		</tbody>

		<tfoot>
		<tr>
			<th colspan="2">Total</th>
			<?php
			for ($i=0; $i <= ($jmlAlternatif-1); $i++) { 
				echo "<th>".round($nilai[$i],8)."</th>";
			}
			?>
		</tr>
		</tfoot>

	</table>


	<h1 class="h4 mb-2 text-gray-800">Perengkingan</h1>
	<table class="table table-bordered" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Peringkat</th>
				<th>Alternatif</th>
				<th>Nilai</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query  = "SELECT id,nama,id_alternatif,nilai FROM alternatif,ranking WHERE alternatif.id = ranking.id_alternatif ORDER BY nilai DESC";
				$result = mysqli_query($conn, $query);

				$i = 0;
				while ($row = mysqli_fetch_array($result)) {
					$i++;
				?>
				<tr>
					<?php if ($i == 1) {
						echo "<td><div class=\"ui ribbon label\">1</div></td>";
					} else {
						echo "<td>".$i."</td>";
					}

					?>

					<td><?php echo $row['nama'] ?></td>
					<td><?php echo $row['nilai'] ?></td>
				</tr>

				<?php	
				}


			?>
		</tbody>
	</table>
	</div>
	<br>
	<a href="" data-toggle="modal" data-target="#ModalHapus" class="btn btn-danger btn-icon-split btn-sm">
        <span class="icon text-white-50">
            <i class="fas fa-exclamation-triangle"></i>
        </span>
        <span class="text">Hapus data!</span>
    </a>

                            <!-- Modal Delete Data Perhitungan -->

		<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Warning!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="hasil.php" method="POST">
                <div class="modal-body">
                Aksi ini akan menghapus seluruh data perhitungan yang telah dilakukan!
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" name="hapusdt" class="btn btn-secondary">Ya, Hapus!</button>
                </div>
                </form>
				<?php
				if (isset($_POST['hapusdt'])) {
					mysqli_query($conn, "DELETE perbandingan_alternatif, perbandingan_kriteria, pv_alternatif, pv_kriteria, ranking
										FROM perbandingan_alternatif, perbandingan_kriteria, pv_alternatif, pv_kriteria, ranking");
				}
				?>
                </div>
            </div>
        </div>
                            <!-- End of Modal Delete Data Perhitungan -->

	<a href="cetak_hasil.php" target="_blank" class="btn btn-secondary btn-icon-split" style="float: right">
        <span class="icon text-white-50">
            <i class="fas fa-print"></i>
        </span>
        <span class="text">Print</span>
    </a><br><br>
	<?php
		}else {
			echo '<button class="btn btn-danger btn-icon-split btn-lg">
			<span class="icon text-white-50">
				<i class="fas fa-exclamation-triangle"></i>
			</span>
			<span class="text">Lakukan perhitungan alternatif terlebih dahulu</span>
			</button>';
		}
	?>
	
</div>
</div>
</div>
</div>


<?php include 'footer.php' ?>