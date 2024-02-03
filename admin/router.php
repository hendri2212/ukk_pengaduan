<?php
    include_once "../configuration/connection.php";
    if ($_SERVER['HTTP_HOST']=='localhost:8888') {
        $site_url = 'http://localhost:8888/pengaduan/admin';
    } else {
        $site_url = 'http://192.168.163.22:8888/pengaduan/admin';
    }

    $current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $request = str_replace($site_url, '', $current_url);
    $request = str_replace('/', '', $request);
    $request = explode("?",strtolower($request));
    $request = $request[0];

    if($request == 'home' or $request == '')
        include "layouts/dashboard/home.php";
    else if($request == 'masyarakat')
        include "layouts/masyarakat/data_masyarakat.php";
    else if($request == 'pengaduan')
        include "layouts/pengaduan/pengaduan.php";
    else if($request == 'details')
        include "layouts/pengaduan/details.php";
    else if($request == 'process')
        include "layouts/pengaduan/process.php";
    else if($request == 'finish')
        include "layouts/pengaduan/finish.php";
    else if($request == 'simpan_tanggapan')
        include "layouts/pengaduan/simpan_tanggapan.php";
    else if($request == 'petugas')
        include "layouts/petugas/data_petugas.php";
    else if($request == 'petugasadd')
        include "layouts/petugas/add_petugas.php";
    else if($request == 'simpan_petugas')
        include "layouts/petugas/simpan_petugas.php";
    else if($request == 'hapus_petugas')
        include "layouts/petugas/hapus_petugas.php";
    else if($request == 'logout')
        include "layouts/petugas/logout.php";
    else
        "Die('Page not found. Please try some different url.')";
?>