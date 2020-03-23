 
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
    
    
    /********************************************************************************/
    /* FUNCTION:	is_conflict                                                     */
    /* DESCRIPTION:	Checks to see if two classes have conflicting timeslots.	    */
    /* PARAMETERS:	$sT1 - startTime of first class                                 */
    /* 				$eT1 - endTime of first class                                   */
    /* 				$sT2 - startTime of second class                                */
    /* 				$eT2 - endTime of second class                                  */
    /* RETURNS:		0 if the slots conflict, else 1                                 */
    /********************************************************************************/
    function is_conflict($sT1, $eT1, $sT2, $eT2) {
		if ($eT1 < $sT2 || $eT2 < $sT1) {
			return 1;
		}
		else return 0;
	}
	

	/********************************************************************************/
	/* FUNCTION: 	get_matches                                                     */
	/* DESCRIPTION: This function is to get a list of matches that the user can     */
	/* 				then message - possibly with an interactive interface.          */
	/* PARAMETERS:	$userId - the id number of the active user                      */
	/*				$class_to_drop - the courseId that the user is willing to drop  */
	/*				$class_to_get - the courseID that the user wants                */
	/* RETURNS: 	array of userIds to contact that match the criteria             */
	/********************************************************************************/
	function get_matches($userId, $class_to_drop, $class_to_get) {
		$ra = array();	//the return array; starts empty
		$connection = get_connection();
		
		echo "DBG: After get_connection()<br>";
		
		//sql string to get current user's schedule using their userId
		$sql_schedule = "SELECT * FROM courseInfo WHERE userId='$userId'";
		
		//store the active user's schedule into $result_schedule
		$result_schedule = query_database($connection, $sql_schedule);
		
		//Now we need to fetch all the $class_to_get courseIds that fit into the active user's schedule
		$sql_get_class = "SELECT * FROM courseInfo WHERE NOT userId='$userId' AND courseId='$class_to_get'";
		$result = query_database($connection, $sql_get_class);
		
		echo "DBG: Right above while 1<br>";
		
		//this loops through each row for a result that matches courseId
		while ($row = $result->fetch_assoc()) {
			
			echo "DBG: Inside while 1, above while 2<br>";
			
			while ($row_to_drop = $result_schedule->fetch_assoc()) {
				
				echo "DBG: Inside while 2<br>";
				
				if ($row_to_drop["courseId"] != $class_to_drop) {
					
					echo "DBG: In while 2, in != classtodrop<br>";
					
					$conflict = is_conflict($row["startTime"], $row["endTime"], $row_to_drop["startTime"], $row_to_drop["endTime"]);
					
					echo "DBG: Right under conflict=<br>";
				}
				//echo "Conflict = " . $conflict "<br>";
				if ($conflict != 0) {
					array_push($ra, $row["userId"]);
					
					echo "DGB: After pushing to array.<br>";
				}
			}
		}
		
		close_connection($connection);
		$arr_len = count($ra);
		
		echo "# Elements: " . $arr_len . "<br>";

		for ($i = 0; $i < $arr_len; $i++) {
			echo "Element: " . $i . " - " . $ra[$i] . "<br>";
		}
		
		return $ra;
	}
	

	/********************************************************************************/
	/* FUNCTION: 	test_matches                                                    */
	/* DESCRIPTION: This function is to test the get_matches function               */
	/* PARAMETERS:	none                                                            */
	/* RETURNS: 	none                                                            */
	/********************************************************************************/
	/*
	function test_matches() {
		echo "Testing - userId: 8, class to drop: CSE 474, class to get: MTH 241 <br><br>";
		$curr_id = 8;
		$first_class = 'CSE 474';
		$second_class = 'MTH 241';
		$arr = get_matches($curr_id, $first_class, $second_class);
		
		echo "array: " . $arr[0] . " " . $arr[1] . " " $arr[2] "<br>";
		
		$arr_len = count($arr);
		for ($i = 0; $i < $arr_len; $i++) {
			$currId = $arr[$i];
			$connection = get_connection();
			$sql_str = "SELECT * FROM courseInfo WHERE userId='$currId'";
			$result = query_database($connection, $sql_str);
			$row = $result->fetch_assoc();
			echo "userId: " . $row[userId] . " courseId: " . $row[courseId] . " startTime: " . $row[startTime] . " endTime " . $row[endTime] . "<br>";
		}
	}
	*/


?>
