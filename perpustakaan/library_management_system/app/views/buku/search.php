<?php include('../app/views/partials/navbar.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cari Buku</title>
</head>
<body>
    <h1>Cari Buku</h1>
    <form action="/buku/search" method="post">
        <label for="keyword">Kata Kunci:</label><br>
        <input type="text" id="keyword" name="keyword" required><br><br>
        <button type="submit">Cari</button>
    </form>

    <?php if (isset($data['books']) && count($data['books']) > 0): ?>
        <h2>Hasil Pencarian</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
            </tr>
            <?php foreach ($data['books'] as $book) : ?>
                <tr>
                    <td><?php echo $book->id; ?></td>
                    <td><?php echo $book->judul; ?></td>
                    <td><?php echo $book->penulis; ?></td>
                    <td><?php echo $book->tahun_terbit; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif (isset($data['books'])): ?>
        <p>Tidak ada hasil pencarian untuk kata kunci yang dimasukkan.</p>
    <?php endif; ?>
</body>
</html>
