<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($username) || empty($password)) {
        header("Location: ../logintt.html?error=Harap%20isi%20semua%20field");
        exit();
    }

    // Query to find the user
    $sql = "SELECT * FROM tb_users WHERE username = ?";
    $params = array($username);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt && sqlsrv_has_rows($stmt)) {
        $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        // Verify the password (plain text comparison)
        if ($user['password'] === $password) {
            // Start user session
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if ($user['role'] === 'dosen') {
                header("Location: dosen/dashboarddosen.html");
            } elseif ($user['role'] === 'mahasiswa') {
                header("Location: mahasiswa/dashboard.html");
            }
            exit();
        } else {
            // Password does not match
            header("Location: ../logintt.html?error=Invalid%20username%20or%20password");
            exit();
        }
    } else {
        // User not found
        header("Location: ../logintt.html?error=Invalid%20username%20or%20password");
        exit();
    }
} else {
    header("Location: ../logintt.html");
    exit();
}
?>
