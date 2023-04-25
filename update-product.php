<?php
    include "connect.php";
    // error_reporting(0);
    session_start();
    if(isset($_POST['Update']))
    {
        $book_id=$_POST['book_id'];
        $title=$_POST['Title'];
        $author_name=$_POST['Author_name'];
        $price=$_POST['Price'];
        $quantity=$_POST['Quantity'];
        $discount=$_POST['Discount'];
        $genre1=NULL;
        if($_POST['Genre1']!='Genre')
        {
            $genre1=$_POST['Genre1'];
        }
        $genre2=NULL;
        if($_POST['Genre2']!='Genre')
        {
            $genre2=$_POST['Genre2'];
        }
        $genre3=NULL;
        if($_POST['Genre3']!='Genre')
        {
            $genre3=$_POST['Genre3'];
        }
        $genre4=NULL;
        if($_POST['Genre4']!='Genre')
        {
            $genre4=$_POST['Genre4'];
        }
        $genre5=NULL;
        if($_POST['Genre5']!='Genre')
        {
            $genre5=$_POST['Genre5'];
        }
        $description=$_POST['Description'];
        $language=$_POST['Language'];

        
        if($_POST['image'])
        {
            $target_dir = "image/products/";
            $Old_image=$_POST['Old_image'];
            $image=$_FILES["image"]["name"];
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            
            if($check !== false) 
            {
                $uploadOk = 1;
            } 
            else 
            {
                $msg="File is not an image.";
                $uploadOk = 0;
            }

            if (file_exists($target_file)) 
            {
                $msg="Sorry, file already exists.";
                $uploadOk = 0;
            }
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
            {
                $msg="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) 
            {
                echo '<script>alert("'.$msg.'")</script>';
            } 
            else 
            {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
                {
                    if($Old_image)
                    {
                        unlink($Old_image);
                    }
                    $sql="update book_details set Title='$title', Author_name='$author_name', Price='$price', Quantity='$quantity', Discount='$discount', Genre1='$genre1', Genre2='$genre2', Genre3='$genre3', Genre4='$genre4', Genre5='$genre5', Description='$description', Language='$language', Image='$image' 
                        where Book_id='$book_id' ";
                    $check=mysqli_query($con,$sql);
                    if($check)
                    {
                        // $msg="Data updated successfully!";
                        // echo '<script>alert("'.$msg.'")</script>';
                        // header('location:admin-shop.php');
                        echo "image updated!";
                    }
                } 
                else 
                {
                    // $msg="Some error occurred!";
                    // echo '<script>alert("'.$msg.'")</script>';
                    echo "error";
                }
            }
        }
        else 
        {
            $sql1="update book_details set Title='$title',Author_name='$author_name',Price='$price',Quantity='$quantity',Discount='$discount',Genre1='$genre1',Genre2='$genre2',Genre3='$genre3',Genre4='$genre4',Genre5='$genre5',Description='$description',Language='$language' where Book_id='$book_id'";
            $check1=mysqli_query($con,$sql1);
            if($check1)
            {
                // $msg="Data updated successfully!";
                // echo '<script>alert("'.$msg.'")</script>';
                // header('location:admin-shop.php');
                echo "only update";
            }
        }
    }
?>