<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
	       <script
      src="https://use.fontawesome.com/releases/v5.12.1/js/all.js"
      data-auto-a11y="true"
    ></script>
  <title>DNM</title>
  <style>
  .error {color: #FF0000;}
  </style>
  </head>
  <body>

    <?php
    require 'mysql.php';
    $firstnameErr = $lastnameErr = $emailErr = $passwordErr = "";
    $first_name = $last_name = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first_name"])) {
    $firstnameErr = "First name is required";
  } else {
    $first_name = test_input($_POST["first_name"]);
	  if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
     $firstnameErr = "Only letters and white space allowed";
  }
  }

  if (empty($_POST["last_name"])) {
    $lastnameErr = "Last name is required";
  } else {
    $last_name = test_input($_POST["last_name"]);
	  if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
      $lastnameErr = "Only letters and white space allowed";
  }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
	}
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
    //if email exists give error
    if(does_email_exist($email)) {
      $emailErr = "Email already exists";
    }
  

  if($firstnameErr == "" && $lastnameErr == "" && $emailErr == "" && $passwordErr == ""){
    //insert into database first name, last name, email, password ALL SHA1 encrypted
    register_user($email, $password, $first_name, $last_name);
    header("location: successful_registration.php");
  }


 
  }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
      return $data;
    }


  //checks if email is in the database (takes email as parameter and returns true if exists false otherwise)
  function does_email_exist($email) {
    return check_email_only($email);
  }   

?>


     <nav class="navbar fixed-top navbar-expand-lg navbar-dark " id="nav-bg">
           <a class="navbar-brand" href="#"><i class="fas fa-bug"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="Login Page.php" target="_self">Account <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="Login Page.php" target="_self">Matches</a>
                </li>
                <li class="nav-item">   
                    <a class="nav-link" href="Login Page.php" target="_self">Messages</a>
                </li>
				<li class="nav-item">   
                    <a class="nav-link" href="Login Page.php" target="_self">Post</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-cog"></i></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="Login Page.php" target="_self">Edit Information</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="Login Page.php" target="_self">Delete Account</a>
                    </div>
                </li>
                <li class="nav-item">
                    <button id="out_btn" class="btn my-2 my-sm-0" type="button">Log Out</button>
                </li>
            </ul>
            </div>
        </nav>


    <main>

      
    <div class="container">
        <h2>Sign Up</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<span class="error"><?php echo $firstnameErr;?></span>
		<input type="text" class="form-control" name="first_name" placeholder="First name" id="first_name" value="<?php echo $first_name;?>">
		<span class="error"><?php echo $lastnameErr;?></span>
		<input type="text" class="form-control" name="last_name" placeholder="Last name" id="last_name" value="<?php echo $last_name;?>">
		<span class="error"><?php echo $emailErr;?></span>
		<input type="email" class="form-control" name="email" placeholder="Email" id="email" value="<?php echo $email;?>">
		<span class="error"><?php echo $passwordErr;?></span>
		<input type="password" name="password" class="form-control" id="password" placeholder="Password">
		<input type="submit" value="Sign Up" aria-label="Sign Up" >
        </form>
      </div>


    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>