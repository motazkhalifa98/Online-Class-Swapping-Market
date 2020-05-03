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
        <link rel="stylesheet" href="deletePosts.css">
        <script
      src="https://use.fontawesome.com/releases/v5.12.1/js/all.js"
      data-auto-a11y="true"
    ></script>
        <title>Delete Posts</title>
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
                <a class="nav-link" href="account.php">Account </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="matches.php">Matches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="messages.php">Messages</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="post.php">Post<span class="sr-only">(current)</span></a>
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

        <h2>Posts to Delete</h2>

        <?php
            require 'mysql.php';
            $userId = $_SESSION["userId"];
            $arr = get_posts($userId);
            $offer = array();
            $request = array();
            while($row = $arr->fetch_assoc()){
                array_push($offer, $row["courseOffer"]);
                array_push($request, $row["courseRequest"]);
            }

            if(count($offer) == 0){
                echo("You have to make a post before you can delete them!");
            }

            else{
                echo("CONFIRMATION NEEDED!!<br>");
                echo("Do you really want to delete all of these posts?");
                for($i = 0; $i < count($offer); $i++){
                    $header = $offer[$i] . "-->" . $request[$i];
                    echo("<h5>$header</h5>");
                }
                echo("<form action=\"deletePosts.php\" method=\"post\"> <input type=\"submit\" name=\"delete\" value=\"DELETE AL POSTS\">");

                if(isset($_POST['delete'])){
                    delete_posts($userId);
                    header("Location: post.php");
                    echo "hello";
                }
            }
        ?>


        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>