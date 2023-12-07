<?php
include 'koneksi.php';

if(!empty($_POST["username"])) {

    $query = "SELECT * FROM user WHERE username='" . $_POST["username"] . "'";
    
    $result = mysqli_query($conn, $query);
    
    $count = mysqli_num_rows($result);
    
    if($count>0) {
    
    echo "<span style='color: red'> [username telah digunakan, coba yang lain] </span>";
    echo "<script>$('#submit').prop('disabled', 'true');</script>";
    
    }
}
?>