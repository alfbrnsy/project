<?php

require_once 'Database.php';

class User {
    private $db;
    private $conn;

    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->connect();
    }

    public function getConnection() {
        return $this->conn;
    }

    public function updatePassword($username, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE tb_users SET password = ? WHERE username = ?";
        $params = array($hashedPassword, $username);
        $stmt = sqlsrv_query($this->conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
            echo "Password updated successfully.";
        }
    }

    public function __destruct() {
        $this->db->close();
    }
}
?>