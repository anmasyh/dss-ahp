<?php
$page = 'hitung-subkriteria';
error_reporting(0);
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
	include('koneksi.php');
	include('fungsi.php');

	$jenis = $_GET['c'];

	include('header.php');

?>
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Hitung Subkriteria <?php echo getKriteriaNama($jenis-1)?>
        <a href="#" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#ModalInfoAlternatif">
            <i class="fas fa-info"></i>
        </a>
    </h1>


<!-- Modal Info Hitung Alternatif Start -->
<div class="modal fade" id="ModalInfoAlternatif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cara Menghitung Subkriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Sama seperti kriteria, perhitungan subkriteria dilakukan dengan cara perbandingan berpasangan, yaitu membandingkan subkriteria satu dengan subkriteria yang lain terhadap setiap kriteria yang ada menggunakan skala kepentingan dari 1 sampai 9.
        <br><br>
        Berikut merupakan skala penilaian perbandingan berpasangan menurut Saaty.
        <br><br>
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tingkat Kepentingan</h6>
                </div>
                <div class="card-body">
                  <table class="table">
                    <tr><td><b>2,4,6,8</b></td><td>Nilai antara dua yang berdekatan</td></tr>
                    <tr><td><b>9</b></td><td>Salah satu mutlak lebih penting</td></tr>
                    <tr><td><b>7</b></td><td>Salah satu sangat lebih penting</td></tr>
                    <tr><td><b>5</b></td><td>Salah satu lebih penting</td></tr>
                    <tr><td><b>3</b></td><td>Salah satu sedikit lebih penting</td></tr>
                    <tr><td><b>1</b></td><td>Keduanya sama penting</td></tr>
                  </table>
                </div>

            </div>

        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Info Hitung Alternatif Start -->


<div class="card shadow mb-4">
<div class="card-header py-3">	
<h6 class="m-0 font-weight-bold text-primary"><br>Masukkan Nilai Tingkat Kepentingan (1 sampai 9)</h6>

<div class="card-body">
    <div class="table-responsive">
	<?php
	$result = mysqli_query($conn, "SELECT * FROM pv_kriteria");
  $result2 = mysqli_query($conn, "SELECT * FROM subkriteria");
      
	if (mysqli_num_rows($result)>2 AND mysqli_num_rows($result2)>2) {
		showTabelPerbandingan($jenis,'subkriteria');
	?>
	</div>
	<br>
	<a href="" class="btn btn-primary btn-icon-split">
          <input form="formpkt" class="btn btn-primary btn-icon-split icon" type="submit" name="submit" value="SUBMIT" style="float: right;">
    </a>
	<?php
	}else {
		echo '<button class="btn btn-danger btn-icon-split btn-lg">
		<span class="icon text-white-50">
			<i class="fas fa-exclamation-triangle"></i>
		</span>
		<span class="text">Kriteria belum dihitung atau Subkriteria belum diinputkan (minimal 3)</span>
		</button>';

	}
	?>
</div>
</div>
</div>
</div>


<?php
include 'footer.php';
?>
