<?php
    $dbhost = "localhost:3309";
    $dbuser = "root";
    $dbpass = "123456";
    $db = "cuahangnoithat";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);    
    $qry = "SELECT * FROM `hoadon`";

    $rs = mysqli_query($conn,$qry);
    $data = array();
    while(($rows = mysqli_fetch_assoc($rs))!=null){
        $data[] = $rows;
    }

    print_r($data);
?>