<?php
    //routes back to sign in if session not valid
    if( !(isset($_SESSION['userId']) && !empty($_SESSION['userId'])) ) {
      echo "<meta http-equiv = \"refresh\" content = \"0; url = 'Login Page.php'\" />";
    } 
?>