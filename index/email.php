<?php

/**
 * TODO: function that verifies email
 * should generate 5 character code and email it to the $email
 * check if code generated is correct
 */
    function email_verify() {

    }

    /**
     * TODO: function email_advisor takes in advisor email parameter and sends
     * a default email format 
     */

    function email_advisor($advisor_email) {


    }


    /**
     * TODO: generates a random 15 character code for confirmation
     */
    function generate_code() {
        $str_rand = "";
        for($i = 0; $i < 15; $i++) {
            $str_rand = $str_rand . chr(rand(65,90));
        }
        return $str_rand;
    }

    function email_code($code, $email) {
        $to = $email;
        $subject = "Password Reset";

        $message = "
        <html>
        <head>
        <title>Password Reset Code Definitely Not Malware</title>
        </head>
        <body>
        <p>Looks like you are resetting your password! Your code is: </p>
        <h3> ". $code . " </h3>

        <p>Next time remember it better ya dingus</p> 
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <DefinitelyNotMalware@malware.com>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";

        mail($to,$subject,$message,$headers);
    }
    // email_code("test code", "frojeslosi@mybx.site");
?>