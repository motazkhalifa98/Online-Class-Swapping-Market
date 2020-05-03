<?php
    session_start();
?>

<!doctype html>
<html lang="en-US">
<?php
   require_once 'checkSession.php';
?>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="info.css">
        <script 
         src="https://use.fontawesome.com/releases/v5.12.1/js/all.js"
         data-auto-a11y="true"
         ></script>
    </head>

<?php
    require 'mysql.php';
    $firstnameErr = $lastnameErr = $usernameErr = "";
    $first_name = $_SESSION["userFirstName"];
    $last_name = $_SESSION["userLastName"];
    $username = $_SESSION["username"];
    $userId = $_SESSION["userId"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first_name"])) {
    $firstnameErr = "";
  } else {
    $first_name = test_input($_POST["first_name"]);
	  if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
     $firstnameErr = "Only letters and white space allowed";
  }
  }

  if (empty($_POST["last_name"])) {
    $lastnameErr = "";
  } else {
    $last_name = test_input($_POST["last_name"]);
	  if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
      $lastnameErr = "Only letters and white space allowed";
  }
  }

  //test username input
  if (empty($_POST["username"])) {
    $usernameErr = "";
  } else {
    $username = test_input($_POST["username"]);
  }
    //if username exists give error
    if (check_username($username) && $username != $_SESSION["username"]) {
      $usernameErr = "Username already exists";
    }
  

  if($firstnameErr == "" && $lastnameErr == "" && $usernameErr == ""){
    change_username($username, $userId);
    change_firstName($first_name, $userId);
    change_lastName($last_name, $userId);
    $_SESSION["userFirstName"] = $first_name;
    $_SESSION["userLastName"] = $last_name;
    $_SESSION["username"] = $username;
    header("location: account.php");
  }


 
  }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
      return $data;
    }

?>

    <body>
		

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark " id="nav-bg">
            <a class="navbar-brand" href="#"><i class="fas fa-bug"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="account.php">Account <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="#">Matches</a>
                </li>
                <li class="nav-item">   
                    <a class="nav-link" href="messages.php">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post.php">Post</a>
                </li>
                <li class="nav-item">   
                    <a class="nav-link" href="email_advisor.php" target="_self">Verify with advisor</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-cog"></i></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="info.php">Edit Information</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="Delete Account.php">Delete Account</a>
                    </div>
                </li>
                <li class="nav-item">
                    <button id="out_btn" class="btn my-2 my-sm-0" type="button" onclick="location.href = 'logout.php';">Log Out</button>
                </li>
            </ul>
            </div>
        </nav>

        <main>

        <div class="container">
            <h2>Change Information</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<span class="error"><?php echo $firstnameErr;?></span>
		<input type="text" class="form-control" name="first_name" placeholder="First name" id="first_name" value="<?php echo $first_name;?>">
		<span class="error"><?php echo $lastnameErr;?></span>
		<input type="text" class="form-control" name="last_name" placeholder="Last name" id="last_name" value="<?php echo $last_name;?>">
		<span class="error"><?php echo $usernameErr;?></span>
		<input type="text" class="form-control" name="username" placeholder="Username" id="username" value="<?php echo $username;?>">
		<input type="submit" value="Update Info" aria-label="Sign Up">
        </form>
      </div>

      </main>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>


</html>