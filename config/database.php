<?php

class Database {
    private $serverName = "LAPTOP-CQ7PSFUN";
    private $connectionInfo = array("Database" => "si_tata_tertib");
    private $conn;

    public function connect() {
        $this->conn = sqlsrv_connect($this->serverName, $this->connectionInfo);
        if ($this->conn === false) {
            $this->logError(sqlsrv_errors());
            die("Terjadi kesalahan saat menghubungkan ke database. Silakan coba lagi.");
        }
        return $this->conn;
    }

    public function close() {
        sqlsrv_close($this->conn);
    }

    private function logError($errors) {
        // Implement your error logging here
    }
}
?>