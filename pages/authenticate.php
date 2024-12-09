<?php
// Start session
session_start();

// Include the database connection file
include_once '../config/database.php'; // Update the path if necessary

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    // Validate input
    if (empty($username) || empty($password) || empty($role)) {
        header('Location: /pages/login.php?error=Empty fields');
        exit();
    }

    // Query to verify the user and their role
    $sql = "SELECT * FROM Users WHERE username = ? AND role = ?";
    $params = array($username, $role);

    // Prepare the SQL statement
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt) {
        // Execute the statement
        if (sqlsrv_execute($stmt)) {
            // Fetch the result
            $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

            // Check if user exists and password matches
            if ($user && password_verify($password, $user['password'])) {
                // Valid credentials, set session variables
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Redirect based on role
                if ($user['role'] === 'mahasiswa') {
                    header('Location: /project/pages/mahasiswa/dashboard.php');
                } elseif ($user['role'] === 'dosen') {
                    header('Location: /project/pages/dosen/dashboard.php');
                }
                exit();
            } else {
                // Invalid credentials
                header('Location: /pages/login.php?error=Invalid credentials');
                exit();
            }
        } else {
            // Log execution errors
            error_log("Execution error: " . print_r(sqlsrv_errors(), true));
            header('Location: /pages/login.php?error=Database error');
            exit();
        }
    } else {
        // Log preparation errors
        error_log("Preparation error: " . print_r(sqlsrv_errors(), true));
        header('Location: /pages/login.php?error=Database preparation error');
        exit();
    }
} else {
    // Redirect to login if accessed without a POST request
    header('Location: /pages/login.php');
    exit();
}
?>
