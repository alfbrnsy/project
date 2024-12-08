<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Pelanggaran</title>
    <link rel="stylesheet" href="../assets/css/hpelanggaran.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <img src="../assets/images/logo.png" alt="Logo JTI" class="logo">
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
                <h1>Histori Pelanggaran</h1>
                <div class="user-info">
                    <span>Satria Rakhmadani</span>
                    <img src="profile.png" alt="Profile Picture" class="profile-pic">
                </div>
            </header>
            <section class="histori-pelanggaran">
                <h2>Daftar Pelanggaran</h2>
                <input type="text" id="search" placeholder="Cari pelanggaran..." class="search-input">

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Pelanggaran</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Terlambat Masuk</td>
                            <td>2024-12-05</td>
                            <td><span class="status pending">Menunggu</span></td>
                            <td><a href="#" class="btn-view">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Melanggar Kode Etik</td>
                            <td>2024-12-02</td>
                            <td><span class="status resolved">Selesai</span></td>
                            <td><a href="#" class="btn-view">Lihat Detail</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Tidak Mengikuti Mata Kuliah</td>
                            <td>2024-11-28</td>
                            <td><span class="status pending">Menunggu</span></td>
                            <td><a href="#" class="btn-view">Lihat Detail</a></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    
</body>
</html>
