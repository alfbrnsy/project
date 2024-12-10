<?php
require_once '../config/database.php'; // Include your database connection

// Fetch all rules from the database
$sql = "SELECT * FROM tb_rules ORDER BY id_rules";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true)); // Handle errors
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Tata Tertib</title>
    <link rel="stylesheet" href="../assets/css/panduttstyle.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <img src="logo.png" alt="Logo JTI" class="logo">
            <ul class="menu">
                <li><a href="#">🏠 Halaman Awal</a></li>
                <li><a href="#">🚩 Pelanggaran Tata Tertib</a></li>
                <li><a href="#">📄 Pengajuan Surat Izin</a></li>
                <li><a href="#">🔄 Pengajuan Kompensasi</a></li>
                <li><a href="#">🔔 Notifikasi</a></li>
                <li><a href="#">📜 Histori Pelanggaran</a></li>
                <li><a href="#">📞 Kontak</a></li>
                <li><a href="#">📖 Panduan Tata Tertib</a></li>
            </ul>
            <footer>
                <p>2024 - Jurusan Teknologi Informasi<br>Politeknik Negeri Malang</p>
            </footer>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <header class="header">
                <h1>Panduan Tata Tertib</h1>
                <div class="user-info">
                    <span>Satria Rakhmadani</span>
                    <img src="profile.png" alt="Profile Picture" class="profile-pic">
                </div>
            </header>

            <section class="guidelines">
                <h2>Daftar Tata Tertib</h2>
                <p>Berikut adalah daftar tata tertib yang berlaku di Jurusan Teknologi Informasi:</p>

                <!-- Dynamic Table -->
                <table border="1" class="rules-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
                            <tr>
                                <td><?= $row['id_rules'] ?></td>
                                <td><?= htmlspecialchars($row['description']) ?></td>
                                <td><?= htmlspecialchars($row['category']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
