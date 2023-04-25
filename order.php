<?php
    include "connect.php";
    session_start();
    $User_id=$_SESSION['user_id'];
    $Name=$_POST['Name'];
    $Phone=$_POST['Phone'];
    $Pin=$_POST['Pin'];
    $Address=$_POST['Address'];
    $Town=$_POST['Town'];
    $State=$_POST['State'];
    $sql1="insert into address_details values(0,'$User_id','$Name','$Address','$Town','$State','$Pin','$Phone')";
    $check1=mysqli_query($con,$sql1);
    $sql5="select * from address_details where User_id='$User_id'";
    $data2=mysqli_query($con,$sql5);
    while($result3=mysqli_fetch_array($data2))
    {
        $id1=$result3['Address_id'];
    }

    if(isset($_POST['Check']))
    {
        $Name1=$_POST['Name1'];
        $Phone1=$_POST['Phone1'];
        $Pin1=$_POST['Pin1'];
        $Address1=$_POST['Address1'];
        $Town1=$_POST['Town1'];
        $State1=$_POST['State1'];
        $sql2="insert into address_details values(0,'$User_id','$Name1','$Address1','$Town1','$State1','$Pin1','$Phone1')";
        $check2=mysqli_query($con,$sql2);
        $sql3="select * from address_details where User_id='$User_id'";
        $data1=mysqli_query($con,$sql3);
        while($result4=mysqli_fetch_array($data1))
        {
            $id2=$result4['Address_id'];
        }
        $sql4="insert into order_header values(0,'$User_id',NOW(),'$id2','$id1','1','1')";
        $check3=mysqli_query($con,$sql4);
    }
    else
    {
        $sql5="insert into order_header values(0,'$User_id',NOW(),'$id1','$id1','1','1')";
        $check4=mysqli_query($con,$sql5);
    }
    $sql6="select * from order_header where User_id='$User_id'";
    $data3=mysqli_query($con,$sql6);
    while($result2=mysqli_fetch_array($data3))
    {
        $Order_id=$result2['Order_id'];
    }
    $sql7="select * from cart_details where User_id='$User_id'";
    $data4=mysqli_query($con,$sql7);
    $total=0;
    while($result=mysqli_fetch_array($data4))
    {
        $book_id=$result['Book_id'];
        $sql9="select * from book_details where Book_id='$book_id'";
        $data5=mysqli_query($con,$sql9);
        $result1=mysqli_fetch_array($data5);
        $price=($result1['Price']-($result1['Discount']*$result1['Price'])/100)*$result['Quantity'];
        $total+=$price;
        $quantity=$result['Quantity'];
        $result1['Quantity']-=$result['Quantity'];
        $sql8="insert into order_details values('$Order_id','$book_id','$quantity','$price')";
        $check5=mysqli_query($con,$sql8);
    }
    if($total<500)
    {
        $shipping_charge=50;
    }
    else
    {
        $shipping_charge=0;
    }
    $sql10="update order_header set Total=$total, Shipping_charge=$shipping_charge where Order_id='$Order_id'";
    $check7=mysqli_query($con,$sql10);
    $sql9="delete from cart_details where User_id='$User_id'";
    $check6=mysqli_query($con,$sql9);
    header('location:order-complete.php');
?>