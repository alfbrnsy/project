document.getElementById('logout-btn').addEventListener('click', function () {
    const confirmLogout = confirm('Apakah Anda yakin ingin logout?');
    if (confirmLogout) {
        window.location.href = '/logout.php'; // Ganti dengan endpoint logout Anda
    }
});
