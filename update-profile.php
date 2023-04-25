<?php
    include "connect.php";
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $old_password=$_POST['Old_password'];
    $new_password1=$_POST['New_password1'];
    $new_password2=$_POST['New_password2'];
    if($new_password1!=$new_password2)
    {
        header('location:my-account.php?err1=Both passwords didn\'t match!');
    }
    else
    {
        $sql="select * from user_details where Email='$email' and Password='$old_password'";
        $data=mysqli_query($con,$sql);
        if(!mysqli_num_rows($data))
        {
            header('location:my-account.php?err1=Password is invalid!');
        }
        else
        {
            $sql1="update user_details set Password='$new_password1', Name='$name' where Email='$email'";
            $check=mysqli_query($con,$sql1);
            if($check)
            {
                header('location:my-account.php?res1=Data updated successfully!');
            }
        }
    }
?>