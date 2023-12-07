<?php
$page = 'hitung-alternatif';
error_reporting(0);
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
include('koneksi.php');
include('fungsi.php');
include('header.php');

?>

<div class="container-fluid">
<div class="card shadow mb-4">
<div class="card-header">
	
<div class="card-body">
		<?php
		$result = mysqli_query($conn, "SELECT * FROM pv_alternatif");
		$qwery = mysqli_query($conn, "SELECT * FROM alternatif");
		$krt = mysqli_query($conn, "SELECT * FROM kriteria");
		$count = mysqli_num_rows($krt);
		$select = mysqli_query($conn, "SELECT * FROM subkriteria");
		$counter = mysqli_num_rows($select);
		if (mysqli_num_rows($result) >= $count * $counter && mysqli_num_rows($qwery)>1) {
		?>
    <div class="table-responsive">
	<h1 class="h4 mb-2 text-gray-800">Matrik Hasil</h1>
	<table class="table table-bordered" cellspacing="0">
		<thead>
		<tr>
			<?php
			for ($x=0; $x <= (getJumlahKriteria()-1); $x++) { 
				echo "<th>".getKriteriaNama($x)."</th>\n";
			}
			?>
		</tr>
        <tr>
			<?php
			for ($x=1; $x <= (getJumlahKriteria()); $x++) { 
				echo "<td>".round(getKriteriaPV(($x)),3)."</td>";
			}
			?>
		</tr>

		<?php
		$hsl = array();
		while ($dta = mysqli_fetch_array($select)) {
			$hsl[]=$dta;
		}


		foreach ($hsl as $b => $c) { 
			echo "<tr>" , str_repeat("<th>{$c['nama']}</th>", $count) , "</tr>";
			for ($x=0; $x < (getJumlahKriteria()); $x++) {
			echo ("<td>".round(getAlternatifPV(getAlternatifID($b),getKriteriaID($x)),3)."</td>");
			}
		}
		?>
		
		</thead>
		<tbody>

		</tbody>

		<tfoot>
		<tr>
			
		</tr>
		</tfoot>

	</table>


	<h1 class="h4 mb-2 text-gray-800">Nilai Alternatif</h1>
	<table class="table table-bordered" width="100%" cellspacing="0">
		<thead>
		<tr>
            <td></td>
			<?php
			for ($x=0; $x <= (getJumlahKriteria()-1); $x++) { 
				echo "<th>".getKriteriaNama($x)."</th>\n";
			}
			?>
		</tr>
		</thead>
		<tbody>
		<form action="hitung.php" method="POST" id="formid">
			<?php
				$query  = "SELECT nama FROM alternatif";
				$result = mysqli_query($conn, $query);

				for ($i=0; $i < $row = mysqli_fetch_array($result) ; $i++) { 
					
				
				?>
				<tr>
					<th><?php echo $row['nama'] ?></th>
					<?php
					$select = mysqli_query($conn, "SELECT * FROM kriteria");
					$count = mysqli_num_rows($select);
					for ($j=0; $j < $count ; $j++) {
					?>
					<td>
					
							<select class="btn-secondary" name="subkrt[<?php echo $i ?>][<?php echo $j ?>]" required>
							<option value="" style="display:none;" required>-Pilih-</option>
							<?php
							$query = mysqli_query($conn, "SELECT pv_alternatif.pv_subkriteria, subkriteria.nama FROM pv_alternatif INNER JOIN subkriteria ON pv_alternatif.id_alternatif = subkriteria.id WHERE id_kriteria=$j+1");
							while ($a = mysqli_fetch_array($query)) {
							?>
								<option value="<?php echo $a['pv_subkriteria']; ?>"><?php echo $a['nama']; ?></option>
							<?php
							}
							?>
							</select>
					</td>
				
				<?php
					}
					}
				?> 	
					
				</tr>
		</form>
		</tbody>
	</table>
	</div><br>
	<a href="" class="btn btn-primary btn-icon-split">
        <input form="formid" class="btn btn-primary btn-icon-split icon" type="submit" name="submit" value="SUBMIT" style="float: right;">
    </a><br>
	<br>
	
	<?php
		}else {
			echo '<button class="btn btn-danger btn-icon-split btn-lg">
			<span class="icon text-white-50">
				<i class="fas fa-exclamation-triangle"></i>
			</span>
			<span class="text">Subkriteria belum dihitung atau alternatif belum diinputkan (minimal 2)</span>
			</button>';
		}
	?>
	
</div>
</div>
</div>
</div>


<?php include 'footer.php' ?>