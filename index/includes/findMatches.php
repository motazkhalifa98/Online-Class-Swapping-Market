<?php
    require  'getCourses.php';

    if(array_key_exists('button1', $_POST)){
        button(1)
    }

    if(array_key_exists('button2', $_POST)){
        button(2)
    }

    if(array_key_exists('button3', $_POST)){
        button(3)
    }

    if(array_key_exists('button4', $_POST)){
        button(4)
    }

    function button($class){
        echo "You have selected class: " + $class;
    }
?>