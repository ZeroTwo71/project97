<?php
    header("Access-Control-Allow-Origin: *");

    //Local Database
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

    if ($conn->connect_error) {
        echo "Fail Connect To Database";
    } else {
        extract($_POST);
        $sql = "SELECT * FROM users where username ='$username' and password = '$password'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            setcookie('username', $username, time() + 3600, "/");
            echo "True";
        } else {
            echo "False";
        }
    }
    $stmt->close();
    $conn->close();