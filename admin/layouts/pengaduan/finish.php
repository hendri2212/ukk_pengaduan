<?php
    $id = $_GET['id'];
    $conn->query('UPDATE pengaduan SET status="selesai" WHERE id="'.$id.'"');
    header('location: pengaduan');
?>