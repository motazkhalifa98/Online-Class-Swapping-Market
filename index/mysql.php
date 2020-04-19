
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

        $stmt = $conn->prepare("SELECT * FROM userInfo WHERE (userEmail, userPassword) = (SHA1(?) , SHA1(?))");
        $stmt->bind_param("ss", $hash_em, $hash_pass);  

        $hash_em = $email;
        $hash_pass = $user_pass;
        $stmt->execute();

        $res = $stmt->get_result();
        $result = $res->fetch_assoc();


        //hash parameters

//        $sql = "SELECT * FROM userInfo WHERE (userEmail, userPassword) = (SHA1('" . $email . "'), SHA1('" . $user_pass . "'))";

        if ($result != null) {
            // $row = $result -> fetch_row();
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

        $stmt = $conn->prepare("SELECT * FROM userInfo WHERE (userEmail)= (SHA1(?))");
        $stmt->bind_param("s", $hash_em);  

        $hash_em = $email;
        $stmt->execute();

        $res = $stmt->get_result();
        $result = $res->fetch_assoc();
        $stmt->close();

        if ($result != null) {

            return true;
        } else {

            return false;
        }

    }


    function check_username($username) {
        $connection = get_connection();
        $bool = username_only($connection, $username);
        close_connection($connection);
        return $bool;
    }

    function username_only($conn, $username) {

        $stmt = $conn->prepare("SELECT * FROM userInfo WHERE (userName)= ((?))");
        $stmt->bind_param("s", $hash_em);  

        $hash_em = $username;
        $stmt->execute();

        $res = $stmt->get_result();
        $result = $res->fetch_assoc();
        $stmt->close();

        if ($result != null) {

            return true;
        } else {

            return false;
        }

	}
	
	//TODO: fetch username from userId 
	function get_username($uid) {
		$connection = get_connection();
        $result = get_username_helper($connection, $uid);
        close_connection($connection);
		return $result;
	}

    function get_username_helper($conn, $uid) {
        $stmt = $conn->prepare("SELECT * FROM userInfo WHERE (userId)= ((?))");
        $stmt->bind_param("i", $hash_em);  

        $hash_em = $uid;
        $stmt->execute();

        $res = $stmt->get_result();
        $result = $res->fetch_assoc();
        // var_dump($result);
        $stmt->close();

        if ($result != null) {
			return $result["userName"];
        } else {
            return "ERROR";
        }
    }


	//test get_username 
	// $uid = "29";
	// echo get_username($uid);


    function get_name($email) {
        $connection = get_connection();
        $result = get_name_helper($connection, $email);
        close_connection($connection);
        return $result;
    }

    /*
    takes in userEmail and returns a array firstName ,lastName) returns ("ERROR", "ERROR") if not found
    */
    function get_name_helper($conn, $email) {
        $stmt = $conn->prepare("SELECT * FROM userInfo WHERE (userEmail)= (SHA1(?))");
        $stmt->bind_param("s", $hash_em);  

        $hash_em = $email;
        $stmt->execute();

        $res = $stmt->get_result();
        $result = $res->fetch_assoc();
        // var_dump($result);
        $stmt->close();

        if ($result != null) {
            $f_name = $result["userFirstName"];
            $l_name = $result["userLastName"]; 
			$uid = $result["userId"];
			$username = $result["userName"];
			return array("firstName" => $f_name, "lastName" => $l_name, "userId" => $uid, "username" => $username);
        } else {
            return array("firstName" => "ERROR", "lastName" => "ERROR", "userId" => -1, "username" => "ERROR");
        }
    }

    // function test_get_name() {
    //     var_dump(get_name("steve@boy.com"));
    // }
    // test_get_name();

    function register_user($email, $password, $first_name, $last_name, $username) {
        $connection = get_connection();

        $stmt = $connection->prepare("INSERT INTO `cse442_542_2020_spring_teamae_db`.`userInfo` (`userId`, `userEmail`, `userPassword`,`userFirstName`,`userLastName`, `userName`) VALUES (NULL, SHA1(?), SHA1(?), (?), (?), (?) )");
        $stmt->bind_param("sssss", $email, $password, $first_name, $last_name, $username);
        $stmt->execute();

        $stmt->close();
        
//        $sql = "INSERT INTO `cse442_542_2020_spring_teamae_db`.`userInfo` (`userId`, `userEmail`, `userPassword`,`userFirstName`,`userLastName`) VALUES (NULL, SHA1('" . $email . "'), SHA1('". $password ."'),SHA1('" . $first_name . "'),SHA1('" . $last_name . "'))";

        // $res = $stmt->get_result();
        // $result = $res->fetch_assoc();
        //echo $result;
        close_connection($connection);
	}
	


    // $email = "steve@example.com";
    // $password = "stevepassword";
    // $first_name = "Steve";
	// $last_name = "Peeve";
	// $username = "steve";
    // register_user($email, $password, $first_name, $last_name, $username);
    
    
/***********************************************************************************************************************************/    
    
    /********************************************************************************/
    /* FUNCTION:	is_time_conflict                                                */
    /* DESCRIPTION:	Checks to see if two classes have conflicting timeslots.	    */
    /* PARAMETERS:	$s1 - startTime of first class                                  */
    /* 				$e1 - endTime of first class                                    */
    /* 				$s2 - startTime of second class                                 */
    /* 				$e2 - endTime of second class                                   */
    /* RETURNS:		1 if the slots conflict, else 0                                 */
    /********************************************************************************/
    function is_time_conflict($s1, $e1, $s2, $e2) {
		/*Parse the string inputs to floating point numbers to compare properly*/
		/*Parse $s1*/
		if (strlen($s1) == 4) {
			$rs1 = substr($s1, 0);
		}
		else if (strlen($s1) == 5) {
			$rs1 = substr($s1, 0, 2);
		}
		$rs1 += (substr($s1, -2, 2) / 100);
		
		/*Parse $e1*/
		if (strlen($e1) == 4) {
			$re1 = substr($e1, 0);
		}
		else if (strlen($e1) == 5) {
			$re1 = substr($e1, 0, 2);
		}
		$re1 += (substr($e1, -2, 2) / 100);
		
		/*Parse $s2*/
		if (strlen($s2) == 4) {
			$rs2 = substr($s2, 0);
		}
		else if (strlen($s2) == 5) {
			$rs2 = substr($s2, 0, 2);
		}
		$rs2 += (substr($s2, -2, 2) / 100);
		
		/*Parse $e2*/
		if (strlen($e2) == 4) {
			$re2 = substr($e2, 0);
		}
		else if (strlen($e2) == 5) {
			$re2 = substr($e2, 0, 2);
		}
		$re2 += (substr($e2, -2, 2) / 100);
		
		
		/*Do the actual comparison and return*/
		if ( ($re1 < $rs2) || ($re2 < $rs1) ) {
			return 0;
		}
		return 1;
	}

/***********************************************************************************************************************************/	
	
	/********************************************************************************/
	/* FUNCTION:	is_day_conflict												    */   
	/* DESCRIPTION:	Checks to see if two classes have conflicting days.             */	                                                                        
	/* PARAMETERS:	$classA_days - the days that one of the classes is on           */
	/* 				$classB_days - the days that the other class is on              */                                                            
	/* RETURNS:		1 if the days conflict, else 0                                  */
	/********************************************************************************/    
	function is_day_conflict($classA_days, $classB_days) {
		$i;
		$comp1 = 0;
		$comp2 = 0;
		
		/*parse the first argument into an easily comparable form*/
		$limit = strlen($classA_days);
		for ($i = 0; $i < $limit; $i++) {
			$temp = substr($classA_days, $i, 1);
			
			if ($temp == ',' || $temp == 'h') {
				continue;
			}
			else if ($temp == 'M') {
				$comp1 += 16;
			}
			else if ($temp == 'W') {
				$comp1 += 4;
			}
			else if ($temp == 'F') {
				$comp1 += 1;
			}
			else if ($temp == 'T') {
				if (substr($classA_days, $i, 2) == 'Th') {
					$comp1 += 2;
				}
				else {
					$comp1 += 8;
				}
			}
		}
		
		/*parse the second argument into an easily comparable form*/
		$limit = strlen($classB_days);
		for ($i = 0; $i < $limit; $i++) {
			$temp = substr($classB_days, $i, 1);

			if ($temp == ',' || $temp == 'h') {
				continue;
			}
			else if ($temp == 'M') {
				$comp2 += 16;
			}
			else if ($temp == 'W') {
				$comp2 += 4;
			}
			else if ($temp == 'F') {
				$comp2 += 1;
			}
			else if ($temp == 'T') {
				if (substr($classB_days, $i, 2) == 'Th') {
					$comp2 += 2;
				}
				else {
					$comp2 += 8;
				}
			}
		}
		
		/*Actually compare the values.*/
		for ($n = 0; $n < 5; $n++) {
			if ( ($comp1 & 1) && ($comp2 & 1) ) {
				return 1;
			}
			$comp1 = $comp1 >> 1;
			$comp2 = $comp2 >> 1;
		}
		
		return 0;
	}                                                                        

/***********************************************************************************************************************************/	

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
		
		//sql string to get current user's schedule using their userId
		$sql_schedule = "SELECT * FROM courseInfo WHERE userId='$userId'";
		
		//store the active user's schedule into $result_schedule
		$result_schedule = query_database($connection, $sql_schedule);
		
		//Now we need to fetch all the $class_to_get courseIds that fit into the active user's schedule
		$sql_get_class = "SELECT * FROM courseInfo WHERE NOT userId='$userId' AND courseId='$class_to_get'";
		$result = query_database($connection, $sql_get_class);
		
		//Store the active user's class schedule into an array
		$user_schedule = array();
		while ($row_to_drop = $result_schedule->fetch_assoc()) {
			array_push($user_schedule, $row_to_drop);
		}
		$num_classes = count($user_schedule);
		
		
		//this loops through each row for a result that matches courseId
		while ($row = $result->fetch_assoc()) {
			//echo "outer loop: " . $row["userId"] . "<br>";
			$total_conflicts = 0;
			
			//while ($row_to_drop = $result_schedule->fetch_assoc()) {
			for ($xcnt = 0; $xcnt < $num_classes; $xcnt++) {
				//echo "inner loop: " . $user_schedule[$xcnt]["courseId"] . "<br>";
				$d_conflict = 0;
				$t_conflict = 0;
								
				//if the current row is the class we're offering to drop, skip checking it (we don't care if its a conflict since it'll be dropped either way
				if ($user_schedule[$xcnt]["courseId"] != $class_to_drop) {
					//first, check if days conflict
					$d_conflict = is_day_conflict($row["days"], $user_schedule[$xcnt]["days"]);
					//echo "day conflict?: " . $d_conflict . "<br>";
					
					//if days conflict, check to see if it fits into an open time slot
					if ($d_conflict == 1) {
						$t_conflict = is_time_conflict($user_schedule[$xcnt]["startTime"], $user_schedule[$xcnt]["endTime"], $row["startTime"], $row["endTime"]);
						//echo "time conflict?: " . $t_conflict . "<br>";
					}
					
					//if there was a time conflict, increment the conflict count
					if ($t_conflict == 1) {
						$total_conflicts++;
					}
				}
			}
			//echo "just outside inner while loop; total_conflicts = " . $total_conflicts . "<br>";
			if ($total_conflicts == 0) {
				//echo "What are we pushing: " . $row["userId"] . "<br>";
				array_push($ra, $row["userId"]);
			}
		}
		
		close_connection($connection);
		
		/*
		$arr_len = count($ra);
		
		echo "The array being returned from get_matches()<br>";
		echo "# Elements: " . $arr_len . "<br>";

		for ($i = 0; $i < $arr_len; $i++) {
			echo "Element: " . $i . " - " . $ra[$i] . "<br>";
		}
		*/
		
		return $ra;
	}
	
/***********************************************************************************************************************************/

	/********************************************************************************/
	/* FUNCTION: 	test_matches                                                    */
	/* DESCRIPTION: This function is to test the get_matches function               */
	/* PARAMETERS:	none                                                            */
	/* RETURNS: 	none                                                            */
	/********************************************************************************/
	
	function test_matches() {
		$curr_id = 6;
		$first_class = 'CSE 474';
		$second_class = 'CSE 101';
		
		$connection = get_connection();
		$sql = "SELECT * FROM courseInfo WHERE userId='$curr_id'";
		$result = query_database($connection, $sql);
		
		while ($row = $result->fetch_assoc()) {
			if ($row["courseId"] == $first_class) {
				break;
			}
		}
		
		echo "Testing get_matches function: <br>---------------------------------------------<br>";
		
		echo "Current userId: " . $row["userId"] . "<br>Class to drop- courseId: " . $row["courseId"] . " days: " . $row["days"] . " startTime: " . $row["startTime"] . " endTime: " . $row["endTime"] . "<br>";
		echo "Course to get: " . $second_class . "<br>";
				
		$arr = get_matches($curr_id, $first_class, $second_class);
		echo "<br>Matches: <br>";
		
		$arr_len = count($arr);
		echo "# Elements: " . $arr_len . "<br>";

		for ($i = 0; $i < $arr_len; $i++) {
			echo "Element: " . $i . " - " . $arr[$i] . "<br>";
			$sql = "SELECT * FROM courseInfo WHERE userId='$arr[$i]' AND courseId='$second_class'";
			$result = query_database($connection, $sql);
			$row = $result->fetch_assoc();
			echo "userId: " . $row["userId"] . " courseId: " . $row["courseId"] . " days: " . $row["days"] . " startTime: " . $row["startTime"] . " endTime: " . $row["endTime"] . "<br>";
		}
		
		echo "<br>End of get_matches() test. <br>---------------------------------------------------<br><br>";
	}

/***********************************************************************************************************************************/
	
	/********************************************************************************/
	/* FUNCTION: 	test_is_time_conflict                                           */
	/* DESCRIPTION: This function is to test the is_time_conflict function          */
	/* PARAMETERS:	none                                                            */
	/* RETURNS: 	none                                                            */
	/********************************************************************************/	
	function test_is_time_conflict() {
		echo "<br>Testing is_time_conflict function:<br>";
		echo "---------------------------------------------------<br>";
		
		echo "Test 1: inputs - s1: 8:00; e1: 8:50; s2: 10:00; e2: 10:50;    Expected Output: 0;  ";
		$s1 = '8:00';
		$e1 = '8:50';
		$s2 = '10:00';
		$e2 = '10:50';
		
		$ret = is_time_conflict($s1, $e1, $s2, $e2);
		echo "Actual output: " . $ret . "    ";
		if ($ret == 0) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
		
		echo "Test 2: inputs - s1: 10:00; e1: 10:50; s2: 8:00; e2: 8:50;    Expected Output: 0;  ";
		$s1 = '10:00';
		$e1 = '10:50';
		$s2 = '8:00';
		$e2 = '8:50';
		
		$ret = is_time_conflict($s1, $e1, $s2, $e2);
		echo "Actual output: " . $ret . "    ";
		if ($ret == 0) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
		
		echo "Test 3: inputs - s1: 8:00; e1: 9:50; s2: 9:00; e2: 10:50;    Expected Output: 1;  ";
		$s1 = '8:00';
		$e1 = '9:50';
		$s2 = '9:00';
		$e2 = '10:50';
		
		$ret = is_time_conflict($s1, $e1, $s2, $e2);
		echo "Actual output: " . $ret . "    ";
		if ($ret == 1) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
		
		echo "Test 4: inputs - s1: 9:00; e1: 10:50; s2: 8:00; e2: 9:50;    Expected Output: 1;  ";
		$s1 = '9:00';
		$e1 = '10:50';
		$s2 = '8:00';
		$e2 = '9:50';
		
		$ret = is_time_conflict($s1, $e1, $s2, $e2);
		echo "Actual output: " . $ret . "    ";
		if ($ret == 1) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
		
		echo "Test 5: inputs - s1: 11:00; e1: 11:50; s2: 11:00; e2: 11:50;    Expected Output: 1;  ";
		$s1 = '11:00';
		$e1 = '11:50';
		$s2 = '11:00';
		$e2 = '11:50';
		
		$ret = is_time_conflict($s1, $e1, $s2, $e2);
		echo "Actual output: " . $ret . "    ";
		if ($ret == 1) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
		
		echo "End of is_time_conflict test<br>";
		echo "-----------------------------------------------<br><br>";
	}
/***********************************************************************************************************************************/
	
	/********************************************************************************/
	/* FUNCTION: 	test_is_day_conflict                                            */
	/* DESCRIPTION: This function is to test the is_day_conflict function           */
	/* PARAMETERS:	none                                                            */
	/* RETURNS: 	none                                                            */
	/********************************************************************************/
	function test_is_day_conflict() {
		echo "Testing is_day_conflict function:<br>";
		echo "---------------------------------------------------<br>";
		
		echo "Test 1: Inputs - a: 'M,W,F'; b: 'M,W,F'; Expected: 1;<br>";
		$a = 'M,W,F';
		$b = 'M,W,F';
		$expected = 1;
		
		$ret = is_day_conflict($a, $b);
		echo "Actual output: " . $ret . "    ";
		if ($ret == $expected) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
				
		echo "Test 2: Inputs - a: 'T,Th'; b: 'T,Th'; Expected: 1;<br>";
		$a = 'T,Th';
		$b = 'T,Th';
		$expected = 1;
		
		$ret = is_day_conflict($a, $b);
		echo "Actual output: " . $ret . "    ";
		if ($ret == $expected) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
				
		echo "Test 3: Inputs - a: 'M,W,F'; b: 'M'; Expected: 1;<br>";
		$a = 'M,W,F';
		$b = 'M';
		$expected = 1;
		
		$ret = is_day_conflict($a, $b);
		echo "Actual output: " . $ret . "    ";
		if ($ret == $expected) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
				
		echo "Test 4: Inputs - a: 'M,W,F'; b: 'W'; Expected: 1;<br>";
		$a = 'M,W,F';
		$b = 'W';
		$expected = 1;
		
		$ret = is_day_conflict($a, $b);
		echo "Actual output: " . $ret . "    ";
		if ($ret == $expected) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
		
		echo "Test 5: Inputs - a: 'F'; b: 'M,W,F'; Expected: 1;<br>";
		$a = 'F';
		$b = 'M,W,F';
		$expected = 1;
		
		$ret = is_day_conflict($a, $b);
		echo "Actual output: " . $ret . "    ";
		if ($ret == $expected) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
				
		echo "Test 6: Inputs - a: 'M,W,F'; b: 'T,Th'; Expected: 0;<br>";
		$a = 'M,W,F';
		$b = 'T,Th';
		$expected = 0;
		
		$ret = is_day_conflict($a, $b);
		echo "Actual output: " . $ret . "    ";
		if ($ret == $expected) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
				
		echo "Test 7: Inputs - a: 'T,Th'; b: 'T'; Expected: 1;<br>";
		$a = 'T,Th';
		$b = 'T';
		$expected = 1;
		
		$ret = is_day_conflict($a, $b);
		echo "Actual output: " . $ret . "    ";
		if ($ret == $expected) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
				
		echo "Test 8: Inputs - a: 'Th'; b: 'T,Th'; Expected: 1;<br>";
		$a = 'Th';
		$b = 'T,Th';
		$expected = 1;
		
		$ret = is_day_conflict($a, $b);
		echo "Actual output: " . $ret . "    ";
		if ($ret == $expected) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
				
		echo "Test 9: Inputs - a: 'T,Th'; b: 'M,W'; Expected: 0;<br>";
		$a = 'T,Th';
		$b = 'M,W';
		$expected = 0;
		
		$ret = is_day_conflict($a, $b);
		echo "Actual output: " . $ret . "    ";
		if ($ret == $expected) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
				
		echo "Test 10: Inputs - a: 'T'; b: 'M,W,F'; Expected: 0;<br>";
		$a = 'T';
		$b = 'M,W,F';
		$expected = 0;
		
		$ret = is_day_conflict($a, $b);
		echo "Actual output: " . $ret . "    ";
		if ($ret == $expected) {
			echo "<br>Test PASSED.<br><br>";
		}
		else {
			echo "<br>Test FAILED!<br><br>";
		}
		
		echo "End of is_day_conflict test<br>";
		echo "-----------------------------------------------<br><br>";
	}
	
/***********************************************************************************************************************************/



?>
