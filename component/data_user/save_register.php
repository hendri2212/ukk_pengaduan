<?php
    include_once "../../configuration/connection.php";

    $nik = $_POST['nik'];
    $name = $_POST['name'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query($conn, "INSERT INTO `masyarakat` (nik, name, telp, username, password)
        VALUES ('$nik', '$name', '$telp', '$username', md5('$password'))");

    header('Location: /pengaduan');
?>
