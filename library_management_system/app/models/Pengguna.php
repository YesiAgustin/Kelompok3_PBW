<?php
class Pengguna {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUserByName($nama) {
        $this->db->query('SELECT * FROM pengguna WHERE nama = :nama');
        $this->db->bind(':nama', $nama);
        return $this->db->single();
    }

    public function createUser($data) {
        $this->db->query('INSERT INTO pengguna (nama, sandi, peran) VALUES (:nama, :sandi, :peran)');
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':sandi', password_hash($data['sandi'], PASSWORD_DEFAULT));
        $this->db->bind(':peran', $data['peran']);
        return $this->db->execute();
    }

    public function getAllUsers() {
        $this->db->query('SELECT * FROM pengguna');
        return $this->db->resultSet();
    }

    public function deleteUser($id) {
        $this->db->query('DELETE FROM pengguna WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
