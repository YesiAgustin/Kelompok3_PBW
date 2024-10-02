<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 12px;
            background-color: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        h1 {
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
        }
        .form-control {
            border-radius: 30px;
            padding: 10px 20px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 10px rgba(106, 17, 203, 0.1);
        }
        .btn-primary {
            background-color: #6a11cb;
            border-radius: 30px;
            padding: 10px;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #5c0a9a;
            transform: translateY(-3px);
        }
        .alert-danger {
            background-color: #ff4d4d;
            color: white;
        }
        .login-container form {
            margin-bottom: 0;
        }
        .forgot-password {
            display: block;
            text-align: right;
            font-size: 14px;
            margin-top: 10px;
        }
        .forgot-password a {
            color: #6a11cb;
            text-decoration: none;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="text-center">Login</h1>

        <?php if (isset($data['error'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($data['error']); ?>
            </div>
        <?php endif; ?>

        <form action="/library_management_system/public/login/authenticate" method="POST">
            <div class="form-group">
                <label for="nama">Username:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="sandi">Password:</label>
                <input type="password" class="form-control" id="sandi" name="sandi" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
            <span class="forgot-password"><a href="#">Forgot your password?</a></span>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
