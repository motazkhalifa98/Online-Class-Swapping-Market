<?php
    require_once 'connect.php';
    $usr_id = 17;
    $sql = "SELECT courseId, days, startTime, endTime, location FROM courseInfo
    WHERE userId = '$usr_id'";
    $results = mysqli_query($conn, $sql);
    if(mysqli_num_rows($results) > 0){
        while($row = mysqli_fetch_assoc($results)){
            $data = "courseId: " . $row["courseId"] . ", Days: " . $row["days"] . ", Start Time: " . $rows["startTime"] . ", End Time: " . $rows["endTime"] . ", Location: " . $row["location"];
            echo("<script>console.log('PHP: " . $data . "');</script>");
        }
    }else{
        $data = "yikes";
        echo("<script>console.log('PHP: " . $data . "');</script>");
    }
    header("Location: ../account.html?courseGot=success");
?>