<?php if (isset($_SESSION['user_id'])): ?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #6a11cb;">
    <a class="navbar-brand text-white" href="#">Library Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="/library_management_system/public/buku/index">Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/library_management_system/public/peminjaman/index">Peminjaman</a>
            </li>
            <?php if ($_SESSION['user_role'] === 'admin'): ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/library_management_system/public/user/index">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/library_management_system/public/buku/create">Add Book</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="/library_management_system/public/login/logout">Logout (<?= htmlspecialchars($_SESSION['user_name']); ?>)</a>
            </li>
        </ul>
    </div>
</nav>
<?php endif; ?>
