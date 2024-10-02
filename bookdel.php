<?php
    include("testconn.php");
    $id=$_REQUEST['book_id'];
    //echo $id;
    $query="DELETE FROM books WHERE `books`.`id` = '$id'";
    $ans=mysqli_query($conn,$query);
    if($ans)
        header("location:viewbook.php");
    else
        header("location:viewbook.php");
?>