<?php
require_once 'database.php';

class Cat {
    private $conn;
    private $db_cat_diary = "cats";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->db_cat_diary;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Metode untuk menambahkan data baru
    public function create($nama, $warna, $ras) {
        $query = "INSERT INTO " . $this->db_cat_diary . " (nama, warna, ras) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $nama);
        $stmt->bindParam(2, $warna);
        $stmt->bindParam(3, $ras);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Metode untuk menghapus data
    public function delete($id) {
        $query = "DELETE FROM " . $this->db_cat_diary . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
