<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST['tanggal'];
    $jenis = $_POST['jenis'];
    $alasan = $_POST['alasan'];
    $file = $_FILES['file']['name'];

    // Proses penyimpanan data dan upload file (misalnya ke database dan folder tertentu)
    move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $file);
    // Simpan data ke database atau proses lebih lanjut
}
?>
