<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Surat Izin</title>
    <link rel="stylesheet" href="../assets/css/psuratizin.css">
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
                <h1>Pengajuan Surat Izin</h1>
                <div class="user-info">
                    <span>Satria Rakhmadani</span>
                    <img src="profile.png" alt="Profile Picture" class="profile-pic">
                </div>
            </header>
            <section class="form-izin">
                <h2>Form Pengajuan Surat Izin</h2>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <label for="tanggal">Tanggal Izin:</label>
                    <input type="date" id="tanggal" name="tanggal" required>

                    <label for="jenis">Jenis Izin:</label>
                    <select id="jenis" name="jenis" required>
                        <option value="sakit">Sakit</option>
                        <option value="alpha">Alpha</option>
                        <option value="kompensasi">Kompensasi</option>
                    </select>

                    <label for="alasan">Alasan Izin:</label>
                    <textarea id="alasan" name="alasan" rows="4" placeholder="Tuliskan alasan izin..." required></textarea>

                    <label for="file">Upload Surat Izin (jika ada):</label>
                    <input type="file" id="file" name="file">

                    <button type="submit" class="btn-submit">Ajukan Surat Izin</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
