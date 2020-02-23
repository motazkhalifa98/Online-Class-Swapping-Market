
<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  


<?php
// define variables and set to empty values
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

//html for displaying/receiving info
<h2>Class Swapper Sign in Page</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Password: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


//spits back input
<?php
// echo "<h2>Your Input:</h2>";
// echo $name;
// echo "<br>";
// echo $email;
// echo "<br>";

include 'mysql.php';
run_db_check_email($email, $name)
?>

</body>
</html>