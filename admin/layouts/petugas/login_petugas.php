<html>
<head>
    <title>Login - Admin e-Pengaduan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="card border-0">
            <div class="card-body text-center">
                <img class="w-25" src="https://namboilir-kibin.desa.id/wp-content/uploads/2023/01/pengaduan.png" alt="e-Pengaduan">
                <h5 class="card-title">e-Pengaduan</h5>
                <p class="card-text">Aplikasi Pengaduan Masyarakat Kotabaru</p>

                <form action="" method="post">
                    <input type="text" name="username" class="form-control rounded-0 border-primary" placeholder="Type your username" required>
                    <input type="text" name="password" class="form-control rounded-0 border-primary border-top-0" placeholder="Type your password" required>
                    <div class="d-grid">
                        <input type="submit" name="submit" value="login" class="btn btn-primary rounded-0 border-primary border-top-0">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        if (isset($_POST['submit'])) {
            session_start();
            include_once "../../../configuration/connection.php";
            $base_url = 'http://' . $_SERVER['HTTP_HOST'];

            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = $conn->query("SELECT * FROM petugas WHERE username='$username' AND password=md5('$password')");
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_object();
                $_SESSION['petugas_id'] = $row->id;
                $_SESSION['name'] = $row->name;
                $_SESSION['level'] = $row->level;
                header("Location: ".$base_url."/pengaduan/admin");
                exit();
            } else { ?>
                <script>
                    let host = window.location.protocol + "//" + window.location.host + "/pengaduan/admin";

                    alert('Username atau password Anda salah. Silakan coba lagi!')
                    window.location.href = host
                </script>
        <?php }
        }
    ?>
</body>
</html> 