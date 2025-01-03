<?php
session_start();
require_once '../../config/Database.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['id_lecturer'])) {
    header('Location: ../../logintt.html'); // Redirect to login page if not logged in
    exit;
}

$id_lecturer = $_SESSION['id_lecturer']; // Get logged-in lecturer's ID

// Create a Database object and get the connection
$db = new Database();
$conn = $db->connect();

// Fetch data for the current lecturer
$sql = "SELECT * FROM tb_lecturer WHERE id_lecturer = ?";
$params = [$id_lecturer];
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true)); // Handle query errors
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Tatib Mahasiswa</title>
    <link rel="stylesheet" href="../../assets/css/dashboarddosen.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="../../assets/images/favicon.png" type="image/png">
</head>

<body>

    <div class="dashboard">
        <!--Sidebar Javascript-->
        <div class="sidebar">
            <div>
                <div class="logo">
                    <img src="../../assets/images/logo.png" alt="Logo JTI">
                    <h2>Tata Tertib JTI</h2>
                </div>
                <ul class="menu">
                    <li class="active"><span class="material-icons">home</span><a href="dashboarddosen.php">Halaman Awal</a></li>
                    <li><span class="material-icons">list</span><a href="tatibdosen.html">Daftar Tata Tertib</a></li>
                    <li><span class="material-icons">description</span><a href="laporpel.html">Lapor Pelanggaran</a></li>
                    <li><span class="material-icons">help</span><a href="validasipel.html"> Validasi Pelanggaran</a></li>
                </ul>
            </div>
            <div class="copyright">
                <h6>2024 - Jurusan Teknologi Informasi <br>
                    Politeknik Negeri Malang</h6>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <div class="top-header">
                    <h1>Selamat Datang, Dosen...</h1>
                    <div class="profile-area">
                        <img src="../../assets/images/profile.png" alt="Foto Profil" class="profile-photo">
                        <span class="profile-name">Moch Zawaruddin Abdullah</span>
                        <div class="logout-menu">
                            <button id="logout-btn">Logout</button>
                        </div>
                    </div>
                </div>
                <h2>Moch Zawaruddin Abdullah, S.ST., M.Kom.</h2>
                <div class="user-details">
                
            
                </div>
                <div class="welcome-box">
                    <img src="../../assets/images/book.png" alt="Book Icon">
                    <p>
                        Selamat datang di Dashboard Tata Tertib Dosen. Platform ini mempermudah <br>
                        pengelolaan tata tertib, pencatatan pelanggaran, dan pemantauan kepatuhan <br>
                        mahasiswa untuk mendukung lingkungan belajar yang kondusif.
                    </p>
                </div>
            </header>

        </div>
    </div>

</body>

</html>