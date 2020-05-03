<?php 
  session_start();
?>
<!doctype html>
<html lang="en">
<?php
   require_once 'checkSession.php';
?>
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
    <title>DNM</title><style>
  .error {color: #FF0000;}
	table, th, td {
    padding: 15px;
	border-collapse: collapse;
    border-style: solid;
    border-color: #0b3c5d;
    background-color:whitesmoke;
}
  </style>
  </head>
  <body>

<?php

    require 'mysql.php';
    $advisor_emailErr = $prev_classErr = $next_classErr = "";
    $advisor_email = $prev_class = $next_class = "";
    require_once 'session.php';
    $first_name = $_SESSION["userFirstName"];
    $last_name = $_SESSION["userLastName"];
    require_once 'email.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  

  if (empty($_POST["advisor_email"])) {
    $advisor_emailErr = "Advisor's email is required";
  } else {
    $advisor_email = test_input($_POST["advisor_email"]);
    if (!filter_var($advisor_email, FILTER_VALIDATE_EMAIL)) {
        $advisor_emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["prev_class"])) {
    $prev_classErr = "Previous class is required";
  } else {
    $prev_class = test_input($_POST["prev_class"]);
  }

  if (empty($_POST["next_class"])) {
    $next_classErr = "Next class is required";
  } else {
    $next_class = test_input($_POST["next_class"]);
  }

  if($advisor_emailErr == "" && $prev_classErr == "" && $next_classErr == ""){

    verify_with_advisor($first_name,$last_name,$advisor_email,$prev_class,$next_class);

  }
  
}



  

  

    

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
      return $data;
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
                <a class="nav-link" href="account.php" target="_self">Account <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="matches.php" target="_self">Matches</a>
                </li>
                <li class="nav-item">   
                    <a class="nav-link" href="messages.php" target="_self">Messages</a>
                </li>
				<li class="nav-item">   
                    <a class="nav-link" href="post.php" target="_self">Post</a>
                </li>
				<li class="nav-item">   
                    <a class="nav-link" href="#" target="_self">Verify with advisor</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-cog"></i></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="info.php" target="_self">Edit Information</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="Verify Delete.php" target="_self">Delete Account</a>
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
        <h2>Verify swap with an advisor</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <span class="error"><?php echo $advisor_emailErr;?></span>
	        <input type="advisor_email" class="form-control" name="advisor_email" placeholder="Advisor's Email" id="advisor_email" value="<?php echo $advisor_email;?>">
                <span class="error"><?php echo $prev_classErr;?></span>
            <input type="prev_class" class="form-control" name="prev_class" placeholder="Previous Class" id="prev_class" value="<?php echo $prev_class;?>">
                <span class="error"><?php echo $next_classErr;?></span>
            <input type="next_class" class="form-control" name="next_class" placeholder="Next Class" id="next_class" value="<?php echo $next_clas;?>">
	        <br>
	        <input type="submit" value="Send" aria-label="Send" >
        </form>
    </div>

    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="account.js"></script>
  </body>
</html>