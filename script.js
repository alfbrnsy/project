// Ambil elemen tombol toggle dan sidebar
const toggleBtn = document.getElementById('toggle-btn');
const sidebar = document.getElementById('sidebar');

// Tambahkan event listener untuk klik tombol
toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('hide'); // Tambahkan atau hapus kelas "hide" pada sidebar
    document.querySelector('.content').classList.toggle('full-width'); // Perluas konten jika sidebar tersembunyi
});
