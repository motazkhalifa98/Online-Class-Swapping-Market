<?php
    //ends session
    function end_session() {
        session_unset();
        session_destroy();
    }

    /*
    TODO:
    */
    function check_if_valid_session() {

    }

    // function get_uid() {
    //     start_session();
    //     return $SESSION["userId"];
    // }

    // function get_first_name() {
    //     return $_SESSION["userFirstName"];
    // }

    // function get_last_name() {
    //     return $SESSION["userLastName"];
    // }

    // function get_email() {
    //     return $SESSION["userEmail"];
    // }
    // session_start();
    // $_SESSION["userId"] = 1;
    // $_SESSION["firstName"] = "steve";
    // $_SESSION["lastName"] = "boy";
    // $_SESSION["userEmail"] = "steve@boy.com";
    // print_r($_SESSION);

    // end_session();
?>