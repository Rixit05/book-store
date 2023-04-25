<?php
    include "connect.php";
    if($_POST['register'])
    {
        
        $Id=0;
        $Admin=0;
        $name=$_POST['Name'];
        $email=$_POST['Email'];
        $password=$_POST['Password'];

        $sql3="select * from user_details where Email='$email'";
        $data=mysqli_query($con,$sql3);
        if(mysqli_num_rows($data)!=0)
        {
            header('location:login-register.php?err=Email is already in use!');
        }
        else
        {
            $sql1="insert into user_details values($Id,'$name','$email','$password',$Admin)";
            $check=mysqli_query($con,$sql1);
            if($check)
            {
                header('location:login-register.php?res1=You have registered successfully!');
            }
        }
    }
?>