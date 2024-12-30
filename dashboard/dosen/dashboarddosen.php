<?php
session_start();
require_once '../../config/Database.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['id_lecturer'])) {
    header('Location: ../../logintt.html'); // Redirect to login page if not logged in
    exit;
}

$id_lecturer = $_SESSION['id_lecturer']; // Get logged-in lecturer's ID

// Create a Database object and get the connection
$db = new Database();
$conn = $db->connect();

// Fetch data for the current lecturer
$sql = "SELECT * FROM tb_lecturer WHERE id_lecturer = ?";
$params = [$id_lecturer];
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true)); // Handle query errors
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <link rel="stylesheet" href="../../assets/css/dashboarddosen.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="../../assets/images/favicon.png" type="image/png">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="../../assets/images/logo.png" alt="Logo JTI" style="width:175px">
                <h2>Dashboard Dosen</h2>
            </div>
            <!-- Add the rest of your HTML content here -->
        </div>
    </div>
</body>
</html>