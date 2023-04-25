<?php
    session_start();
    include "connect.php";
    $id=$_GET['Book_id'];
    $sql="delete from cart_details where Book_id='$id' and User_id='$_SESSION[user_id]'";
    $check=mysqli_query($con,$sql);
    header('location:cart.php');
?>