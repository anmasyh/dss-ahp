<?php

error_reporting(0);
include ('koneksi.php');

//crud kriteria
if (isset($_POST['tambahkt'])) {
   $tambahkt = mysqli_query($conn, "INSERT INTO kriteria VALUES ('','$_POST[nama]')");
}

if ($tambahkt) {
    echo "<script>
    document.location='kriteria.php';
    </script>";
}

if (isset($_POST['ubahkt'])) {
    $ubahkt = mysqli_query($conn, "UPDATE kriteria SET nama='$_POST[nama]' WHERE id=$_POST[id]");
}

if ($ubahkt) {
    echo "<script>
    document.location='kriteria.php';
    </script>";
}


if (isset($_POST['hapuskt'])) {
    $hapuskt = mysqli_query($conn, "DELETE FROM kriteria WHERE id = '$_POST[id]'");
}

if ($hapuskt) {
    echo "<script>
    document.location='kriteria.php';
    </script>";
}

//crud alternatif
if (isset($_POST['tambahalt'])) {
    $tambahalt = mysqli_query($conn, "INSERT INTO alternatif VALUES ('','$_POST[no_kk]','$_POST[nama]','$_POST[alamat]')");
}

if ($tambahalt) {
    echo "<script>
    document.location='alternatif.php';
    </script>";
}


if (isset($_POST['ubahalt'])) {
    $ubahalt = mysqli_query($conn, "UPDATE alternatif SET no_kk='$_POST[no_kk]', nama='$_POST[nama]', alamat='$_POST[alamat]' WHERE id='$_POST[id]'");
}

if ($ubahalt) {
    echo "<script>
    document.location='alternatif.php';
    </script>";
}


if (isset($_POST['hapusalt'])) {
    $hapusalt = mysqli_query($conn, "DELETE FROM alternatif WHERE id = '$_POST[id]'");
}

if ($hapusalt) {
    echo "<script>
    document.location='alternatif.php';
    </script>";
}

//crud user
$password = $_POST['password'];
$pwhash = password_hash($password, PASSWORD_DEFAULT);
if (isset($_POST['tambahuser'])) {
    $tambahuser = mysqli_query($conn, "INSERT INTO user VALUES ('','$_POST[nama]','$_POST[username]','$pwhash')");
}

if ($tambahuser) {
    echo "<script>
    document.location='user.php';
    </script>";
}

$password = $_POST['password'];
$pwhash = password_hash($password, PASSWORD_DEFAULT);
if (isset($_POST['ubahuser'])) {
    $ubahuser = mysqli_query($conn, "UPDATE user SET nama='$_POST[nama]', username='$_POST[username]', password='$pwhash' WHERE id='$_POST[id]'");
}

if ($ubahuser) {
    echo "<script>
    document.location='user.php';
    </script>";
}


if (isset($_POST['hapususer'])) {
    $hapususer = mysqli_query($conn, "DELETE FROM user WHERE id = '$_POST[id]'");
}

if ($hapususer) {
    echo "<script>
    document.location='user.php';
    </script>";
}

//crud hapus data
if (isset($_POST['hapusdt'])) {
    $hapusdt = mysqli_query($conn, "DELETE perbandingan_alternatif, perbandingan_kriteria, pv_alternatif, pv_kriteria, ranking
                                    FROM perbandingan_alternatif, perbandingan_kriteria, pv_alternatif, pv_kriteria, ranking");
}

if ($hapusdt) {
    echo "<script>
    document.location='hasil.php';
    </script>";
}

?>