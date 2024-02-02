<?php
    include_once "configuration/connection.php";
    if ($_SERVER['HTTP_HOST']=='localhost:8888') {
        $site_url = 'http://localhost:8888/pengaduan/';
    } else {
        $site_url = 'http://192.168.163.22:8888/pengaduan/';
    }

    $current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $request = str_replace($site_url, '', $current_url);
    $request = str_replace('/', '', $request);
    $request = explode("?",strtolower($request));
    $request = $request[0];

    if($request == 'home' or $request == '')
        include "component/data_pengaduan/list.php";
    else if($request == 'details')
        include "component/data_pengaduan/details.php";
    else if($request == 'report')
        include "component/form_pengaduan/report.php";
    else if($request == 'save_report')
        include "component/form_pengaduan/save_report.php";
    else if($request == 'login')
        include "component/data_user/login.php";
    else if($request == 'logout')
        include "component/data_user/logout.php";
    else
        "Die('Page not found. Please try some different url.')";
?>