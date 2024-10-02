<?php include('../app/views/partials/navbar.php'); ?>
<div class="container mt-5">
    <h1 class="text-center">Tambah Buku Baru</h1>
    <form action="/library_management_system/public/buku/create" method="POST" class="mt-4">
        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="form-group">
            <label for="penulis">Penulis:</label>
            <input type="text" class="form-control" id="penulis" name="penulis" required>
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
