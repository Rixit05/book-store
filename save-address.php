<?php
    session_start();
    error_reporting(1);
	include "connect.php";
    $User_id=$_SESSION['user_id'];
    $Address_id=$_POST['Address_id'];
    $Name=$_POST['Name'];
    $Phone=$_POST['Phone'];
    $Pin=$_POST['Pin'];
    $Address=$_POST['Address'];
    $City=$_POST['City'];
    $State=$_POST['State'];
    $sql2="update address_details set Name='$Name', Address='$Address', City='$City', State='$State', Pincode='$Pin', Phone='$Phone' where Address_id='$Address_id'";
    $check2=mysqli_query($con,$sql2);
    header('location:my-account.php');
?>