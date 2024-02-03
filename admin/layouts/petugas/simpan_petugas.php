<?php
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];

    $conn->query("INSERT INTO petugas (name, username, password, telp) VALUES ('$name', '$username', md5('$password'), '$telp')");
    header("Location: petugas");
?>