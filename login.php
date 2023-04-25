<?php
    include "connect.php";
    if($_POST['login'])
    {
        $email1=$_POST['Email1'];
        $password1=$_POST['Password1'];
        $sql="select * from user_details where Email='$email1' && Password='$password1'";
        $data=mysqli_query($con,$sql);
        if(mysqli_num_rows($data)!=0)
        {
            $result=mysqli_fetch_array($data);
            session_start();
            if($result['Admin']=='1')
            {
                $_SESSION['user_id']=$result['User_id'];
                header('location:admin-shop.php');
            }
            else
            {
                $_SESSION['user_id']=$result['User_id'];
                header('location:index.php');
            }
        }
        else
        {
            header('location:login-register.php?res2=Invalid email or password');
        }
    }
?>