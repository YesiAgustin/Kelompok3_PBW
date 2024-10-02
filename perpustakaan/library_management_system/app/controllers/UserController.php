<?php
class UserController extends Controller {
    public function __construct() {
        // Only allow admin users
        $this->checkAuth();
        if ($_SESSION['user_role'] !== 'admin') {
            echo "Access denied.";
            exit();
        }
    }

    public function index() {
        $pengguna = $this->model('Pengguna');
        $data['users'] = $pengguna->getAllUsers();
        $this->view('user/index', $data);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nama' => $_POST['nama'],
                'sandi' => $_POST['sandi'],
                'peran' => $_POST['peran']
            ];
            $pengguna = $this->model('Pengguna');
            $pengguna->createUser($data);
            header('Location: /library_management_system/public/user/index');
        }
        $this->view('user/create');
    }

    public function delete($id) {
        $pengguna = $this->model('Pengguna');
        $pengguna->deleteUser($id);
        header('Location: /library_management_system/public/user/index');
    }
}
