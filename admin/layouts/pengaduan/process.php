<?php
    $id = $_GET['id'];
    $conn->query('UPDATE pengaduan SET status="proses" WHERE id="'.$id.'"');
    header('location: pengaduan');
?>