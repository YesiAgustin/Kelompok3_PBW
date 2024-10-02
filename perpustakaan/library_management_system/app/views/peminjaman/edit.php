<?php include('../app/views/partials/navbar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Loan Status</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Update Loan Status</h1>
        <form action="/library_management_system/public/peminjaman/update/<?= $data['loan']->id; ?>" method="POST" class="mt-4">
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="dipinjam" <?= $data['loan']->status === 'dipinjam' ? 'selected' : ''; ?>>Borrowed</option>
                    <option value="kembalikan" <?= $data['loan']->status === 'kembalikan' ? 'selected' : ''; ?>>Returned</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_kembalikan">Return Date (if returned):</label>
                <input type="date" id="tanggal_kembalikan" name="tanggal_kembalikan" class="form-control" value="<?= htmlspecialchars($data['loan']->tanggal_kembalikan); ?>">
            </div>

            <button type="submit" class="btn btn-primary">Update Loan</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
