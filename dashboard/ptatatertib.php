<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggaran Tata Tertib</title>
    <link rel="stylesheet" href="../assets/css/ptatatertib.css">
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
                <h1>Pelanggaran Tata Tertib</h1>
                <div class="user-info">
                    <span>Satria Rakhmadani</span>
                    <img src="profile.png" alt="Profile Picture" class="profile-pic">
                </div>
            </header>
            <section class="tata-tertib">
                <h2>Daftar Pelanggaran</h2>
                <table class="tabel-pelanggaran">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Pelanggaran</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Keterlambatan</td>
                            <td>Terlambat hadir pada kuliah pagi</td>
                            <td>2024-12-01</td>
                            <td><span class="status-warn">Peringatan</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Pelanggaran Kode Etik</td>
                            <td>Menggunakan HP di ruang kelas</td>
                            <td>2024-12-02</td>
                            <td><span class="status-done">Selesai</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Tidak Mengumpulkan Tugas</td>
                            <td>Tugas tidak dikumpulkan tepat waktu</td>
                            <td>2024-12-05</td>
                            <td><span class="status-pending">Menunggu Verifikasi</span></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
