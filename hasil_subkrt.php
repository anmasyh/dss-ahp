<?php
$page = 'hasil';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';
include 'fungsi.php';
include 'header.php';
?>

<div class="container-fluid">
<div class="card shadow mb-4">
<div class="card-header">	
<div class="card-body">

<div class="table-responsive">
	<h1 class="h4 mb-2 text-gray-800">Hasil Akhir</h1>
	<table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Nama KK</th>
			<?php
			for ($x=0; $x <= (getJumlahKriteria()-1); $x++) { 
				echo "<th>".getKriteriaNama($x)."</th>\n";
			}
			?>
            <th>Total</th>
		</tr>
        </thead>
        <tbody> 
                <?php
                for ($i=0; $i < getJumlahSubkriteria() ; $i++) {
                    echo "<tr>";
                      echo"<th>".getSubkriteriaNama($i)."</th>";
                        for ($j=0; $j < getJumlahKriteria() ; $j++) { 
                          
                      echo "<td>".round(getAlternatifNilai(getIDAlternatif($i),getKriteriaID($j)),2)."</td>";
                          
                    } 
                    echo "<td>".round(getTotalAkhir(getIDAlternatif($i)),3)."</td>";
                    echo "</tr>";
                } ?>
                
        </tbody>
    </table>

    <br>
    <h1 class="h4 mb-2 text-gray-800"></h1>
	<table class="table table-bordered" width="100%" cellspacing="0">
    
    </table>
</div>

        <h1 class="h4 mb-2 text-gray-800">Hasil Rekomendasi
        <a href="#" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#ModalInfoKriteria">
            <i class="fas fa-info"></i>
        </a>
    </h1>
    
<div class="modal fade" id="ModalInfoKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hasil Rekomendasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Hasil rekomendasi penerima bantuan sosial Program Keluarga Harapan dengan metode Analytical Hierarchy Process
        adalah jika nilai akhir calon penerima kurang dari 0,7 maka akan direkomendasikan. Namun jika lebih dari 0,7
        calon penerima tidak direkomendasikan untuk mendapatkan bantuan sosial.
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="table-responsive">
	<table class="table table-bordered" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Peringkat</th>
                <th>Nomor KK</th>
				<th>Nama KK</th>
				<th>Nilai Akhir</th>
                <th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query  = "SELECT id,no_kk,nama,id_alternatif,nilai FROM alternatif,ranking WHERE alternatif.id = ranking.id_alternatif ORDER BY nilai ASC";
				$result = mysqli_query($conn, $query);

				$i = 0;
				while ($row = mysqli_fetch_array($result)) {
					$i++;
				?>
				<tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['no_kk'] ?></td>
					<td><?php echo $row['nama'] ?></td>
					<td><?php echo round($row['nilai'],3)?></td>
                    <td>
                    <?php
                    if ($row['nilai']<0.7){
                        echo '<button class="btn btn-success btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Direkomendasikan</span>
                    </button>';}
                    else {
                        echo '<button class="btn btn-danger btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-window-close"></i>
                        </span>
                        <span class="text">Tidak Direkomendasikan</span>
                    </button>';}
                    ?>
                    </td>
				</tr>

				<?php	
				}


			?>
		</tbody>
	</table>

    <br>
    <h1 class="h4 mb-2 text-gray-800"></h1>
	<table class="table table-bordered" width="100%" cellspacing="0">
    
    </table>
</div>

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
                <form action="hasil_subkrt.php" method="POST">
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
</div>
</div>
</div>
</div>

<?php


include 'footer.php';
?>