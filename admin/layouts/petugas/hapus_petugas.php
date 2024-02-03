<?php
    $id = $_GET['id'];
    $conn->query("DELETE FROM petugas WHERE id = '$id'");
    header('location:petugas');
?>