<?php include('../app/views/partials/navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Buku</h1>
        <a href="/library_management_system/public/buku/create" class="btn btn-success mb-3">Tambah Buku Baru</a>

        <table class="table table-bordered">
            <thead>
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
