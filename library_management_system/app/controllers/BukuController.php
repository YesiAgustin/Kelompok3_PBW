<?php
class BukuController extends Controller
{

    public function index()
    {
        $buku = $this->model('Buku');
        $data['books'] = $buku->getAllBooks();
        $this->view('buku/index', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $buku = $this->model('Buku');
            $data = [
                'judul' => $_POST['judul'],
                'penulis' => $_POST['penulis'],
                'tahun_terbit' => $_POST['tahun_terbit']
            ];
            $buku->addBook($data);
            header('Location: /library_management_system/public/buku/index');
        } else {
            $this->view('buku/create');
        }
    }

    public function edit($id)
    {
        echo "Book ID: " . $id;
        $buku = $this->model('Buku');
        $data['book'] = $buku->getBookById($id);

        if (!$data['book']) {
            die('Book not found');
        }

        $this->view('buku/edit', $data);
    }



    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $buku = $this->model('Buku');
            $data = [
                'judul' => $_POST['judul'],
                'penulis' => $_POST['penulis'],
                'tahun_terbit' => $_POST['tahun_terbit']
            ];
            $buku->updateBook($id, $data);
            header('Location: /library_management_system/public/buku/index');
        }
    }

    public function delete($id)
    {
        $buku = $this->model('Buku');
        $buku->deleteBook($id);
        header('Location: /library_management_system/public/buku/index');
    }
}
