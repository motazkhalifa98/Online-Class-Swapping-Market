<?php
    require_once 'mysql.php';
    require_once 'session.php';
    session_start();
    $conn = get_connection();
    $usr_id = $_SESSION["userId"];
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $days = $_POST['days'];
    $start = $_POST['start_time'];
    $end = $_POST['end_time'];
    $loc = $_POST['location'];
    /*$stmt = $conn->prepare("INSERT INTO courseInfo (userId, courseId, courseName, days, startTime, endTime, location)
    VALUES (?,?,?,?,?,?,?);");
     $stmt->bind_param($usr_id, $course_id, $course_name, $days, $start, $end, $loc);
     $stmt->execute();
     $stmt->close();*/
    $sql = "INSERT INTO courseInfo (userId, courseId, courseName, days, startTime, endTime, location)
     VALUES ('$usr_id','$course_id','$course_name','$days','$start','$end','$loc');";
    query_database($conn, $sql);
    close_connection($conn);
    header("Location: account.php");
    exit();
?>