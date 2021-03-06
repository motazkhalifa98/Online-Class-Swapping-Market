<!DOCTYPE html>
<html lang="en-US">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="matches.css">
        <script 
         src="https://use.fontawesome.com/releases/v5.12.1/js/all.js"
         data-auto-a11y="true"
         ></script>
    </head>

    <body>
		
		<?php
		//require 'mysql.php';
		
		//test if get matches echoes out the selected user's schedule
		//test_matches();
		
		?>

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
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-cog"></i></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="underconstruction.html">Edit Information</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="underconstruction.html">Delete Account</a>
                    </div>
                </li>
                <li class="nav-item">
                    <button id="out_btn" class="btn my-2 my-sm-0" type="button" onclick="to_home()">Log Out</button>
                </li>
            </ul>
            </div>
        </nav>

        <h1>Your Matches</h1>

 	<?php

            //use the info list of matches from get_matches to make buttons for each matched user
            //this is still using the test info until we have a way to pull post information and verify current user
            

            //when posts page is finished, will cycle through each posted class
           // echo "<h2>$second_class</h2>";

           // for ($i = 0; $i < $arr_len; $i++){
           //     echo "<button class='match_button'>$arr[$i]</button>";
                //each button needs to link to messaging with specified user
           // }

        ?>

        <form id="classes" action="includes/findMatches.php" method="post">
            <button class="button" onclick="alert('Messaging user')" id="button1">Your</button>
            <button class="button" onclick="alert('Messaging user')" id="button2">Matches</button>
            <button class="button" onclick="alert('Messaging user')" id="button3">Go</button>
            <button class="button" onclick="alert('Messaging user')" id="button4">Here</button>
        </form>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>


</html>
