<?php
    session_start();
    if (empty($_SESSION['name'])) {
        header("Location: component/data_user/login_page.php");
    }
?>
<html>
<head>
    <title>Pengaduan Masyarakat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .phone {
            width: 360px;
            margin: auto;
        }
    </style>
</head>
<body>
    <!-- <div class="phone"> -->
        <h1 class="py-2 container border-2 text-danger border-warning border-bottom bg-info bg-opacity-10">e-Pengaduan</h1>
        <div class="container">
            <?php include_once "router.php"; ?>
        </div>
    <!-- </div> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>