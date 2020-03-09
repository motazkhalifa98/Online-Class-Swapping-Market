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
                <a class="nav-link" href="matches.html">Matches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="underconstruction.html">Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post.html">Post</a>
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

        <div class="cent" style="overflow-x:auto;">
          <h2>Your Schedule</h2>
          <table>
            <thead>
              <tr>
                <th></th>
                <th>
                  <span class="long">Monday</span>
                  <span class="short">Mon</span>
                </th>
                <th>
                  <span class="long">Tuesday</span>
                  <span class="short">Tue</span>
                </th>
                <th>
                  <span class="long">Wednesday</span>
                  <span class="short">We</span>
                </th>
                <th>
                  <span class="long">Thursday</span>
                  <span class="short">Thur</span>
                </th>
                <th>
                  <span class="long">Friday</span>
                  <span class="short">Fri</span>
                </th>
                
              </tr>
            </thead>
            <tbody>
              <tr id="h8">
                <td class="hour" ><span>8:00 am</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h83">
                <td class="hour" ><span>8:30 am</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h9">
                <td class="hour"><span>9:00 am</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h93">
                <td class="hour" ><span>9:30 am</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h10">
                <td class="hour" ><span>10:00 am</span></td>
                <td class="monday cse312" >CSE 312</td>
                <td class="tuesday"></td>
                <td class="wednesday cse312">CSE 312</td>
                <td class="thursaday"></td>
                <td class="friday cse312">CSE 312</td>
              </tr>
              <tr id="h103">
                <td class="hour" ><span>10:30 am</span></td>
                <td class="monday cse312">Talbert 107</td>
                <td class="tuesday"></td>
                <td class="wednesday cse312">Tablert 107</td>
                <td class="thursaday"></td>
                <td class="friday cse312">Talbert 107</td>
              </tr>
              <tr id="h11">
                <td class="hour" ><span>11:00am</span></td>
                <td class="monday cse442">CSE 442R</td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h113">
                <td class="hour" ><span>11:30 am</span></td>
                <td class="monday cse442">Baldy 19</td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h12">
                <td class="hour" ><span>12:00pm</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h123">
                <td class="hour" ><span>12:30 am</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h1">
                <td class="hour"><span>1:00pm</span></td>
                <td class="monday cse474">CSE 474</td>
                <td class="tuesday"></td>
                <td class="wednesday cse474">CSE 474</td>
                <td class="thursaday"></td>
                <td class="friday cse474">CSE 474</td>
              </tr>
              <tr id="h13">
                <td class="hour" ><span>1:30 am</span></td>
                <td class="monday cse474">Knox 20</td>
                <td class="tuesday"></td>
                <td class="wednesday cse474">Knox 20</td>
                <td class="thursaday"></td>
                <td class="friday cse474">Knox 20</td>
              </tr>
              <tr id="h2">
                <td class="hour"><span>2:00pm</span></td>
                <td class="monday"></td>
                <td class="tuesday cse489">CSE 489</td>
                <td class="wednesday"></td>
                <td class="thursaday cse489">CSE 489</td>
                <td class="friday"></td>
              </tr>
              <tr id="h23">
                <td class="hour" ><span>2:30 am</span></td>
                <td class="monday"></td>
                <td class="tuesday cse489">NSC 215</td>
                <td class="wednesday"></td>
                <td class="thursaday cse489">NSC 215</td>
                <td class="friday"></td>
              </tr>
              <tr id="h3">
                <td class="hour"><span>3:00pm</span></td>
                <td class="monday cse442">CSE 442</td>
                <td class="tuesday cse489"></td>
                <td class="wednesday cse442">CSE 442</td>
                <td class="thursaday cse489"></td>
                <td class="friday cse442">CSE 442</td>
              </tr>
              <tr id="h33">
                <td class="hour"><span>3:30 am</span></td>
                <td class="monday cse442">Knox 104</td>
                <td class="tuesday"></td>
                <td class="wednesday cse442">Knox 104</td>
                <td class="thursaday"></td>
                <td class="friday cse442">Knox 104</td>
              </tr>
              <tr id="h4">
                <td class="hour"><span>4:00pm</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h43">
                <td class="hour" ><span>4:30 am</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h5">
                <td class="hour"><span>5:00pm</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h53">
                <td class="hour" ><span>5:30 am</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h6">
                <td class="hour"><span>6:00pm</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h63">
                <td class="hour" ><span>6:30 am</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h7">
                <td class="hour"><span>7:00pm</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
              <tr id="h73">
                <td class="hour" ><span>7:30 am</span></td>
                <td class="monday"></td>
                <td class="tuesday"></td>
                <td class="wednesday"></td>
                <td class="thursaday"></td>
                <td class="friday"></td>
              </tr>
            </tbody>
          </table>
        </div>
        
        <div class="cent">
            <br>
            <h2>Courses</h2>
            <ul class="list-group" id="course_list">
              <li class="list-group-item">CSE 312, MWF, 10:00 am - 10:50 am in Talbert 107</li>
              <li class="list-group-item">CSE 442, M, 11:00 am - 11:50 am in Baldy 19</li>
              <li class="list-group-item">CSE 474, MWF, 1:00 pm - 1:50 pm in Knox 20</li>
              <li class="list-group-item">CSE 489, TTh, 2:00 pm - 3:20 pm in NSC 215</li>
              <li class="list-group-item">CSE 442, MWF, 3:00 pm - 3:50 pm in Knox 104</li>
            </ul>
            <br>
        </div>

        <div class="container center_div">
            <br>
            <form id="add_frm" >
                <div class="form-row align-items-center">
                  <div class="col-auto">
                    <input type="text" class="form-control mb-2" id="course_id" name="course_id" placeholder="CSE 442">
                  </div>
                  <div class="col-auto">
                    <input type="text" class="form-control mb-2" id="days" name="days" placeholder="MWF">
                  </div>
                  <div class="col-auto">
                    <input type="text" class="form-control mb-2" id="start_time" name="start_time" placeholder="3:00 pm">
                  </div>
                  <div class="col-auto">
                    <input type="text" class="form-control mb-2" id="end_time" name="end_time" placeholder="3:50 pm">
                  </div>
                  <div class="col-auto">
                    <input type="text" class="form-control mb-2" id="location" name="location" placeholder="Knox 104">
                  </div>
                  <div class="col-auto">
                    <button type="submit" id="sub_btn" class="btn mb-2" onclick="addCourse()">Add Course</button>
                  </div>
                </div>
              </form>
        </div>
       
          
        
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="account.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    
      </body>
</html>