<?php
require_once '../../config/database.php'; // Include your database connection

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
    <link rel="stylesheet" href="../../assets/css/panduttstyle.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="../../assets/images/favicon.png" type="image/png">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="../../assets/images/logo.png" alt="Logo JTI" width="180px">
                <h2>Tata Tertib JTI</h2>
            </div>
            <ul class="menu">
                <li><span class="material-icons">home</span><a href="dashboard.html"> Halaman Awal</a> </li>
                <li><span class="material-icons">list</span><a href="ptatatertib.php"> Pelanggaran Tata Tertib</a> </li>
                <li><span class="material-icons">notifications</span><a href="notifikasi.html"> Notifikasi</a> </li>
                <li><span class="material-icons">contact_support</span><a href="kontak.html"> Kontak</a> </li>
                <li class="active" ><span class="material-icons">help</span><a href="pandutt.php"> Panduan Tata Tertib</a> </li>
            </ul>
            <div class="copyright">
                <h6>2024 Jurusan Teknologi Informasi <br>
                Politeknik Negeri Malang</h6>
            </div>
        </div>

        <!-- Main Content -->
        <main class="content">
            <header class="header">
                <h1>Panduan Tata Tertib</h1>
                <div class="user-info">
                   
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
