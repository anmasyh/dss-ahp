<?php
include 'koneksi.php';
include 'fungsi.php';
include 'function.php';
?>
<style>
	table, th, td {
  border: 1px solid;
}
</style>
<table>

		<thead>
		<tr>
            <td>
				<?php
				for ($x=0; $x <= (getJumlahKriteria()-1); $x++) { 
					echo "<th>".getKriteriaNama($x)."</th>\n";
				}
				?>
			</td>
			
		</tr>
		</thead>
		<tbody>
		<form id="formcoba" action="hsl_coba.php" method="POST">
			<?php
				$result = mysqli_query($conn, "SELECT nama FROM alternatif");
				for ($i=0; $i < $row = mysqli_fetch_array($result) ; $i++) {
			?>
			<tr>
				<td><?php echo $row['nama'] ?></td>
				<?php
					

				?>
				
				<?php
	for ($y=0; $y <getJumlahKriteria() ; $y++) {
		
		?>
				<td>
		
	
	
							
	<select class="btn-secondary" name="subkrt[]">
		<option disabled selected>-Pilih-</option>
			<?php
			$query = mysqli_query($conn, "SELECT pv_subkriteria FROM pv_alternatif WHERE id_kriteria=1");
			for ($j=1; $j <= $a = mysqli_fetch_array($query) ; $j++) {
			?>
		<option value="<?php echo $a['pv_subkriteria'];?>"><?php echo $a['pv_subkriteria'];?></option>
			<?php } ?>
	</select>

	<?php }  ?>

				</td>
				
				<?php
						}
					
				?> 	
				</tr>
			</form>	
	
					
				
				
		</tbody>
	</table>

	<input type="submit" name="submit" form="formcoba" value="Submit">
