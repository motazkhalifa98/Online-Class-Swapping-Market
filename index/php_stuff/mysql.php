 
<?php

$email_exists = false;

function establish_connection($servername, $username, $password, $dbname) {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


//queries database with given sql command and returns result 
function query_database($conn, $sql_command) {
    return $conn->query($sql_command);

}
    
function encrypt($string) {
    return sha1($string);
}

//sql statement verifies email & password with SHA1 encryption`
function verify_email($conn, $email, $user_pass) {

    $sql = "SELECT * FROM userInfo WHERE (userEmail, userPassword) = (SHA1('" . $email . "'), SHA1('" . $user_pass . "'))";
    //$sql = "SELECT * FROM userInfo WHERE (userEmail, userPassword) = ('" . encrypt($email) . "', SHA1('" . encrypt($user_pass) . "'))";
    $result = query_database($conn, $sql);
    if ($result->num_rows > 0) {
        $row = $result -> fetch_row();
        echo "Email Exists AND Password correct!";

    } else {
        echo "EMAIL/PASSWORD INCORRECT " . $conn->error;
        return false;
    }

}

function close_connection($conn) {
    $conn->close();
}


function run_db_check_email($email, $pass) {

    //SHOULD PROBABLY NOT KEEP THIS IN PLAINTEXT
    $servername = "tethys";
    $username = "arielshe";
    $password = "50233154";
    $dbname = "cse442_542_2020_spring_teamae_db";

    $connection = establish_connection($servername, $username, $password, $dbname);
    //$email = "'admin@example.com'";
    $email_exists = (verify_email($connection, $email, $pass));
    close_connection($connection);
    return $email_exists;

}


// if(run_db_check_email("admin@example.com")) {
//     echo "SUCCESS";
// } else {
//     echo "FAILURE";
// };


?>