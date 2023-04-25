<?php
    include "connect.php";
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $message=$_POST['Message'];
    $sql="insert into contact values(0,'$name','$email','$message')";
    $check=mysqli_query($con,$sql);
    if($check)
    {
        header('location:contact.php?res=Your response has been submitted!');   
    }
?>