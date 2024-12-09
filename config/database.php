<?php

// Konfigurasi koneksi database
<<<<<<< HEAD
$serverName = "HUSEIN"; // Nama server
=======
$serverName = "LAPTOP-CQ7PSFUN"; // Nama server
>>>>>>> 12428f7cccea32ae887ea0195af22df1e1d31e07
$connectionInfo = array("Database" => "si_tata_tertib"); // Nama database
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Cek koneksi
if ($conn === false) {
    // Log error ke file
    logError(sqlsrv_errors());

    // Berikan pesan error kepada pengguna
    die("Terjadi kesalahan saat menghubungkan ke database. Silakan coba lagi.");
}




// 2nd way

// Database connection settings
// $serverName = "HUSEIN";
// $database = "si_tata_tertib";
// $username = "sa";
// $password = "database";

// try {
//     // Create a PDO connection
//     $dsn = "sqlsrv:Server=$serverName;Database=$database";
//     $conn = new PDO($dsn, $username, $password);

//     // Set error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully!";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

?>

