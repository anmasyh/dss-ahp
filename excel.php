<?php
require 'vendor/autoload.php';
require 'koneksi.php';

if (isset($_POST['submit'])) {
    $err = "";
    $ekstensi = "";
    $success = "";

    $file_name = $_FILES['filexls']['name']; //get nama file yg diupload
    $file_data = $_FILES['filexls']['tmp_name']; //get temporary data

    if (empty($file_name)) {
        $err .= "<li>Silahkan input file terlebih dahulu.</li>";
    }else {
        $ekstensi = pathinfo($file_name)['extension'];
    }

    $ekstensi_allowed = array("xls","xlsx");
    if (!in_array($ekstensi,$ekstensi_allowed)) {
        $err .= "<li>Silahkan masukkan file tipe xls atau xlsx. File yang anda input <b>$file_name</b> punya tipe
         <b>$ekstensi</b></li>";
    }

    if (empty($err)) {
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $jumlahData=0;
        for ($i=1; $i <count($sheetData) ; $i++) {
            $no_kk = $sheetData[$i]['1'];
            $nama = $sheetData[$i]['2'];
            $alamat = $sheetData[$i]['3'];

            #echo "$no_kk - $nama - $alamat<br>";
            $sql1 = "INSERT INTO alternatif VALUES ('','$no_kk','$nama','$alamat')";
            mysqli_query($conn, $sql1);

            $jumlahData++;
        }
        if ($jumlahData>0) {
            $success .= "<li>$jumlahData data berhasil dimasukkan ke database</li>";
        }
    }

    if ($err) {
        ?>
        <div class="alert alert-danger">
            <ul><?php echo $err ?></ul>
        </div>
        <?php
    }

    if ($success) {
        ?>
        <div class="alert alert-success">
        <ul><?php echo $success ?></ul>
        </div>
        <?php
    }
}