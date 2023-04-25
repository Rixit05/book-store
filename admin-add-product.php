<?php
    include "connect.php";
    session_start();
    error_reporting(1);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pustok - Book Store HTML Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
	<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
</head>

<body>
	<div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
            <div class="header-middle pt--10 pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 ">
                            <a href="admin-index.php" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-9">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right ">
                                    <!-- Shop -->
                                    <li class="menu-item">
                                        <a href="admin-shop.php">Shop</a>
                                    </li>
                                    <!-- Pages -->
                                    <li class="menu-item">
                                        <a href="admin-orders.php">Orders</a>
                                    </li>
                                    <!-- Blog -->
                                    <li class="menu-item">
                                        <a href="admin-faq.php">FAQ</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="admin-contact.php">Queries</a>
                                    </li>
                                    <li class="menu-item has-children">
                                        <a href="admin-account.php">My Account <i class="fas fa-chevron-down dropdown-arrow"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="admin-account.php">Profile</a></li>
                                            <li><a href="logout.php" class="btn btn-outlined--primary">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-mobile-menu">
            <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                <div class="container">
                    <div class="row align-items-sm-end align-items-center">
                        <div class="col-md-4 col-7">
                            <a href="admin-index.php" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-md-5 order-3 order-md-2">
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">
                                    <!-- <li class="sin-link">
                                        <a href="cart.php" class="cart-link link-icon"><i class="ion-bag"></i></a>
                                    </li> -->
                                    <li class="sin-link">
                                        <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                                class="ion-navicon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--Off Canvas Navigation Start-->
            <aside class="off-canvas-wrapper">
                <div class="btn-close-off-canvas">
                    <i class="ion-android-close"></i>
                </div>
                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box offcanvas">
                        <!-- <form>
                            <input type="text" placeholder="Search Here">
                            <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                        </form> -->
                    </div>
                    <!-- search box end -->
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav class="off-canvas-nav">
                            <ul class="mobile-menu main-mobile-menu">
                                <!-- Shop -->
                                <li class="menu-item">
                                    <a href="admin-shop.php">Shop</a>
                                </li>
                                <!-- Pages -->
                                <li class="menu-item">
                                    <a href="admin-orders.php">Orders</a>
                                </li>
                                <!-- Blog -->
                                <li class="menu-item">
                                    <a href="admin-faq.php">FAQ</a>
                                    </li>
                                <li class="menu-item">
                                    <a href="admin-contact.php">Queries</a>
                                </li>
                                <li class="menu-item has-children">
                                    <a href="admin-account.php">My Account <i class="fas fa-chevron-down dropdown-arrow"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="admin-account.php">Profile</a></li>
                                        <li><a href="logout.php" class="btn btn-outlined--primary">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                </div>
            </aside>
            <!--Off Canvas Navigation End-->
        </div>
        <div class="sticky-init fixed-header common-sticky">
            <div class="container d-none d-lg-block">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <a href="admin-index.php" class="site-brand">
                            <img src="image/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-navigation flex-lg-right">
                            <ul class="main-menu menu-right ">
                                <!-- Shop -->
                                <li class="menu-item">
                                    <a href="admin-shop.php">Shop</a>
                                </li>
                                <!-- Pages -->
                                <li class="menu-item">
                                    <a href="admin-orders.php">Orders</a>
                                </li>
                                <!-- Blog -->
                                <li class="menu-item">
                                    <a href="admin-faq.php">FAQ</a>
                                </li>
                                <li class="menu-item">
                                    <a href="admin-contact.php">Queries</a>
                                </li>
                                <li class="menu-item has-children">
                                    <a href="admin-account.php">My Account <i class="fas fa-chevron-down dropdown-arrow"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="admin-account.php">Profile</a></li>
                                        <li><a href="logout.php" class="btn btn-outlined--primary">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="admin-index.php">Home</a></li>
							<li class="breadcrumb-item active">Shop</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!--=============================================
    =            Login Register page content         =
    =============================================-->
		<main class="page-section inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-16 col-md-16 col-xs-16 col-lg-8 mb--30 mb-lg--0" style="margin:auto">
						<!-- Login Form s-->
						<form method="post" enctype="multipart/form-data" onsubmit=" return check()">
							<div class="login-form">
								<h4 class="login-title">Add new product</h4>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="title">Title</label>
										<input class="mb-0 form-control" type="text" id="title" name="Title"
											placeholder="Enter Book Title" required>
									</div>
									<div class="col-12 mb--20">
										<label for="author_name">Author's name</label>
										<input class="mb-0 form-control" type="text" id="author_name" name="Author_name" placeholder="Enter name of book's author" required>
									</div>
									<div class="col-12 mb--20">
										<label for="price">Price</label>
										<input class="mb-0 form-control" type="number" id="price" name="Price" placeholder="Enter price of book" required>
									</div>
									<div class="col-md-12 col-12 mb--15">
										<label for="quantity">Quantity</label>
										<input class="mb-0 form-control" type="number" id="quantity" name="Quantity"
											placeholder="Enter quantity of book" required min="0">
									</div>
                                    <div class="col-12 mb--20">
										<label for="discount">Discount</label>
										<input class="mb-0 form-control" type="number" id="discount" name="Discount" placeholder="Enter discount offered on book" required min="0" max="100">
									</div>
                                    <div class="col-4 mb--20">
										<label for="genre1">Genre 1</label>
										<select name="Genre1" class="mb-0 form-control" id="genre1">
                                            <option>Genre</option>
                                            <option value="Action">Action</option>
                                            <option value="Crime">Crime & Mystery</option>
                                            <option value="Graphics Novel">Graphics Novel</option>
                                            <option value="Romance">Romance</option>
                                            <option value="Business">Business & Money</option>
                                            <option value="Education">Education</option>
                                            <option value="Comics">Comics & Manga</option>
                                            <option value="Comedy">Comedy</option>
                                            <option value="Fiction">Fiction</option>
                                        </select>

									</div>
                                    <div class="col-4 mb--20">
										<label for="genre2">Genre 2</label>
										<!-- <input class="mb-0 form-control" type="text" id="genre2" name="Genre2" placeholder="Enter genre of book" required> -->
                                        <select name="Genre2" class="mb-0 form-control" id="genre2">
                                            <option>Genre</option>
                                            <option value="Action">Action</option>
                                            <option value="Crime">Crime & Mystery</option>
                                            <option value="Graphics Novel">Graphics Novel</option>
                                            <option value="Romance">Romance</option>
                                            <option value="Business">Business & Money</option>
                                            <option value="Education">Education</option>
                                            <option value="Comics">Comics & Manga</option>
                                            <option value="Comedy">Comedy</option>
                                            <option value="Fiction">Fiction</option>
                                        </select>
									</div>
                                    <div class="col-4 mb--20">
										<label for="genre3">Genre 3</label>
										<!-- <input class="mb-0 form-control" type="text" id="genre3" name="Genre3" placeholder="Enter genre of book" required> -->
                                        <select name="Genre3" class="mb-0 form-control" id="genre3">
                                            <option>Genre</option>
                                            <option value="Action">Action</option>
                                            <option value="Crime">Crime & Mystery</option>
                                            <option value="Graphics Novel">Graphics Novel</option>
                                            <option value="Romance">Romance</option>
                                            <option value="Business">Business & Money</option>
                                            <option value="Education">Education</option>
                                            <option value="Comics">Comics & Manga</option>
                                            <option value="Comedy">Comedy</option>
                                            <option value="Fiction">Fiction</option>
                                        </select>
									</div>
                                    <div class="col-4 mb--20">
										<label for="genre4">Genre 4</label>
										<!-- <input class="mb-0 form-control" type="text" id="genre4" name="Genre4" placeholder="Enter genre of book" required> -->
                                        <select name="Genre4" class="mb-0 form-control" id="genre4">
                                            <option>Genre</option>
                                            <option value="Action">Action</option>
                                            <option value="Crime">Crime & Mystery</option>
                                            <option value="Graphics Novel">Graphics Novel</option>
                                            <option value="Romance">Romance</option>
                                            <option value="Business">Business & Money</option>
                                            <option value="Education">Education</option>
                                            <option value="Comics">Comics & Manga</option>
                                            <option value="Comedy">Comedy</option>
                                            <option value="Fiction">Fiction</option>
                                        </select>
									</div>
                                    <div class="col-4 mb--20">
										<label for="genre5">Genre 5</label>
										<!-- <input class="mb-0 form-control" type="text" id="genre5" name="Genre5" placeholder="Enter genre of book" required> -->
                                        <select name="Genre5" class="mb-0 form-control" id="genre5">
                                            <option>Genre</option>
                                            <option value="Action">Action</option>
                                            <option value="Crime">Crime & Mystery</option>
                                            <option value="Graphics Novel">Graphics Novel</option>
                                            <option value="Romance">Romance</option>
                                            <option value="Business">Business & Money</option>
                                            <option value="Education">Education</option>
                                            <option value="Comics">Comics & Manga</option>
                                            <option value="Comedy">Comedy</option>
                                            <option value="Fiction">Fiction</option>
                                        </select>
									</div>
                                    <div class="col-12 mb--20">
										<label for="language">Language</label>
										<!-- <input class="mb-0 form-control" type="text" id="language" name="Language" placeholder="Enter language of book" required> -->
                                        <select name="Language" class="mb-0 form-control" required>
                                            <!-- <option value=>Language</option> -->
                                            <option value="English">English</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Gujarati">Gujarati</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb--20">
										<label for="description">Description</label>
										<textarea class="mb-0 form-control" id="description" name="Description" placeholder="Enter description of book" required min="10"></textarea>
									</div>
                                    <div class="col-12 mb--20">
										<label for="image">Book Cover</label>
										<input class="mb-0 form-control" type="file" style="height:auto;" id="image" name="Image" required>
									</div>
									<div class="col-md-12 ">
                                        <input type="submit" value="Insert" name="insert" class="btn btn-black w-25">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>
    <footer class="site-footer">
		<div class="footer-bottom">
			<div class="container">
			</div>
		</div>
	</footer>
	<!-- Use Minified Plugins Version For Fast Page Load -->
    <script>
        function check()
        {
            if(document.getElementById('genre1').value=='Genre' &&
            document.getElementById('genre2').value=='Genre' &&
            document.getElementById('genre3').value=='Genre' &&
            document.getElementById('genre4').value=='Genre' &&
            document.getElementById('genre5').value=='Genre')
            {
                alert("At least choose one Genre");
                return false;
            }
            else
            {
                return true;
            }
        }
    </script>
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>
<?php 
    if(isset($_POST['insert']))
    {
        $target_dir = "image/products/";
        $target_file = $target_dir . basename($_FILES["Image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));       
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
            if (move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) 
            {
                $title=$_POST['Title'];
                $author_name=$_POST['Author_name'];
                $price=$_POST['Price'];
                $quantity=$_POST['Quantity'];
                $discount=$_POST['Discount'];
                $image=$_FILES['Image']['name'];
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
                $sql="insert into book_details values(0,'$title','$author_name','$price','$quantity','$discount','$image','$genre1','$genre2','$genre3','$genre4','$genre5','$description','$language','1')";
                $check=mysqli_query($con,$sql);
                if($check)
                {
                    $msg="Data inserted successfully!";
                    echo '<script>alert("'.$msg.'");history.back();</script>';
                }
            } 
            else 
            {
                $msg="Some error occurred!";
                echo '<script>alert("'.$msg.'")</script>';
            }
        }
    }
?>