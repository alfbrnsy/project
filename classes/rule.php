<?php
require_once __DIR__ . '/../vendor/autoload.php';

namespace Classes;

use Classes\Database; // Import the Database class

class Rule {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getAllRules() {
        $result = $this->db->query("SELECT * FROM rules");
        $rules = [];
        while ($row = $result->fetch_assoc()) {
            $rules[] = $row;
        }
        return $rules;
    }

    public function addRule($title, $description) {
        $stmt = $this->db->prepare("INSERT INTO rules (title, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $description);
        return $stmt->execute();
    }

    public function deleteRule($id) {
        $stmt = $this->db->prepare("DELETE FROM rules WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
