
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

    <title>Laporan Hasil Sistem Pendukung Keputusan - Program Keluarga Harapan Kecamatan Margoyoso</title>

    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
        }
        
        .krs_box {
            border: 1px solid #000;
        }
        
        .krs_box * {
            text-align: center;
            padding: 0 1px;
        }
        
        .krs_box td,
        .krs_box th {
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
        }
        
        .krs_box th {
            font-size: 12px;
        }
        
        .tl {
            text-align: left;
            padding-left: 10px
        }
        
        .tc {
            text-align: center;
        }
        
        .tr {
            text-align: right;
        }
        
        .tj {
            text-align: justify;
        }
        
        .fb {
            font-weight: bold;
        }
        
        .line {
            border-bottom: 1px dashed #000;
            clear: both;
        }

    </style>
    <script type="text/javascript" src="chrome-extension://aadgmnobpdmgmigaicncghmmoeflnamj/ng-inspector.js"></script>
</head>

<?php
include('koneksi.php');
include('fungsi.php');
$select = mysqli_query($conn, "SELECT * FROM subkriteria");
$krt = mysqli_query($conn, "SELECT * FROM kriteria");
$count = mysqli_num_rows($krt);
?>

<body cz-shortcut-listen="true">
    <div style="margin:0 auto;width:800px;">
        <br><br>
        <table align="center" width="800" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td><img src="img/kemensos.png" width="80"></td>
                    <td width="600" style="font-weight:bold;text-align:center;">
                        
                        <div style="font-size:18px;font-family:Times New Roman,Times,serif">PELAKSANA PROGRAM KELUARGA HARAPAN KABUPATEN PATI</div>
                        <div style="font-size:14px;font-family:Times New Roman,Times,serif">KECAMATAN MARGOYOSO</div>
						<div style="font-size:12px;">Jalan Raya Pati-Tayu KM 18, Margoyoso, Pati, Jawa Tengah</div>
                    </td>
					<td><img src="img/pkh-logo.png" width="80" align="right"></td>
                    
                </tr>
            </tbody>
        </table>
        <hr>
        <table border="0" width="800" cellspacing="0" cellpadding="0" align="center">
            <tbody>
                <tr>
                    <td colspan="3" align="center"><strong>PENGUMUMAN</strong></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table border="0" width="500" cellspacing="0" cellpadding="0" align="center">
            <tbody>
                <tr>
                <td colspan="3" align="center">TENTANG</td>
                </tr>
                <tr>
                <td colspan="3" align="center"><strong>REKOMENDASI HASIL PENERIMA BANTUAN SOSIAL PROGRAM KELUARGA HARAPAN KECAMATAN MARGOYOSO KABUPATEN PATI TAHUN 2023 BERDASARKAN SISTEM PENDUKUNG KEPUTUSAN METODE ANALYTICAL HIEARARCHY PROCESS</strong></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table border="0" width="500" cellspacing="0" cellpadding="0" align="center">
            <tbody>
                <tr>
                <td colspan="3" align="center">Berdasarkan hasil laporan berikut ini tentang Rekomendasi Hasil Penerima Bantuan Sosial 
                    Program Keluarga Harapan Kecamatan Margoyoso Kabupaten Pati Tahun 2023 Berdasarkan Sistem Pendukung Keputusan Metode Analytical Hierarchy Process dan hasil validasi data calon penerima bantuan sosial Program Keluarga Harapan, 
                    maka diputuskan bagi nama-nama KK yang direkomendasikan sebagai penerima bantuan sosial Program Keluarga Harapan adalah terlampir berikut ini.</td>
                </tr>
            </tbody>
        </table>
        <br><br><br>
        <table width="550" align="center" border="0" cellpadding="0" cellspacing="0" class="krs_box">
            <tbody>
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
            </tbody>
        </table>
		<br><br>
		<table width="800" align="center" border="0" cellpadding="0" cellspacing="0" class="krs_box">
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
        <br><br>
		<table width="550" align="center" border="0" cellpadding="0" cellspacing="0" class="krs_box">
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
						<td><?php echo $row['nilai'] ?></td>
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
        <br><br>
        <div align="center">
            
            <img src="img/ttd.png" width="200"><br>
        </div>
        <br><br>
    </div>
    <div style="text-align:center;" class="tc">[<a href="javascript:void()" onclick="print()">CETAK</a>]</div>
    <br><br>
</body>

</html>
