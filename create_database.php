<?php
    // Server Connection
    $server = 'localhost';
    $username = 'root';
    $password = 'root';
    
    $conn   = new mysqli($server, $username, $password);

    $drop   = "DROP DATABASE IF EXISTS pengaduan_masyarakat";
    $conn->query($drop);

    $sql    = "CREATE DATABASE pengaduan_masyarakat";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
    
    // Call Database
    $database = 'pengaduan_masyarakat';
    mysqli_select_db($conn ,$database);

    // Create Table Masyarakat
    $conn->query("CREATE TABLE `masyarakat` (
        nik CHAR(16) NOT NULL PRIMARY KEY,
        name VARCHAR(35),
        username VARCHAR(25),
        password VARCHAR(25),
        telp VARCHAR(13)
    )");

    // Create Table Pengaduan
    $conn->query("CREATE TABLE `pengaduan` (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        date DATETIME DEFAULT CURRENT_TIMESTAMP,
        nik CHAR(16),
        report TEXT,
        image VARCHAR(255),
        status enum('0','proses','selesai') NOT NULL DEFAULT '0',
        INDEX (nik),
        FOREIGN KEY (nik) REFERENCES masyarakat(nik) ON DELETE CASCADE ON UPDATE RESTRICT
    )");

    // Create Table Petugas
    $conn->query("CREATE TABLE `petugas` (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(35),
        username VARCHAR(25),
        password VARCHAR(255),
        telp VARCHAR(13),
        level ENUM('admin','petugas') NOT NULL DEFAULT 'petugas'
    )");

    // Insert Super Admin
    $conn->query("INSERT INTO `petugas` (name, username, password, telp, level)
        VALUES  ('M. Ramlie', 'superadmin', md5('superadmin'), '08574', 'admin')");

    // Create Table Tanggapan
    $conn->query("CREATE TABLE `tanggapan` (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        pengaduan_id INT,
        date DATETIME DEFAULT CURRENT_TIMESTAMP,
        tanggapan TEXT,
        petugas_id INT,
        INDEX (pengaduan_id, petugas_id),
        FOREIGN KEY (pengaduan_id) REFERENCES pengaduan(id) ON DELETE CASCADE ON UPDATE RESTRICT,
        FOREIGN KEY (petugas_id) REFERENCES petugas(id) ON DELETE CASCADE ON UPDATE RESTRICT
    )")
?>