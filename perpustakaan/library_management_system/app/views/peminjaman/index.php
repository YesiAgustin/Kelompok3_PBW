<?php include('../app/views/partials/navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Loans</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Manage Peminjaman</h1>
        <a href="/library_management_system/public/peminjaman/create" class="btn btn-success mb-3">Create New Loan</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book</th>
                    <th>User</th>
                    <th>Date Borrowed</th>
                    <th>Date Returned</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['loans'] as $loan): ?>
                    <tr>
                        <td><?= htmlspecialchars($loan->id); ?></td>
                        <td><?= htmlspecialchars($loan->judul); ?></td>
                        <td><?= htmlspecialchars($loan->nama); ?></td> <!-- User's name -->
                        <td><?= htmlspecialchars($loan->tanggal_dipinjam); ?></td>
                        <td><?= htmlspecialchars($loan->tanggal_kembalikan ? $loan->tanggal_kembalikan : 'Not returned'); ?></td>
                        <td><?= htmlspecialchars($loan->status); ?></td>
                        <td>
                            <?php if ($_SESSION['user_role'] === 'admin'): ?>
                                <a href="/library_management_system/public/peminjaman/update/<?= $loan->id; ?>" class="btn btn-warning btn-sm">Update</a>
                                <a href="/library_management_system/public/peminjaman/delete/<?= $loan->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                            <?php else: ?>
                                No Actions Available
                            <?php endif; ?>
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
