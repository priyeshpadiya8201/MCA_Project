<?php

require_once 'db.php';

function display_data(){
    global $con;
    $query = "select * from signup";
    $result = mysqli_query($con,$query);
    return $result;
}
?>