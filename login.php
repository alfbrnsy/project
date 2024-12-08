<?php
// Cek jika login berhasil
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Validasi login Anda (misalnya memeriksa username dan password di database)
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Misalkan login berhasil
    header("Location: home.php"); // Redirect ke halaman home
    exit();
}
?>
