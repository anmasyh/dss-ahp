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
<?php if (isset($_POST['submit'])) {?>

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
			<?php
				$query = mysqli_query($conn, "SELECT nama FROM alternatif");
				for ($y=0; $y < $row = mysqli_fetch_array($query) ; $y++) {
			?>

			<tr> 
				<td><?php echo $row['nama']; ?></td>
				
                
				<?php
					$selectid = $_POST['subkrt'];
    				foreach($selectid as $id){
                 ?>
			
				<td><?php echo $id; ?></td>
				<?php } } ?>
			</tr>
		</tbody>
	</table>
<?php } ?>