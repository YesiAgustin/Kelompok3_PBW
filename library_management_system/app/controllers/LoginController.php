<?php
class LoginController extends Controller
{
    public function index($errorMessage = null)
    {

        // Pass error message to the view, if any
        $data['error'] = $errorMessage;

        // Load the login view
        $this->view('login/index', $data);
    }

    public function authenticate()
    {
        // Start the session at the beginning

        $pengguna = $this->model('Pengguna');
        $nama = $_POST['nama'];
        $sandi = $_POST['sandi'];

        // Authenticate user
        $user = $pengguna->getUserByName($nama);

        if ($user && $sandi == $user->sandi) {
            // Set session variables
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_role'] = $user->peran;
            $_SESSION['user_name'] = $user->nama;
            // Redirect to the public area after successful login
            header('Location: /library_management_system/public/buku/index');
            exit(); // Stop the script after the redirect
        } else {
            // If login fails, reload login page with an error message
            $this->index("Login failed: Invalid username or password.");
        }
    }

    public function logout()
    {
        // Start session to ensure session is active before destroying it
        session_start();

        // Clear session data
        session_unset();
        session_destroy();

        // Redirect to the login page
        header('Location: /library_management_system/public/login/index');
        exit();
    }
}
