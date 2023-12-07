<?php
	// connection
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'spk_ahp1';

	$conn = mysqli_connect($host,$username,$password);

	if (!$conn)
	{
		echo "Tidak dapat terkoneksi dengan server";
		exit();
	}

	if(!mysqli_select_db($conn, $database))
	{
		echo "Tidak dapat menemukan database";
		exit();
	}
?>