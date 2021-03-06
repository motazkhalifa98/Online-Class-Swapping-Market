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
    $senderErr = $receiverErr = $messageErr = $passwordErr = $login_emailErr = $login_passwordErr = "";
    $sender_id = $receiver_id = $message_content = $password = $login_email = $login_password = "";
	$outbox = $inbox = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["sender_id"])) {
    $senderErr = "Sender is required";
  } else {
    $sender_id = test_input($_POST["sender_id"]);
    if (!filter_var($sender_id, FILTER_VALIDATE_EMAIL)) {
      $senderErr = "Invalid sender email format";
    }
  }
  
   if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    } else {
      $password = test_input($_POST["password"]);
    }

    if(!(run_db_check_email($sender_id, $password))) {
      $passwordErr = "Email or Password is incorrect";
    }

  if (empty($_POST["receiver_id"])) {
    $receiverErr = "Receiver is required";
  } else {
    $receiver_id = test_input($_POST["receiver_id"]);
    if (!filter_var($receiver_id, FILTER_VALIDATE_EMAIL)) {
      $receiverErr = "Invalid receiver email format";
    }
  }

  if (empty($_POST["message_content"])) {
    $messageErr = "Message is required <br/>";
  } else {
    $message_content = test_input($_POST["message_content"]);
  }

  if (!check_email_only($sender_id)) {
		$senderErr = "Sender email doesn't exist";
  }
  if(!check_email_only($receiver_id)) {
		$receiverErr = "Receiver email doesn't exist";
  }	

  if($senderErr == "" && $receiverErr == "" && $messageErr == "" && $passwordErr == ""){
    $connection = get_connection();
 	
	$sql = "INSERT INTO messages ".
               "(message_id,sender, receiver, message) "."VALUES ".
               "(NULL,'$sender_id','$receiver_id','$message_content')";
    $result = query_database($connection, $sql);
    close_connection($connection);
    header("messages.html");
  }
  
  
  if (empty($_POST["login_email"])) {
      $login_emailErr = "Email is required";
    } else {
      $login_email = test_input($_POST["login_email"]);

      if (!filter_var($login_email, FILTER_VALIDATE_EMAIL)) {
          $login_emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["login_password"])) {
      $login_passwordErr = "Password is required";
    } else {
      $login_password = test_input($_POST["login_password"]);
    }

    if(!(run_db_check_email($login_email, $login_password))) {
      $login_passwordErr = "Email or Password is incorrect";
    }

    if($login_emailErr == "" && $login_passwordErr == ""){
	  $connection = get_connection();
	  
	  
	  $sqlout = "SELECT receiver, message FROM messages WHERE sender = '$login_email'";
	  $retvalout = $connection->query($sqlout);
	  if ($retvalout->num_rows > 0) {
		  $outbox = "1";
} 
	  $sqlin = "SELECT sender, message FROM messages WHERE receiver = '$login_email'";
	  $retvalin = $connection->query($sqlin);
	  if ($retvalin->num_rows > 0) {
		  $inbox = "1";
} 
	
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
                    <a class="nav-link" href="#" target="_self">Messages</a>
                </li>
				<li class="nav-item">   
                    <a class="nav-link" href="post.php" target="_self">Post</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-cog"></i></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="underconstruction.html" target="_self">Edit Information</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="underconstruction.html" target="_self">Delete Account</a>
                    </div>
                </li>
                <li class="nav-item">
                    <button id="out_btn" class="btn my-2 my-sm-0" type="button" onclick=" to_home()">Log Out</button>
                </li>
            </ul>
            </div>
        </nav>
    <main>


    <div class="container">
        <h2>Send a message</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <span class="error"><?php echo $senderErr;?></span>
	<input type="email" class="form-control" name="sender_id" placeholder="Sender" id="sender_id" value="<?php echo $sender_id;?>">
	<span class="error"><?php echo $passwordErr;?></span>
	<input type="password" name="password" class="form-control" id="password" placeholder="Password">
    <span class="error"><?php echo $receiverErr;?></span>
		<input type="email" class="form-control" name="receiver_id" placeholder="Receiver" id="receiver_id" value="<?php echo $receiver_id;?>">
    <span class="error"><?php echo $messageErr;?></span>
		<textarea name="message_content" rows="5" cols="40" placeholder="Message" id="message_content" value="<?php echo $message_content;?>"></textarea>
		<br>
		<input type="submit" value="Send" aria-label="Send" >
        </form>
      </div>

    <br>
    <br>
    <br>
    <br>
     <div class="container">
      <h2>Messages</h2>
	  
	  <div class="container-sm">
        <h1>Sign in to view messages</h1>
		    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<span class="error"><?php echo $login_emailErr;?></span>
			<input type="email" class="form-control" name="login_email" placeholder="Email" id="login_email" value="<?php echo $login_email;?>">
			<span class="error"><?php echo $login_passwordErr;?></span>
		    <input type="password" name="login_password" class="form-control" id="login_password" placeholder="Password">
       <input type="submit" value="Log In" aria-label="Log In">
        </form>
      </div>
	  <br>
	  <br>
	 <h1>Outbox</h1>
	 <?php 
	 
	 
	 if ($outbox == "1"){
	  echo "<table><tr><th>To</th><th>Message</th></tr>";
    while($row = $retvalout->fetch_assoc()) {
        echo "<tr><td>".$row["receiver"]."</td><td>".$row["message"]."</td></tr>";
    }
    echo "</table>";
	 }  else {
		echo "No Messages.";
	 }
	 
	?>
	 
	  <br>
	  <br>
	 <h1>Inbox</h1>
	 <?php
	 if ($inbox == "1"){
	  echo "<table><tr><th>From</th><th>Message</th></tr>";
    // output data of each row
    while($row = $retvalin->fetch_assoc()) {
        echo "<tr><td>".$row["sender"]."</td><td>".$row["message"]."</td></tr>";
    }
    echo "</table>";
	 } else {
		echo "No Messages.";
	 }
	 
	 close_connection(get_connection());
	 ?>
	 
      
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