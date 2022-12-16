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
        $sql = "SELECT * FROM memes where id = $id";
        $result = $conn->query($sql);

        $sumData = $result->num_rows;
        $sumPage = ceil($sumData / $perPage);

        $data = [];
        if ($sumData > 0) {
            while ($r = $result->fetch_assoc()) {
                array_push($data, $r);
            }
            echo json_encode($data);
        } else {
            echo "Error";
        }
    }
    $conn->close();
?>
