<?php include('../app/views/partials/navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-success {
            background-color: #6a11cb;
            border: none;
        }
        .btn-success:hover {
            background-color: #5c0a9a;
        }
        .btn-warning {
            background-color: #f0ad4e;
            border: none;
        }
        .btn-danger {
            background-color: #d9534f;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Buku</h1>
        <a href="/library_management_system/public/buku/create" class="btn btn-success mb-3">Tambah Buku Baru</a>

        <table class="table table-bordered table-hover bg-white">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['books'] as $book): ?>
                    <tr>
                        <td><?= htmlspecialchars($book->id); ?></td>
                        <td><?= htmlspecialchars($book->judul); ?></td>
                        <td><?= htmlspecialchars($book->penulis); ?></td>
                        <td><?= htmlspecialchars($book->tahun_terbit); ?></td>
                        <td>
                            <a href="/library_management_system/public/buku/edit/<?= $book->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/library_management_system/public/buku/delete/<?= $book->id; ?>" method="POST" style="display:inline;">
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
