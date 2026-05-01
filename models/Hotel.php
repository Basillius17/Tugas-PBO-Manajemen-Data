<?php
class Hotel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        return $this->conn->query("SELECT * FROM hotel");
    }

    public function getById($id) {
        return $this->conn->query("SELECT * FROM hotel WHERE id=$id");
    }

    public function create($nama, $lokasi, $bintang, $harga, $fasilitas, $status) {
        return $this->conn->query("INSERT INTO hotel(nama, lokasi, bintang, harga, fasilitas, status)
            VALUES('$nama', '$lokasi', '$bintang', '$harga', '$fasilitas', '$status')");
    }

    public function update($id, $nama, $lokasi, $bintang, $harga, $fasilitas, $status) {
        return $this->conn->query("UPDATE hotel SET
            nama='$nama', lokasi='$lokasi', bintang='$bintang',
            harga='$harga', fasilitas='$fasilitas', status='$status'
            WHERE id=$id");
    }

    public function delete($id) {
        return $this->conn->query("DELETE FROM hotel WHERE id=$id");
    }
}
?>