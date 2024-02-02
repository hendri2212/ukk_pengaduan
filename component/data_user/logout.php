<?php
    session_start();
    session_destroy();
    header("Location: ../pengaduan");
    exit();
?>