<?php
    include "connect.php";
    $id=$_GET['id'];
    $sql="delete from contact where Contact_id=$id";
    $check=mysqli_query($con,$sql);
    if($check)
    {
        header('location:admin-contact.php');
    }
?>