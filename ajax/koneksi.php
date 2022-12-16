<?php
    // Local Database
    $localhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fsp_project2";

    //Live Hosting
    // $localhost = "localhost";
    // $username = "id20016688_fsp_project";
    // $password = "Arthuria@4711";
    // $dbname = "id20016688_project";

    $conn = new mysqli($localhost, $username, $password, $dbname);

    if($conn) {
    } else {
        echo "Fail Connect To Database! : ". mysqli_connect_error();
    }
?>