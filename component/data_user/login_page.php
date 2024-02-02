<html>
<head>
    <title>Pengaduan Masyarakat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="card border-0">
            <div class="card-body text-center">
                <img class="img-fluid w-25" src="https://namboilir-kibin.desa.id/wp-content/uploads/2023/01/pengaduan.png">
                <h5 class="card-title">e-Pengaduan</h5>
                <p class="card-text">Aplikasi Pengaduan Masyarakat Kotabaru</p>

                <form action="cek_login.php" method="post">
                    <input type="text" name="username" class="form-control rounded-0 border-primary" placeholder="Type your username" required>
                    <input type="text" name="password" class="form-control rounded-0 border-primary border-top-0" placeholder="Type your password" required>
                    <div class="d-grid">
                        <input type="submit" value="login" class="btn btn-primary rounded-0 border-primary border-top-0">
                    </div>
                </form>
                <a href="register.php" class="fw-bold text-decoration-none">Register</a>
            </div>
        </div>
    </div>
</body>
</html>