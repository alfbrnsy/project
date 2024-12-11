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
            // Store user details in the session
            $_SESSION['id_user'] = $user['id_user']; // for general user
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Check for lecturer role and store id_lecturer in session
            if ($user['role'] === 'dosen') {
                $_SESSION['id_lecturer'] = $user['id_user']; // Store lecturer's ID
                header("Location: dosen/dashboarddosen.html");
            } elseif ($user['role'] === 'mahasiswa') {
                // Fetch id_student if the user is a student
                $sqlStudent = "SELECT id_student FROM tb_student WHERE id_student = ?";
                $stmtStudent = sqlsrv_query($conn, $sqlStudent, array($user['id_user']));

                if ($stmtStudent && $studentRow = sqlsrv_fetch_array($stmtStudent, SQLSRV_FETCH_ASSOC)) {
                    $_SESSION['id_student'] = $studentRow['id_student'];
                    header("Location: mahasiswa/dashboard.html");
                } else {
                    // Handle case where id_student is not found
                    header("Location: ../logintt.html?error=User%20role%20data%20not%20found");
                }
            } elseif ($user['role'] === 'kps') {
                header("Location: kps/dashboardkps.html");
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
    // Handle direct access to this file
    header("Location: ../logintt.html");
    exit();
}
?>
