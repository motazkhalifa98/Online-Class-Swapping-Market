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
        <link rel="stylesheet" href="matches.css">
        <script 
         src="https://use.fontawesome.com/releases/v5.12.1/js/all.js"
         data-auto-a11y="true"
         ></script>
    </head>

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
                      <a class="dropdown-item" href="Verify Delete.php">Delete Account</a>
                    </div>
                </li>
                <li class="nav-item">
                    <button id="out_btn" class="btn my-2 my-sm-0" type="button" onclick="location.href = 'logout.php';">Log Out</button>
                </li>
            </ul>
            </div>
        </nav>

        <h1>Your Matches</h1>

 	    <?php

            require 'mysql.php';
            
            //Call the benchmark_matches() function here for testing.
            benchmark_matches();
            
            $connection = get_connection();

            $curr_user = $_SESSION["userId"];
            
            /*
            $courseRequested = $_SESSION["courseWant"];
            $coursePosted = $_SESSION["coursePost"];
            */
            
            
            /* Get all the current user's swap request posts from the swapRequest table. */
            $statement = "SELECT * FROM swapRequest WHERE userId='$curr_user'";
            $result = query_database($connection, $statement);
            
            /* Load the swap request rows from the table into an array. */
            $curr_user_swaps = array();
            while ($row = $result->fetch_assoc()) {
				array_push($curr_user_swaps, $row);
			}
			$num_swaps = count($curr_user_swaps);

			if ($num_swaps == 0) {
				echo "Please create a request on the post page";
			}
			else {
				/* Iterate through each row to get matches for each swap. */
				for ($itr = 0; $itr < $num_swaps; $itr++) {
					/* Load the current row into the local loop variables */
					$courseRequested = $curr_user_swaps[$itr]["courseRequest"];
					$coursePosted = $curr_user_swaps[$itr]["courseOffer"];
					
					//echo "DBG: courseRequested: " . $courseRequested . "<br>";
					//echo "DBG: coursePosted: " . $coursePosted . "<br>";
					
	                $arr = get_matches($curr_user, $coursePosted, $courseRequested);
	                $arr_len = count($arr);
	                
	                /*
	                echo "DBG: arr_len: " . $arr_len . "<br>";
	                echo "DBG: elements <br>";
	                for ($k = 0; $k < $arr_len; $k++) {
						echo "arr#: " . $k . "- id: " . $arr[$k] . "<br>";
					}
					*/
	
	                echo "<h2>$courseRequested</h2>";
	               
	                if($arr_len == 0){
	                    echo("No matches found");
	                }
	                else {
	                    for($i = 0; $i < $arr_len; $i++){
	                        echo ("<h6> Matched With User: </h6>");
	                        $name = get_username($arr[$i]);
	                        echo ("<button class='match_button' onclick=\"location.href = 'messages.php'\">$name</button>");
	
	                    }
	                }
				} /* END OF FOR LOOP */
			}
            
            close_connection($connection);

        ?>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>


</html>
