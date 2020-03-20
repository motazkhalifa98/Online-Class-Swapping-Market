 
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
            //echo "Email Exists AND Password correct!";
            return true;
        } else {
            //echo "EMAIL/PASSWORD INCORRECT " . $conn->error;
            return false;
        }

    }

    function close_connection($conn) {
        $conn->close();
    }


    function run_db_check_email($email, $pass) {

        $connection = get_connection();
        //$email = "'admin@example.com'";
        $email_exists = (verify_email($connection, $email, $pass));
        close_connection($connection);
        return $email_exists;

    }

    function get_connection() {
        //SHOULD PROBABLY NOT KEEP THIS IN PLAINTEXT
        $servername = "tethys";
        $username = "arielshe";
        $password = "50233154";
        $dbname = "cse442_542_2020_spring_teamae_db";

        return establish_connection($servername, $username, $password, $dbname);
    }

    function check_email_only($email) {
        $connection = get_connection();
        $bool = email_only($connection, $email);
        close_connection($connection);
        return $bool;
    }

    function email_only($conn, $email) {
        $sql = "SELECT * FROM userInfo WHERE (userEmail) = (SHA1('" . $email . "'))";
        //$sql = "SELECT * FROM userInfo WHERE (userEmail, userPassword) = ('" . encrypt($email) . "', SHA1('" . encrypt($user_pass) . "'))";
        $result = query_database($conn, $sql);
        if ($result->num_rows > 0) {
            $row = $result -> fetch_row();
            //echo "Email Exists";
            return true;
        } else {
            //echo "Email does not exist" . $conn->error;
            return false;
        }
    }


    function register_user($email, $password, $first_name, $last_name) {
        $connection = get_connection();

        $sql = "INSERT INTO `cse442_542_2020_spring_teamae_db`.`userInfo` (`userId`, `userEmail`, `userPassword`,`userFirstName`,`userLastName`) VALUES (NULL, SHA1('" . $email . "'), SHA1('". $password ."'),SHA1('" . $first_name . "'),SHA1('" . $last_name . "'))";
        echo $sql; 
        $result = query_database($connection, $sql);
        echo $result;
        //echo $result;
        close_connection($connection);
    }

    // $email = "steve@example.com";
    // $password = "stevepassword";
    // $first_name = "Steve";
    // $last_name = "Peeve";
    // register_user($email, $password, $first_name, $last_name);



?>