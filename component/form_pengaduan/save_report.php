<?php
    $nik            = $_SESSION['nik'];
    $report         = $_POST['report'];

    $target_dir     = "assets/images-report/";
    $image_name     = basename($_FILES["image"]["name"]);
    $target_file    = $target_dir . $image_name;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    mysqli_query($conn, "INSERT INTO pengaduan (nik, report, image)
        VALUES('$nik', '$report', '$image_name')");
?>
<script>
    alert('Berhasil menyimpan data')
    window.location.href = "home";
</script>