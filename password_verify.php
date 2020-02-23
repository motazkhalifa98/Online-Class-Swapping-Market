<?php
echo "hello\n";



//call this function to hash your password
//takes in raw password (plaintext) and returns hashed password
function hash_pass($raw_pass) {
	return password_hash($raw_pass, PASSWORD_BCRYPT, array('cost' => 12));
}

//example on how to call it
//this echo's the password hash back
echo hash_pass("password");

//call this funciton to verify your password
//takes in HASHED password and returns true if matches password for user false otherwise 
function verify_pass($hash_pass) {
	if (password_verify("password",$hash_pass)) {
		echo "GOOD";
		return True;
	} else {
		echo "BAD";
		return False;
	}
}

//SQL STUFF

//TODO: check if email is within database
//takes in email string and returns true if HASHED value is found within database else return FALSE 
function check_email($email) {

	return false;
}


//TODO: check if password is within database (CALL AFTER EMAIL IS VERIFIED TO EXIST)
//takes in password string and returns true if password hashes match (GRANT ENTRY) false otherwise (DENY)
function check_password($passwd) {

	return false;
}


//tests
$hash = '$2y$12$hmMCJVP3rMRp0UKkcGrbMuqEbjs3EwTaMI6NekP0V2tpQFxmq2fFu';
verify_pass($hash);


?>