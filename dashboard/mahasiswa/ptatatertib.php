<?php
session_start();
require_once '../../config/database.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['id_student'])) {
    header('Location: ../../logintt.html'); // Redirect to login page if not logged in
    exit;
}

$id_student = $_SESSION['id_student']; // Get logged-in student's ID

// Fetch tb_report data for the current student
$sql = "SELECT * FROM tb_report WHERE id_student = ? ORDER BY id_report DESC";
$params = [$id_student];
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
    <title>Pelanggaran Tata Tertib</title>
    <link rel="stylesheet" href="../../assets/css/ptatatertib.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="../../assets/images/favicon.png" type="image/png">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="../../assets/images/logo.png" alt="Logo JTI" style="width:175px">
                <h2>Tata Tertib JTI</h2>
            </div>  
            <ul class="menu">
                <li ><span class="material-icons">home</span><a href="dashboard.html"> Halaman Awal</a> </li>
                <li class="active" ><span class="material-icons">list</span><a href="ptatatertib.php"> Pelanggaran Tata Tertib</a> </li>
                <li><span class="material-icons">notifications</span><a href="notifikasi.html"> Notifikasi</a> </li>
                <li><span class="material-icons">contact_support</span><a href="kontak.html"> Kontak</a> </li>
                <li><span class="material-icons">help</span><a href="pandutt.php"> Panduan Tata Tertib</a> </li>
            </ul>
            <div class="copyright">
                <h6>2024 Jurusan Teknologi Informasi <br>
                Politeknik Negeri Malang</h6>
            </div>
        </div>

        <!-- Main Content -->
        <main class="content">
            <header class="header">
                <h1>Pelanggaran Tata Tertib</h1>
            </header>
            <section class="tata-tertib">
                <h2>Daftar Pelanggaran</h2>
                <table class="tabel-pelanggaran">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Pelanggaran</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1; // Row counter
                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): 
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['violation_details']) ?></td>
                                <td><?= htmlspecialchars($row['proof'] ?: 'Tidak Ada Bukti') ?></td>
                                <td><?= htmlspecialchars($row['status'] ?: 'Pending') ?></td>
                                <td>
                                    <?php
                                    if ($row['status'] === 'pending') {
                                        echo '<span class="status-pending">Menunggu Verifikasi</span>';
                                    } elseif ($row['status'] === 'verified') {
                                        echo '<span class="status-done">Selesai</span>';
                                    } elseif ($row['status'] === 'rejected') {
                                        echo '<span class="status-warn">Ditolak</span>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
