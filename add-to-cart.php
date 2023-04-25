<?php
    session_start();
    include "connect.php";
    $book_id=$_GET['book_id'];
    $sql2="select * from cart_details where Book_id='$book_id' and User_id='$_SESSION[user_id]'";
    $data=mysqli_query($con,$sql2);
    if(mysqli_num_rows($data))
    {
        header('location:cart.php');
    }
    else if($book_id && $_SESSION['user_id'])
    {
        $sql="insert into cart_details values('$book_id','1','$_SESSION[user_id]')";
        $check=mysqli_query($con,$sql);
        header('location:cart.php');
    }
    else
    {
        header('location:login-register.php?res2=Please login first!');
    }
?>