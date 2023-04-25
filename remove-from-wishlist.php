<?php
    include "connect.php";
    $user_id=$_GET['User_id'];
    $book_id=$_GET['Book_id'];
    $sql="delete from wishlist_details where User_id='$user_id' and Book_id='$book_id'";
    $check=mysqli_query($con,$sql);
    if($check)
    {
        header('location:wishlist.php');
    }
?>