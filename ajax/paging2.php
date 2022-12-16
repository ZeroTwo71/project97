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
        if ($command == "first") {
            $start = 0;
            $pageNow = 1;
        } else if ($command == "last") {
            $start = ($totPage - 1) * $perPage;
            $pageNow = $totPage;
        } else if ($command == "next") {
            if ($pageNow != $totPage) {
                $pageNow += 1;
            }
            $start = ($pageNow - 1) * $perPage;
        } else if ($command == "back") {
            if ($pageNow != 1) {
                $pageNow -= 1;
            }
            $start = ($pageNow - 1) * $perPage;
        } else {
        }
        $sql = "SELECT * FROM memes limit $start, $perPage";
        $result = $conn->query($sql);

        $data = [];
        $memes = [];
        if ($result->num_rows > 0) {
            while ($r = $result->fetch_assoc()) {
                array_push($memes, $r);
            }
            $data['memes'] = $memes;
            $data['thisPage'] = $pageNow;
            echo json_encode($data);
        } else {
            echo "Error";
        }
    }
    $conn->close();
?>