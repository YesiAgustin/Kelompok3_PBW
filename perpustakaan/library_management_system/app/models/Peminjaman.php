<?php
class Peminjaman {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all loans (for admins)
    public function getAllLoans() {
        $this->db->query('SELECT p.*, b.judul, u.nama FROM peminjaman p 
                          JOIN buku b ON p.id_buku = b.id 
                          JOIN pengguna u ON p.id_pengguna = u.id');
        return $this->db->resultSet();
    }

    // Get loans by user ID (for regular users)
    public function getLoansByUserId($userId) {
        $this->db->query('SELECT p.*, b.judul FROM peminjaman p 
                          JOIN buku b ON p.id_buku = b.id 
                          WHERE p.id_pengguna = :id_pengguna');
        $this->db->bind(':id_pengguna', $userId);
        return $this->db->resultSet();
    }

    // Create a new loan
    public function createLoan($data) {
        $this->db->query('INSERT INTO peminjaman (id_pengguna, id_buku, tanggal_dipinjam, status) 
                          VALUES (:id_pengguna, :id_buku, :tanggal_dipinjam, :status)');
        $this->db->bind(':id_pengguna', $data['id_pengguna']);
        $this->db->bind(':id_buku', $data['id_buku']);
        $this->db->bind(':tanggal_dipinjam', $data['tanggal_dipinjam']);
        $this->db->bind(':status', 'dipinjam'); // Default status is 'dipinjam'
        return $this->db->execute();
    }

    // Update a loan (admin-only)
    public function updateLoan($id, $data) {
        $this->db->query('UPDATE peminjaman SET status = :status, tanggal_kembalikan = :tanggal_kembalikan WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':tanggal_kembalikan', $data['tanggal_kembalikan']);
        return $this->db->execute();
    }

    // Delete a loan (admin-only)
    public function deleteLoan($id) {
        $this->db->query('DELETE FROM peminjaman WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
