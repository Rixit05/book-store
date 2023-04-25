<?php
    include "connect.php";
    session_start();
    $User_id=$_SESSION['user_id'];
    $book_id=$_POST['book_id'];
    $comment=$_POST['Message'];
    $rating=0;
    if(isset($_POST['star1']))
    {
        $rating=5;
    }
    else if(isset($_POST['star2']))
    {
        $rating=4;
    }
    else if(isset($_POST['star3']))
    {
        $rating=3;
    }
    else if(isset($_POST['star4']))
    {
        $rating=2;
    }
    else
    {
        $rating=1;
    }
    $sql1="select * from review_details where Book_id='$book_id' and User_id='$User_id' ";
    $data=mysqli_query($con,$sql1);
    if(!$_SESSION['user_id'])
    {
        header('location:login-register.php?res2=Please login first!');
    }
    if(!mysqli_num_rows($data))
    {
        $sql="insert into review_details values('$book_id','$User_id','$rating','$comment',CURDATE())";
        $check=mysqli_query($con,$sql);
        if($check)
        {
            echo '
            <html>
            <body>
                <script>history.back();</script>
            </body>
            </html>
            ';
        }
    }
    else
    {
        $sql2="update review_details set Review='$rating', Comment='$comment' where Book_id='$book_id' and User_id='$User_id'";
        $check2=mysqli_query($con,$sql2);
        echo '
        <html>
        <body>
            <script>history.back();</script>
        </body>
        </html>
        ';
    }
?>  