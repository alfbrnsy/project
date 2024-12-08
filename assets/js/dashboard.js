// Menangani ketika ikon kontak di klik
document.getElementById('contact-icon').addEventListener('click', function() {
    openPopup();
});

// Fungsi untuk membuka pop-up
function openPopup() {
    document.getElementById('popup').classList.add('slide-in');
    document.getElementById('popup-overlay').style.display = 'block';
}

// Fungsi untuk menutup pop-up
function closePopup() {
    document.getElementById('popup').classList.add('slide-out');
    document.getElementById('popup-overlay').style.display = 'none';
    setTimeout(function() {
        document.getElementById('popup').classList.remove('slide-out');
    }, 300); // Waktu untuk animasi selesai
}
