<?php
    include "connect.php";
    // error_reporting(0);
    session_start();
    $Book_id=$_GET['Book_id'];
    $User_id=$_SESSION['user_id'];
    $sql="delete from review_details where Book_id='$Book_id' and User_id='$User_id'";
    $check=mysqli_query($con,$sql);

    echo '
    <html>
    <body>
        <script>history.back();</script>
    </body>
    </html>
    ';
?>