<?php
    include "connect.php";
    session_start();
    $user_id=$_SESSION['user_id'];
    $book_id=$_POST['book_id'];
    $quantity=$_POST['quantity'];
    $sql2="select * from cart_details where Book_id='$book_id' and User_id='$user_id'";
    $data=mysqli_query($con,$sql2);
    if(mysqli_num_rows($data))
    {
        $sql3="update cart_details set Quantity='$quantity' where Book_id='$book_id' and User_id='$user_id'";
        $check2=mysqli_query($con,$sql3);
        header('location:cart.php');
    }
    else if(!$_SESSION['user_id'])
    {
        header('location:login-register.php?res2=Please login first!');
    }
    else
    {
        $sql="insert into cart_details values('$book_id','$quantity','$user_id')";
        $check=mysqli_query($con,$sql);
        header('location:cart.php');    
    }
?>