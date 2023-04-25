<?php
            session_start();
            include "connect.php";
            $book_id=(int)$_GET['b_id'];
            $sql2="select * from wishlist_details where Book_id='$book_id' and User_id='$_SESSION[user_id]'";
            $data=mysqli_query($con,$sql2);
            if(mysqli_num_rows($data))
            {
                header('location:wishlist.php');
            }
            if($book_id && $_SESSION['user_id'])
            {
                $sql="insert into wishlist_details values('$book_id','$_SESSION[user_id]')";
                $check=mysqli_query($con,$sql);
                header('location:wishlist.php');
            }
            else
            {
                header('location:login-register.php?res2=Please login first!');
            }
?>