<!doctype html>
<html lang="en">
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
                    <button id="out_btn" class="btn my-2 my-sm-0" type="button" onclick=" to_home()">Log Out</button>
                </li>
            </ul>
            </div>
        </nav>

        <div class="jumbotron" id="j-bg">
            <h1 class="display-4">Hello, Malware!</h1>
            <p class="lead">
                Welcome to Trade School. We hope you find success crafting your dream schedule! 
            </p>
        </div>
        <div class="container" id="schedule">
          <div class="row no-gutters">
            <div class="col-2 center-block text-center stat-block header">Time</div>
            <div class="col-2 center-block text-center stat-block header">Monday</div>
            <div class="col-2 center-block text-center stat-block header">Tuesday</div>
            <div class="col-2 center-block text-center stat-block header">Wednesday</div>
            <div class="col-2 center-block text-center stat-block header">Thursday</div>
            <div class="col-2 center-block text-center stat-block header">Friday</div>
          </div>
          <div class="row no-gutters" id="x8">
            <div class="col-2 center-block text-center stat-block">8:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
          <div class="row no-gutters" id="x9">
            <div class="col-2 center-block text-center stat-block" >9:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
          <div class="row no-gutters" id="x10">
            <div class="col-2 center-block text-center stat-block" >10:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
          <div class="row no-gutters" id="x11">
            <div class="col-2 center-block text-center stat-block" >11:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
          <div class="row no-gutters" id="x12">
            <div class="col-2 center-block text-center stat-block" >12:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
          <div class="row no-gutters" id="x13">
            <div class="col-2 center-block text-center stat-block" >13:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
          <div class="row no-gutters" id="x14">
            <div class="col-2 center-block text-center stat-block" >14:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
          <div class="row no-gutters" id="x15">
            <div class="col-2 center-block text-center stat-block" >15:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
          <div class="row no-gutters" id="x16">
            <div class="col-2 center-block text-center stat-block" >16:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
          <div class="row no-gutters" id="x17">
            <div class="col-2 center-block text-center stat-block" >17:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
          <div class="row no-gutters" id="x18">
            <div class="col-2 center-block text-center stat-block" >18:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
          <div class="row no-gutters" id="x19">
            <div class="col-2 center-block text-center stat-block" >19:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
          <div class="row no-gutters" id="x20">
            <div class="col-2 center-block text-center stat-block" >20:00</div>
            <div class="col-2 center-block text-center cal-block monday"></div>
            <div class="col-2 center-block text-center cal-block tuesday"></div>
            <div class="col-2 center-block text-center cal-block wednesday"></div>
            <div class="col-2 center-block text-center cal-block thursday"></div>
            <div class="col-2 center-block text-center cal-block friday"></div>
          </div>
        </div>
        <div class="container center_div" >
            <br>
            <form id="add_frm"  action="sendCourse.php" method="post">
              <div class="form">
                <div class="col-auto">
                  <input type="text" class="form-control mb-2" id="course_id" name="course_id" placeholder="CSE 474">
                </div>
                <div class="col-auto">
                  <input type="text" class="form-control mb-2" id="course_id" name="course_name" placeholder="Machine Learning">
                </div>
                <div class="col-auto">
                  <input type="text" class="form-control mb-2" id="days" name="days" placeholder="M,W,F">
                </div>
                <div class="col-auto">
                  <input type="text" class="form-control mb-2" id="start_time" name="start_time" placeholder="14:00">
                </div>
                <div class="col-auto">
                  <input type="text" class="form-control mb-2" id="end_time" name="end_time" placeholder="14:50">
                </div>
                <div class="col-auto">
                  <input type="text" class="form-control mb-2" id="location" name="location" placeholder="Knox 104">
                </div>
                <div class="col-auto">
                  <button type="submit" id="sub_btn" class="btn mb-2" value="SUBMIT" >Add Course</button>
                </div>
              </div>
            </form>
        </div>
      
        <?php
          require_once 'mysql.php';
          
          $usr_id = 17;
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
            var text = course_id + '<br />' + course_name + '<br />' + location + '<br />' + start_time + "-" + end_time;
            var id = getID(start_time);
            var cls = getCls(days);
            for(i=0; i<cls.length; i++){
                var targetDiv = document.getElementById(id).getElementsByClassName(cls[i])[0]
                targetDiv.classList.add("added");
                targetDiv.innerHTML = text;
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

          function getID(time){
            if(time == "8:00"){
                return "x8";
            }else if(time == "9:00"){
                return "x9";
            }else if(time == "10:00" ){
                return "x10";
            }else if(time == "11:00"){
                return "x11";
            }else if(time == "12:00"){
                return "x12";
            }else if(time == "13:00"){
                return "x13";
            }else if(time == "14:00"){
                return "x14";
            }else if(time == "15:00"){
                return "x15";
            }else if(time == "16:00"){
                return "x16";
            }else if(time == "17:00"){
                return "x17";
            }else if(time == "18:00"){
                return "x18";
            }else if(time == "19:00"){
                return "x19";
            }else if(time == "20:00"){
                return "x20";
            }
          }
          
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      </body>
</html>
