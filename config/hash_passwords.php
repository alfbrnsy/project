<?php

require_once 'Database.php';
require_once 'User.php';

class PasswordHasher {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function hashPasswords() {
        // Fetch all users
        $sql = "SELECT id_user, username, password FROM tb_users";
        $stmt = sqlsrv_query($this->conn, $sql);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $id_user = $row['id_user'];
            $username = $row['username'];
            $plainPassword = $row['password'];

            // Check if the password is already hashed
            if (!password_get_info($plainPassword)['algo']) {
                // Hash the password
                $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

                // Update the password in the database
                $updateSql = "UPDATE tb_users SET password = ? WHERE id_user = ?";
                $params = array($hashedPassword, $id_user);
                $updateStmt = sqlsrv_query($this->conn, $updateSql, $params);

                if ($updateStmt === false) {
                    die(print_r(sqlsrv_errors(), true));
                } else {
                    echo "Password for user $username has been hashed and updated successfully.<br>";
                }
            } else {
                echo "Password for user $username is already hashed.<br>";
            }
        }
    }

    public function __destruct() {
        sqlsrv_close($this->conn);
    }
}

// Run the password hasher
$hasher = new PasswordHasher();
$hasher->hashPasswords();

?>