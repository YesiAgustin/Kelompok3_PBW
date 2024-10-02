<?php
class Buku {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllBooks() {
        $this->db->query('SELECT * FROM buku');
        return $this->db->resultSet();
    }

    public function addBook($data) {
        $this->db->query('INSERT INTO buku (judul, penulis, tahun_terbit) VALUES (:judul, :penulis, :tahun_terbit)');
        $this->db->bind(':judul', $data['judul']);
        $this->db->bind(':penulis', $data['penulis']);
        $this->db->bind(':tahun_terbit', $data['tahun_terbit']);
        $this->db->execute();
    }

    public function updateBook($id, $data) {
        $this->db->query('UPDATE buku SET judul = :judul, penulis = :penulis, tahun_terbit = :tahun_terbit WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':judul', $data['judul']);
        $this->db->bind(':penulis', $data['penulis']);
        $this->db->bind(':tahun_terbit', $data['tahun_terbit']);
        $this->db->execute();
    }

    public function deleteBook($id) {
        $this->db->query('DELETE FROM buku WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function getBookById($id) {
        $this->db->query('SELECT * FROM buku WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}
