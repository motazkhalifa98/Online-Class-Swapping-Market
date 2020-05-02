<?php     
    session_start();

?>
<!doctype html>
<html lang="en">
<?php
   require_once 'checkSession.php';
?>
    <!-- <meta http-equiv = "refresh" content = "0; url = 'Login Page.php'" /> -->
    <head>
      <meta charset="UTF-8">
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
      <link rel="stylesheet" href="calendar.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="account.css">
      <script
      src="https://use.fontawesome.com/releases/v5.12.1/js/all.js"
      data-auto-a11y="true"
      ></script>

      
      
      <title>Account Page</title>
    </head>
    <body>

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark " id="nav-bg">
            <a class="navbar-brand" href="#"><i class="fas fa-bug"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                <a class="nav-link" href="#">Account <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="matches.php">Matches</a>
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

        <div class="jumbotron" id="j-bg">

            <?php
            require_once 'session.php';
            //$var = "poo";
            //  print_r($_SESSION);

            $f_name = $_SESSION["userFirstName"];
            $l_name = $_SESSION["userLastName"];
            $username = $_SESSION["username"];
            // $uid = $_SESSION["userId"];
            echo "<h1 class=\"display-4\">Hello $f_name, $l_name! Username: $username </h1>";
            if ($_SESSION["isVerified"] == 1) {
              echo "<p>Your account is verified!</p>";

            } else {
              echo "<p>Looks like your account is not verified, please </p> <a href='send_email.php'>verify your email here</a>";
              echo "<br><br>";
              echo "";
            }
            ?>

            <p class="lead">
                Welcome to Trade School. We hope you find success crafting your dream schedule! 
            </p>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-6">
              <div id="form">
                <form id="add_frm"  action="sendCourse.php" method="post">
                  <div class="form-row justify-content-center align-items-center">
                    <label for="course_id" class="col-sm-2 col-form-label">Course ID:</label>
                    <div class="col-auto">
                      <input type="text" class="form-control" id="course_id" name="course_id" placeholder="CSE 474">
                    </div>
                  </div>
                  <div class="form-row justify-content-center align-items-center">
                      <label for="course_name" class="col-sm-2 col-form-label">Name:</label>
                      <div class="col-auto">
                        <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Machine Learning">
                      </div>
                  </div>
                  <div class="form-row justify-content-center align-items-center">
                      <label for="days" class="col-sm-2 col-form-label">Days:</label>
                      <div class="col-auto">
                        <input type="text" class="form-control" id="days" name="days" placeholder="M,W,F">
                      </div>
                  </div>
                  <div class="form-row justify-content-center align-items-center">
                      <label for="start_time" class="col-sm-2 col-form-label">Start Time:</label>
                      <div class="col-auto">
                        <input type="text" class="form-control" id="start_time" name="start_time" placeholder="14:00">
                      </div>
                  </div>
                  <div class="form-row justify-content-center align-items-center">
                      <label for="end_time" class="col-sm-2 col-form-label">End Time:</label>
                      <div class="col-auto">
                        <input type="text" class="form-control" id="end_time" name="end_time" placeholder="14:50">
                      </div>
                  </div>
                  <div class="form-row justify-content-center align-items-center">
                      <label for="location" class="col-sm-2 col-form-label">Location:</label>
                      <div class="col-auto">
                        <input type="text" class="form-control" id="location" name="location" placeholder="Knox 104">
                      </div>
                  </div>
                  <br>
                  <div class="form-row justify-content-center align-items-center">

                    <div class="col-4">
                      <button type="submit" id="sub_btn" class="btn" value="SUBMIT">Add Course</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-6">
              <div class="container" id="schedule">
                <div class="row no-gutters">
                  <div class=" col-2 center-block text-center stat-block header">Time</div>
                  <div class=" col-2 center-block text-center stat-block header">Mon.</div>
                  <div class=" col-2 center-block text-center stat-block header">Tues.</div>
                  <div class=" col-2 center-block text-center stat-block header">Wed.</div>
                  <div class=" col-2 center-block text-center stat-block header">Thurs.</div>
                  <div class=" col-2 center-block text-center stat-block header">Fri.</div>
                </div>
                <div class="row no-gutters" id="x8">
                  <div class=" col-2 center-block text-center stat-block">8:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x83">
                  <div class=" col-2 center-block text-center stat-block">8:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x9">
                  <div class=" col-2 center-block text-center stat-block" >9:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x93">
                  <div class=" col-2 center-block text-center stat-block">9:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x10">
                  <div class=" col-2 center-block text-center stat-block" >10:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x103">
                  <div class=" col-2 center-block text-center stat-block">10:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x11">
                  <div class=" col-2 center-block text-center stat-block" >11:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x113">
                  <div class=" col-2 center-block text-center stat-block">11:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x12">
                  <div class=" col-2 center-block text-center stat-block" >12:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x123">
                  <div class=" col-2 center-block text-center stat-block">12:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x13">
                  <div class=" col-2 center-block text-center stat-block" >13:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x133">
                  <div class=" col-2 center-block text-center stat-block">13:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x14">
                  <div class=" col-2 center-block text-center stat-block" >14:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x143">
                  <div class=" col-2 center-block text-center stat-block">14:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x15">
                  <div class=" col-2 center-block text-center stat-block" >15:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x153">
                  <div class=" col-2 center-block text-center stat-block">15:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x16">
                  <div class=" col-2 center-block text-center stat-block" >16:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x163">
                  <div class=" col-2 center-block text-center stat-block">16:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x17">
                  <div class=" col-2 center-block text-center stat-block" >17:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x173">
                  <div class=" col-2 center-block text-center stat-block">17:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x18">
                  <div class=" col-2 center-block text-center stat-block" >18:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x183">
                  <div class=" col-2 center-block text-center stat-block">18:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x19">
                  <div class=" col-2 center-block text-center stat-block" >19:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x193">
                  <div class=" col-2 center-block text-center stat-block">19:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x20">
                  <div class=" col-2 center-block text-center stat-block" >20:00</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
                <div class="row no-gutters" id="x203">
                  <div class=" col-2 center-block text-center stat-block">20:30</div>
                  <div class=" col-2 center-block text-center cal-block monday"></div>
                  <div class=" col-2 center-block text-center cal-block tuesday"></div>
                  <div class=" col-2 center-block text-center cal-block wednesday"></div>
                  <div class=" col-2 center-block text-center cal-block thursday"></div>
                  <div class=" col-2 center-block text-center cal-block friday"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <?php
          require_once 'mysql.php';
          $usr_id = $_SESSION["userId"];
          $sql = "SELECT courseId, courseName, days, startTime, endTime, location FROM courseInfo WHERE userId = '$usr_id'";
          $conn = get_connection();
          $results = query_database($conn, $sql);
          if(mysqli_num_rows($results) > 0){
            $data = "";
              while($row = mysqli_fetch_assoc($results)){
                  $data .= $row["courseId"] . "+" . $row["courseName"] . "+" . $row["days"] . "+" . $row["startTime"] . "+" . $row["endTime"] . "+" . $row["location"];
                  $data .= "!";
              }
              $data  = substr($data, 0, -1);
          }else{
              $data = "yikes";
          }
        ?>
        <script>
          addCourse();
          function addCourse(){
            var sql = '<?php echo $data ;?>';
            console.log(sql);
            var courses = sql.split("!");
            for(var i=0; i<courses.length; i++){
              var arr = courses[i].split("+");
              var course_id = arr[0];
              var course_name = arr[1];
              var days = arr[2];
              var start = arr[3];
              var end = arr[4];
              var location = arr[5];
              setCourse(course_id, course_name, days, start, end, location);
            }
          }

          function setCourse(course_id, course_name, days, start_time, end_time, location){
            var text = course_id +'<br />' + location;
            start = start_time.split(":");
            end = end_time.split(":");
            start_hour = start[0];
            start_minutes = start[1];
            end_hour = end[0];
            end_minutes = end[1];
            var id = getID(start_hour, start_minutes, end_hour, end_minutes);
            var cls = getCls(days);
            
            for(j=0; j<id.length; j++){
              for(i=0; i<cls.length; i++){
                var targetDiv = document.getElementById(id[j]).getElementsByClassName(cls[i])[0];
                targetDiv.classList.add("added");
                targetDiv.innerHTML = text;
              }
            }
            
          } 

          function getCls(days){
            var d = [];
            if(days.includes("M")){
                d.push("monday");
            }
            if(days.includes("T")){
                d.push("tuesday");
            }
            if(days.includes("W")){
                d.push("wednesday");
            }
            if(days.includes("Th")){
                d.push("thursday");
            }
            if(days.includes("F")){
                d.push("friday");
            }
            return d;
          }

          function getID(sh, sm, eh, em){
            if(sm == "30"){
              if(em == "30" || em == "20"){
                return getRegularHalf(sh);
              }else{
                return getLongHalf(sh);
              }
            }else{
              if(em == "30" || em == "20"){
                return getLong(sh);
              }else{
                return getRegular(sh);
              }
            }
          }

          function getRegular(sh){
            var times = [];
            if(sh == "8"){
              times.push("x8");
              times.push("x83");
              return times;
            }else if (sh == "9"){
              times.push("x9");
              times.push("x93");
              return times;
            }else if (sh == "10"){
              times.push("x10");
              times.push("x103");
              return times;
            }else if (sh == "11"){
              times.push("x11");
              times.push("x113");
              return times;
            }else if (sh == "12"){
              times.push("x12");
              times.push("x123");
              return times;
            }else if (sh == "13"){
              times.push("x13");
              times.push("x133");
              return times;
            }else if (sh == "14"){
              times.push("x14");
              times.push("x143");
              return times;
            }else if (sh == "15"){
              times.push("x15");
              times.push("x153");
              return times;
            }else if (sh == "16"){
              times.push("x16");
              times.push("x163");
              return times;
            }else if (sh == "17"){
              times.push("x17");
              times.push("x173");
              return times;
            }else if (sh == "18"){
              times.push("x18");
              times.push("x183");
              return times;
            }else if (sh == "19"){
              times.push("x19");
              times.push("x193");
              return times;
            }else if (sh == "20"){
              times.push("x20");
              times.push("x203");
              return times;
            }
          }

          function getLong(sh){
            var times = [];
            if(sh == "8"){
              times.push("x8");
              times.push("x83");
              times.push("x9");
              return times;
            }else if (sh == "9"){
              times.push("x9");
              times.push("x93");
              times.push("x10");
              return times;
            }else if (sh == "10"){
              times.push("x10");
              times.push("x103");
              times.push("x11");
              return times;
            }else if (sh == "11"){
              times.push("x11");
              times.push("x113");
              times.push("x12");
              return times;
            }else if (sh == "12"){
              times.push("x12");
              times.push("x123");
              times.push("x13");
              return times;
            }else if (sh == "13"){
              times.push("x13");
              times.push("x133");
              times.push("x14");
              return times;
            }else if (sh == "14"){
              times.push("x14");
              times.push("x143");
              times.push("x15");
              return times;
            }else if (sh == "15"){
              times.push("x15");
              times.push("x153");
              times.push("x16");
              return times;
            }else if (sh == "16"){
              times.push("x16");
              times.push("x163");
              times.push("x17");
              return times;
            }else if (sh == "17"){
              times.push("x17");
              times.push("x173");
              times.push("x18");
              return times;
            }else if (sh == "18"){
              times.push("x18");
              times.push("x183");
              times.push("x19");
              return times;
            }else if (sh == "19"){
              times.push("x19");
              times.push("x193");
              times.push("x20");
              return times;
            }
          }

          function getRegularHalf(sh){
            var times = [];
            if(sh == "8"){
              times.push("x83");
              times.push("x9");
              return times;
            }else if (sh == "9"){
              times.push("x93");
              times.push("x10");
              return times;
            }else if (sh == "10"){
              times.push("x103");
              times.push("x11");
              return times;
            }else if (sh == "11"){
              times.push("x113");
              times.push("x12");
              return times;
            }else if (sh == "12"){
              times.push("x123");
              times.push("x13");
              return times;
            }else if (sh == "13"){
              times.push("x133");
              times.push("x14");
              return times;
            }else if (sh == "14"){
              times.push("x143");
              times.push("x15");
              return times;
            }else if (sh == "15"){
              times.push("x153");
              times.push("x16");
              return times;
            }else if (sh == "16"){
              times.push("x163");
              times.push("x17");
              return times;
            }else if (sh == "17"){
              times.push("x173");
              times.push("x18");
              return times;
            }else if (sh == "18"){
              times.push("x183");
              times.push("x19");
              return times;
            }else if (sh == "19"){
              times.push("x193");
              times.push("x20");
              return times;
            }
          }

          function getLongHalf(sh){
            var times = [];
            if(sh == "8"){
              times.push("x83");
              times.push("x9");
              times.push("x93");
              return times;
            }else if (sh == "9"){
              times.push("x93");
              times.push("x10");
              times.push("x103");
              return times;
            }else if (sh == "10"){
              times.push("x103");
              times.push("x11");
              times.push("x113");
              return times;
            }else if (sh == "11"){
              times.push("x113");
              times.push("x12");
              times.push("x123");
              return times;
            }else if (sh == "12"){
              times.push("x123");
              times.push("x13");
              times.push("x133");
              return times;
            }else if (sh == "13"){
              times.push("x133");
              times.push("x14");
              times.push("x143");
              return times;
            }else if (sh == "14"){
              times.push("x143");
              times.push("x15");
              times.push("x153");
              return times;
            }else if (sh == "15"){
              times.push("x153");
              times.push("x16");
              times.push("x163");
              return times;
            }else if (sh == "16"){
              times.push("x163");
              times.push("x17");
              times.push("x173");
              return times;
            }else if (sh == "17"){
              times.push("x173");
              times.push("x18");
              times.push("x183");
              return times;
            }else if (sh == "18"){
              times.push("x183");
              times.push("x19");
              times.push("x193");
              return times;
            }else if (sh == "19"){
              times.push("x193");
              times.push("x20");
              times.push("x203");
              return times;
            }
          }
          
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      </body>
</html>
