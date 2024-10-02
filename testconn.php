<?php
    $conn = mysqli_connect("localhost","root","","LMS");

    if($conn)
    {
        // echo "Connected";
    }
    else
    {
        die("notconnected");
    }
?>