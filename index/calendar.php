<?php
function establish_connection($servername, $username, $password, $dbname) {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function get_connection() {
    //SHOULD PROBABLY NOT KEEP THIS IN PLAINTEXT
    $servername = "tethys";
    $username = "mjspagna";
    $password = "50148235";
    $dbname = "cse442_542_2020_spring_teamae_db";

    return establish_connection($servername, $username, $password, $dbname);
}

function close_connection($conn) {
    $conn->close();
}

//queries database with given sql command and returns result 
function query_database($conn, $sql_command) {
    return $conn->query($sql_command);

}
?>