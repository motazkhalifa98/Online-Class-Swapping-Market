<?php

    require_once 'mysql.php';
    $conn = get_connection();
    $usr_id = 17;
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $days = $_POST['days'];
    $start = $_POST['start_time'];
    $end = $_POST['end_time'];
    $loc = $_POST['location'];

    $sql = "INSERT INTO courseInfo (userId, courseId, courseName, days, startTime, endTime, location)
    VALUES ('$usr_id', '$course_id', '$course_name', '$days', '$start', '$end', '$loc');";
    query_database($conn, $sql);

    header("Location: account.php?id=".$usr_id);
    exit();
?>