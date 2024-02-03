<?php
    $id = $_POST['id'];
    $tanggapan = $_POST['tanggapan'];
    $petugas = $_SESSION['petugas_id'];

    $conn->query("INSERT INTO tanggapan (pengaduan_id, tanggapan, petugas_id) VALUES ('$id', '$tanggapan', '$petugas')");
    header("Location: details?id=".$id);
?>