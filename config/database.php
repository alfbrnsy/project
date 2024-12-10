<?php

// Konfigurasi koneksi database
<<<<<<< HEAD
$serverName = "HUSEIN"; // Nama server
=======
$serverName = "VICTUS\DBMSALDO"; // Nama server
>>>>>>> 17a502dfefb12574709b37092a73c7ab30663d3f
$connectionInfo = array("Database" => "si_tata_tertib"); // Nama database
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Cek koneksi
if ($conn === false) {
    // Log error ke file
    logError(sqlsrv_errors());

    // Berikan pesan error kepada pengguna
    die("Terjadi kesalahan saat menghubungkan ke database. Silakan coba lagi.");
}


?>

