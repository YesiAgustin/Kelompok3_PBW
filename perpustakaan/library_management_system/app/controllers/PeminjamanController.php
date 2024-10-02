<?php
class PeminjamanController extends Controller {
    public function __construct() {
        $this->checkAuth(); // Ensure the user is logged in
    }

    // Admin and regular users will both access this
    public function index() {
        $peminjaman = $this->model('Peminjaman');
        
        if ($_SESSION['user_role'] === 'admin') {
            // Admin: Can view all loans
            $data['loans'] = $peminjaman->getAllLoans();
        } else {
            // Regular user: Only view their own loans
            $data['loans'] = $peminjaman->getLoansByUserId($_SESSION['user_id']);
        }

        $this->view('peminjaman/index', $data);
    }

    // Create a new loan (user can only add, admin can also add)
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_pengguna' => $_SESSION['user_id'],
                'id_buku' => $_POST['id_buku'],
                'tanggal_dipinjam' => date('Y-m-d')
            ];

            $peminjaman = $this->model('Peminjaman');
            $peminjaman->createLoan($data);
            header('Location: /library_management_system/public/peminjaman/index');
        }

        // Show book selection form
        $buku = $this->model('Buku');
        $data['books'] = $buku->getAllBooks();
        $this->view('peminjaman/create', $data);
    }

    // Admin: Update loan status (e.g., return the book)
    public function update($id) {
        if ($_SESSION['user_role'] !== 'admin') {
            echo "Unauthorized access!";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'status' => $_POST['status'],
                'tanggal_kembalikan' => $_POST['tanggal_kembalikan']
            ];

            $peminjaman = $this->model('Peminjaman');
            $peminjaman->updateLoan($id, $data);
            header('Location: /library_management_system/public/peminjaman/index');
        }

        // Get loan data to display in the form
        $peminjaman = $this->model('Peminjaman');
        $data['loan'] = $peminjaman->getLoanById($id);
        $this->view('peminjaman/edit', $data);
    }

    // Admin: Delete a loan
    public function delete($id) {
        if ($_SESSION['user_role'] !== 'admin') {
            echo "Unauthorized access!";
            return;
        }

        $peminjaman = $this->model('Peminjaman');
        $peminjaman->deleteLoan($id);
        header('Location: /library_management_system/public/peminjaman/index');
    }
}
