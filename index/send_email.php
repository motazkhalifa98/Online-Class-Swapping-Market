<?php
session_start();
?>

<!doctype html>
<html lang="en">
<body><h1>Rerouting</h1> 
<p><?php
require 'email.php';

$email = $_SESSION["userEmail"];
$_SESSION["code"] = generate_code();
email_code_verify($_SESSION["code"], $email);



?> </p>

<?php echo "<meta http-equiv = \"refresh\" content = \"0; url = 'verify_email1.php'\" />"; ?>
</body>