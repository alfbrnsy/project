<?php
// Start session
session_start();

// Check if the user is logged in and is a mahasiswa
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mahasiswa') {
    header('Location: /pages/login.php');
    exit();
}

// Include the database connection file
include_once '../../config/database.php';

// Get user details
$user_id = $_SESSION['user_id'];

$sql = "SELECT name FROM Mahasiswa WHERE id_mahasiswa = ?";
$params = array($user_id);
$stmt = sqlsrv_prepare($conn, $sql, $params);

if ($stmt) {
    sqlsrv_execute($stmt);
    $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $username = $user['name'];
} else {
    error_log("Error fetching user data: " . print_r(sqlsrv_errors(), true));
    header('Location: /pages/login.php?error=Database error');
    exit();
}

include '../../includes/header.php';
?>

<div class="container my-5">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?> (Mahasiswa)</h2>
    <p>Access your dashboard below.</p>
    <!-- Dashboard content -->
</div>

<?php include '../../includes/footer.php'; ?>
