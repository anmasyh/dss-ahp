<?php
$page = 'output';
$page = 'hitung-kriteria';
include ('header.php');
?>

<div class="container-fluid">
	    <!-- Page Heading -->
		<h1 class="h3 mb-2 text-gray-800">Hasil Perhitungan Kriteria
        <a href="#" class="btn btn-success btn-circle btn-sm">
            <i class="fas fa-check"></i>
        </a>
    	</h1>
<div class="card shadow mb-4">
<div class="card-header py-3">


	<div class="card-body">
    <div class="table-responsive">
	<h1 class="h4 mb-2 text-gray-800">Matriks Perbandingan Berpasangan</h1>
	<table class="table table-bordered" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Kriteria</th>
<?php
	for ($i=0; $i <= ($n-1); $i++) { 
		echo "<th>".getKriteriaNama($i)."</th>";
	}
?>
			</tr>
		</thead>
		<tbody>
<?php
	for ($x=0; $x <= ($n-1); $x++) { 
		echo "<tr>";
		echo "<th>".getKriteriaNama($x)."</th>";
			for ($y=0; $y <= ($n-1); $y++) { 
				echo "<td>".round($matrik[$x][$y],3)."</td>";
			}

		echo "</tr>";
	}
?>
		</tbody>
		<tfoot>
			<tr>
				<th>Jumlah</th>
<?php
		for ($i=0; $i <= ($n-1); $i++) { 
			echo "<th>".round($jmlmpb[$i],3)."</th>";
		}
?>
			</tr>
		</tfoot>
	</table>


	<br>

	<h1 class="h4 mb-2 text-gray-800">Matriks Nilai Kriteria</h1>
	<table class="table table-bordered" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Kriteria</th>
<?php
	for ($i=0; $i <= ($n-1); $i++) { 
		echo "<th>".getKriteriaNama($i)."</th>";
	}
?>
				<th>Jumlah</th>
				<th>Priority</th>
			</tr>
		</thead>
		<tbody>
<?php
	for ($x=0; $x <= ($n-1); $x++) { 
		echo "<tr>";
		echo "<th>".getKriteriaNama($x)."</th>";
			for ($y=0; $y <= ($n-1); $y++) { 
				echo "<td>".round($matrikb[$x][$y],3)."</td>";
			}

		echo "<td>".round($jmlmnk[$x],3)."</td>";
		echo "<td>".round($pv[$x],3)."</td>";

		echo "</tr>";
	}
?>
			
		</tbody>
		
	</table>
	<br>

	<h1 class="h4 mb-2 text-gray-800">Matriks Penjumlahan Setiap Baris</h1>
	<table class="table table-bordered" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Kriteria</th>

	<?php
		for ($i=0; $i <= ($n-1); $i++) { 
			echo "<th>".getKriteriaNama($i)."</th>";
			}
	?>

		<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>

	<?php
	for ($x=0; $x <= ($n-1); $x++) { 
		echo "<tr>";
		echo "<th>".getKriteriaNama($x)."</th>";
			for ($y=0; $y <= ($n-1); $y++) { 
				echo "<td>".round($matrikc[$y][$x],3)."</td>";
			}

		echo "<td>".round($matrikpsb[$x],3)."</td>";

		echo "</tr>";
	}
	?>
		</tbody>
	</table>

	<br>

	<h1 class="h4 mb-2 text-gray-800">Perhitungan Rasio Konsistensi</h1>
	<table class="table table-bordered" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Kriteria</th>
				<th>Jumlah per Baris</th>
				<th>Prioritas</th>
				<th>Hasil</th>
		</thead>
		<tbody>
				<?php
				for ($x=0; $x <= ($n-1); $x++) { 
					echo "<tr>";
					echo "<th>".getKriteriaNama($x)."</th>";

					echo "<td>".round($matrikpsb[$x],3)."</td>";
					echo "<td>".round($pv[$x],3)."</td>";
					echo "<td>".round($prk[$x],3)."</td>";

					echo "</tr>";
				}
				?>
				
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="<?php echo (3)?>">Lamda maks (λ maks)</th>
				<th><?php echo (round($eigenvektor,3))?></th>
			
			<tr>
				<th colspan="<?php echo (3)?>">Consistency Index</th>
				<th><?php echo (round($consIndex,3))?></th>
			</tr>
			<tr>
				<th colspan="<?php echo (3)?>">Consistency Ratio</th>
				<th><?php echo (round(($consRatio),3))?> (<?php echo (round(($consRatio),2))?> %)</th>
			</tr>
		</tfoot>
	</table>



<?php
	if ($consRatio > 0.1) {
?>
		<div class="ui icon red message">
		<a href="#" class="btn btn-danger btn-icon-split btn-lg">
            <span class="icon text-white-50">
                <i class="fas fa-exclamation-triangle"></i>
            </span>
            <span class="text">Nilai Consistency Ratio melebihi 10% !!! Mohon input kembali tabel perbandingan...</span>
        </a>
		</div>

		<br>

		<a href='javascript:history.back()' class="btn btn-primary btn-icon-split">
			<span class="icon text-white-50">
				<i class="fas fa-angle-left"></i>
			</span>
			<span class="text">Kembali</span>
		</a>
		

<?php
	} else {

?>

		</div>
		<br>
			<a href="bobotsub.php?c=1" class="btn btn-primary btn-icon-split" style="float: right">
			<span class="icon text-white-50">
				<i class="fas fa-angle-right"></i>
			</span>
			<span class="text">Lanjut</span>
			</a>
		<br><br>
		</div>
	</div>
</div>

<?php 
	}
	
	include('footer.php');
?>