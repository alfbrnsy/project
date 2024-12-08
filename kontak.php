<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Kirim email atau simpan pesan ke database
    mail('admin@example.com', 'Pesan Kontak', $message, "From: $email");
    echo "Pesan terkirim!";
}
?>
