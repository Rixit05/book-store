<?php
    session_start();
    include "connect.php";
    $book_id=$_GET['Id'];
    $sql11="select * from wishlist_details where Book_id='$book_id'";
    $data1=mysqli_query($con,$sql11);
    if(mysqli_num_rows($data1))
    {
        $sql1="delete from wishlist_details where Book_id='$book_id'";
        $check1=mysqli_query($con,$sql1);
    }
    $sql21="select * from cart_details where Book_id='$book_id'";
    $data2=mysqli_query($con,$sql21);
    if(mysqli_num_rows($data2))
    {
        $sql2="delete from cart_details where Book_id='$book_id'";
        $check2=mysqli_query($con,$sql2);
    }
    $sql3="update book_details set Status=0 where Book_id='$book_id'";
    $check3=mysqli_query($con,$sql3);
    header('location:admin-shop.php');
?>