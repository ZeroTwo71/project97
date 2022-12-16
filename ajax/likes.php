<?php
    header("Access-Control-Allow-Origin: *");

    //Local Database
    $sname = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "fsp_project2";

    //Live Hosting
    // $sname = "localhost";
    // $uname = "id20016688_fsp_project";
    // $pass = "Arthuria@4711";
    // $dbname = "id20016688_project";

    $conn = new mysqli($sname, $uname, $pass, $dbname);
    if ($conn->connect_error) {
        echo "Fail Connect To Database";
    } else {
        extract($_POST);
        $sql = "SELECT * FROM likes where users_username = '$userId' and memes_idmemes = $memesId";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        $status = "";
        if ($result->num_rows > 0) {
            $sql1 = "delete from likes where users_username = '$userId' and memes_idmemes = $memesId";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute();

            $sql2 = "update memes set `like` = `like` - 1 where idmemes = $memesId";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();

            $status = "delLike";
        } else {
            $sql1 = "insert into likes(users_username, memes_idmemes) values ('$userId', $memesId)";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute();

            $sql2 = "update memes set `like` = `like` + 1 where idmemes = $memesId";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();

            $status = "addLike";
        }

        if (!$stmt1->error) {
            echo $status;
        } else {
            echo "Error";
        }
    }
    $stmt->close();
    $stmt1->close();
    $stmt2->close();
    $conn->close();
