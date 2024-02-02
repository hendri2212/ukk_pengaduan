<?php
    session_start();
    include_once "../../configuration/connection.php";
    $base_url = 'http://' . $_SERVER['HTTP_HOST'];// . $_SERVER['REQUEST_URI'];

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM masyarakat WHERE username='$username' AND password=md5('$password')");
 
    if ($result->num_rows > 0) {
        $row = $result->fetch_object();
        $_SESSION['name'] = $row->name;
        $_SESSION['nik'] = $row->nik;
        header("Location: ".$base_url."/pengaduan");
        exit();
    } else { ?>
        <script>
            let host = window.location.protocol + "//" + window.location.host + "/pengaduan";

            alert('Username atau password Anda salah. Silakan coba lagi!')
            window.location.href = host
        </script>
<?php } ?>