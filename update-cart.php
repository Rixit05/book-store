<?php
	session_start();
	include "connect.php";
	$user_id=$_SESSION['user_id'];
	$book_id=$_POST['book_id'];
	$quantity=$_POST["Quantity"];
	$sql="update cart_details set Quantity='$quantity' where User_id='$user_id' and Book_id='$book_id'";
	$check=mysqli_query($con,$sql);
	if($check)
	{
		header('location:cart.php');
	}
?>