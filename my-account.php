<!DOCTYPE html>
<html lang="zxx">
<?php
    include "connect.php";
    session_start();
    error_reporting(0);
?>
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
                            <a href="index.php" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-3">
                        </div>
                        <div class="col-lg-6">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right ">
                                    <li class="menu-item mega-menu">
                                        <a href="index.php">shop</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="faq.php">Faq</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="contact.php">Contact</a>
                                    </li>
                                    <li class="menu-item has-children">
                                        <a href="javascript:void(0)">My account <i class="fas fa-chevron-down dropdown-arrow"></i></a>
                                        <ul class="sub-menu">
                                        <?php
                                            if($_SESSION['user_id'])
                                            {
                                                echo '
                                                    <li><a href="my-account.php">Profile</a></li>
                                                    <li><a href="wishlist.php">Wishlist</a></li>
                                                    <li><a href="logout.php" class="btn btn-outlined--primary">Logout</a></li>
                                                ';
                                            }
                                            else
                                            {
                                                echo '
                                                    <li><a href="login-register.php">Login</a></li>
                                                    <li><a href="login-register.php">Register</a></li>
                                                ';
                                            }
                                        ?>  
                                        <ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                        	<nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger">
                                        <i class="fa fa-bars"></i>Browse categories
                                    </a>
                                    <ul class="category-menu">
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Action">Action</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Comedy">Comedy</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Crime">Crime & Mystery</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Fiction">Fiction</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Graphics Novel">Graphics Novel</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Romance">Romance</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Business">Business & Money</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Education">Education</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Comics">Comics & Manga</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-5">
                            <div class="header-search-block">
                                <form action="search-books.php" method="get">
                                    <input type="text" placeholder="Search entire store here" name="Keyword">
                                    <button type="submit">Search</button>
                                </form>
                            </div>
                        </div>
						<?php
							if($_SESSION['user_id'])
							{
								$USER_ID=$_SESSION['user_id'];
								$SQL1="select * from cart_details where User_id='$USER_ID' limit 3";
								$DATA1=mysqli_query($con,$SQL1);
								$SQL5="select count(*) as Total from cart_details where User_id='$USER_ID'";
								$SQL6="select sum((b.Price-(b.Discount*b.Price/100))*c.Quantity) as Sum from book_details b,cart_details c where b.Book_id in (select Book_id from cart_details where User_id='$USER_ID')";
								$DATA5=mysqli_query($con,$SQL5);
								$DATA6=mysqli_query($con,$SQL6);
								$RESULT5=mysqli_fetch_array($DATA5);
								$RESULT6=mysqli_fetch_array($DATA6);
								if(mysqli_num_rows($DATA1))
								{
									echo '
							<div class="col-lg-4">
								<div class="main-navigation flex-lg-right">
									<div class="cart-widget">
										<div class="cart-block">
											<div class="cart-total">
												<span class="text-number">
													'.$RESULT5['Total'].'
												</span>
												<span class="text-item">
													Shopping Cart
												</span>
												<span class="price">
													'.number_format($RESULT6['Sum'],2).'
													<i class="fas fa-chevron-down"></i>
												</span>
											</div>
											<div class="cart-dropdown-block">
									';
									while($RESULT1=mysqli_fetch_array($DATA1))
									{
										$BOOK_ID=$RESULT1['Book_id'];
										$SQL7="select * from book_details where Book_id='$BOOK_ID'";
										$DATA7=mysqli_query($con,$SQL7);
										$RESULT7=mysqli_fetch_array($DATA7);
										echo '
												<div class=" single-cart-block ">
													<div class="cart-product">
														<a href="product-details.php" class="image">
															<img src="image/products/'.$RESULT7['Image'].'" alt="'.$RESULT7['Title'].'" height="100px" style="margin:auto;">
														</a>
														<div class="content">
															<h3 class="title"><a href="product-details.php?'.$RESULT7['Book_id'].'">'.$RESULT7['Title'].'</a></h3>
															
															<p class="price"><span class="qty">'.$RESULT1['Quantity'].' ×</span> '.number_format(($RESULT7['Price']-($RESULT7['Discount']*$RESULT7['Price'])/100),2).'</p>
															<a href="remove-from-cart.php?Book_id='.$RESULT7['Book_id'].'"><button class="cross-btn"><i class="fas fa-times"></i></button></a>
														</div>
													</div>
												</div>
										';
									}
									echo '
												<div class=" single-cart-block ">
													<div class="btn-block">
														<a href="cart.php" class="btn">View Cart <i
																class="fas fa-chevron-right"></i></a>
														<a href="checkout.php" class="btn btn--primary">Check Out <i
																class="fas fa-chevron-right"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
									';
								}
								else
								{
									echo '
									<div class="col-lg-4">
										<div class="main-navigation flex-lg-right">
											<div class="cart-widget">
												<div class="cart-block">
													<div class="cart-total">
														<span class="text-number">
															0
														</span>
														<span class="text-item">
															Shopping Cart
														</span>
														<span class="price">
															0.00 <i class="fas fa-chevron-down"></i>
														</span>
													</div>
													
													<div class="cart-dropdown-block">
														<div class=" single-cart-block ">
															<h6 align="center">Your cart is empty!</h6>
														</div>
														<div class=" single-cart-block ">
															<div class="btn-block">
																<a href="checkout.php" class="btn btn--primary">Shop <i
																		class="fas fa-chevron-right"></i></a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									';
								}
							}
							else
							{
								echo '
							<div class="col-lg-4">
								<div class="main-navigation flex-lg-right">
									<div class="cart-widget">
										<div class="cart-block">
											<div class="cart-total">
												<span class="text-number">
													0
												</span>
												<span class="text-item">
													Shopping Cart
												</span>
												<span class="price">
													0.00 <i class="fas fa-chevron-down"></i>
												</span>
											</div>
											
											<div class="cart-dropdown-block">
												<div class=" single-cart-block ">
													<h6 align="center">You have not logged in!</h6>
												</div>
												<div class=" single-cart-block ">
													<div class="btn-block">
														<a href="login-register.php" class="btn">Login <i
																class="fas fa-chevron-right"></i></a>
														<a href="login-register.php" class="btn btn--primary">Register <i
																class="fas fa-chevron-right"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
								';
							}
						?>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-mobile-menu">
            <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                <div class="container">
                    <div class="row align-items-sm-end align-items-center">
                        <div class="col-md-4 col-7">
                            <a href="index.php" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-md-5 order-3 order-md-2">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger">
                                        <i class="fa fa-bars"></i>Browse categories
                                    </a>
                                    <ul class="category-menu">
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Action">Action</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Comedy">Comedy</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Crime">Crime & Mystery</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Fiction">Fiction</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Graphics Novel">Graphics Novel</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Romance">Romance</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Business">Business & Money</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Education">Education</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="search-books.php?Category=Comics">Comics & Manga</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">
                                    <li class="sin-link">
                                        <a href="cart.php" class="cart-link link-icon"><i class="ion-bag"></i></a>
                                    </li>
                                    <li class="sin-link">
                                        <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn">
                                            <i class="ion-navicon"></i>
                                        </a>
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
                        <form>
                            <input type="text" placeholder="Search Here">
                            <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav class="off-canvas-nav">
                            <ul class="mobile-menu main-mobile-menu">
                                    <li class="menu-item mega-menu">
                                        <a href="index.php">Shop</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="faq.php">Faq</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="contact.php">Contact</a>
                                    </li>
                                    <li class="menu-item has-children">
                                        <a href="javascript:void(0)">My account</a>
                                        <ul class="sub-menu">
                                            <?php
                                                if($_SESSION['user_id'])
                                                {
                                                    echo '
                                                        <li><a href="my-account.php">Profile</a></li>
                                                        <li><a href="wishlist.php">Wishlist</a></li>
                                                        <li><a href="logout.php" class="btn btn-outlined--primary">Logout</a></li>
                                                    ';
                                                }
                                                else
                                                {
                                                    echo '
                                                        <li><a href="login-register.php">Login</a></li>
                                                        <li><a href="login-register.php">Register</a></li>
                                                    ';
                                                }
                                            ?>  
                                        <ul>
                                    </li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                    <div class="off-canvas-bottom">
                        <div class="contact-list mb--10">
                            <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>(12345) 78790220</a>
                            <a href="" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
                        </div>
                        <div class="off-canvas-social">
                            <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Off Canvas Navigation End-->
        </div>
        <div class="sticky-init fixed-header common-sticky">
            <div class="container d-none d-lg-block">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <a href="index.php" class="site-brand">
                            <img src="image/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-navigation flex-lg-right">
                            <ul class="main-menu menu-right">
                                    <li class="menu-item mega-menu">
                                        <a href="index.php">shop</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="faq.php">Faq</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="contact.php">Contact</a>
                                    </li>
                                    <li class="menu-item has-children">
                                        <li class="menu-item has-children">
                                            <a href="javascript:void(0)">My account <i class="fas fa-chevron-down dropdown-arrow"></i></a>
                                            <ul class="sub-menu">
                                                <?php
                                                    if($_SESSION['user_id'])
                                                    {
                                                        echo '
                                                            <li><a href="my-account.php">Profile</a></li>
                                                            <li><a href="wishlist.php">Wishlist</a></li>
                                                            <li><a href="logout.php" class="btn btn-outlined--primary">Logout</a></li>
                                                        ';
                                                    }
                                                    else
                                                    {
                                                        echo '
                                                            <li><a href="login-register.php">Login</a></li>
                                                            <li><a href="login-register.php">Register</a></li>
                                                        ';
                                                    }
                                                ?>  
                                            <ul>
                                        </li>
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
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item active">My Account</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<div class="page-section inner-page-sec-padding">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="row">
							<!-- My Account Tab Menu Start -->
							<div class="col-lg-3 col-12">
								<div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#account-info" data-toggle="tab" class="active"><i class="fa fa-user"></i> Account
                                            Details</a> 
									<a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
									<!-- <a href="#download" data-toggle="tab"><i class="fas fa-download"></i> Download</a> -->
									<!-- <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i>
										Payment
										Method</a> -->
									<a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>
										address</a>
									<a href="login-register.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
								</div>
							</div>
							<!-- My Account Tab Menu End -->
							<!-- My Account Tab Content Start -->
                            <?php
                                            include "connect.php";
                                            $user_id=$_SESSION['user_id'];
                                            $sql4="select * from user_details where User_id='$user_id'";
                                            $data4=mysqli_query($con,$sql4);
                                            $result4=mysqli_fetch_array($data4);
                                        ?>
							<div class="col-lg-9 col-12 mt--30 mt-lg--0">
								<div class="tab-content" id="myaccountContent">
									<!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="account-info" role="tabpanel">
										<div class="myaccount-content">
											<h3>Account Details</h3>
											<div class="account-details-form">
												<form action="update-profile.php" method="post" onsubmit="return check()">
													<div class="row">
														<div class="col-lg-12 col-12  mb--30">
															<input id="Name" placeholder="Name" type="text" name="Name" value="<?php echo $result4['Name']; ?>" required minlength="6">
														</div>
														<!-- <div class="col-lg-6 col-12  mb--30">
															<input id="last-name" placeholder="Last Name" type="text">
														</div> -->
														<!-- <div class="col-12  mb--30">
															<input id="display-name" placeholder="Display Name"
																type="text">
														</div> -->
														<div class="col-12  mb--30">
															<input id="email" placeholder="Email Address" type="email" name="Email" required value="<?php echo $result4['Email']; ?>">
														</div>
														<div class="col-12  mb--30">
															<h4>Password change</h4>
														</div>
														<div class="col-12  mb--30">
															<input id="current-pwd" placeholder="Current Password"
																type="password" name="Old_password" required  >
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="new-pwd" placeholder="New Password"
																type="password" name="New_password1" required minlength="8">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="confirm-pwd" placeholder="Confirm Password"
																type="password" name="New_password2" required minlength="8">
														</div>
														<div class="col-12">
															<button class="btn btn--primary">Save Changes</button>
														</div>
													</div>
												</form>
                                                <br>
                                                <div class="col-lg-12 text-center">
                                                    <?php
                                                        if($_GET['err1'])
                                                        {
                                                            echo "<p style='color:red;'><b>";
                                                            echo $_GET['err1'];
                                                            echo "</b></p>";
                                                        }
                                                        if($_GET['res1'])
                                                        {
                                                            echo "<p style='color:blue;'><b>";
                                                            echo $_GET['res1'];
                                                            echo "</b></p>";
                                                        }
                                                    ?>
                                                    </b><p>
												</div>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
								    <div class="tab-pane fade" id="orders" role="tabpanel">
										<div class="myaccount-content">
                                            <?php
                                                $sql1="select * from order_header where User_id='$user_id' order by Order_date DESC";
                                                $data1=mysqli_query($con,$sql1);
                                                if(mysqli_num_rows($data1))
                                                {
                                                        $sql1="select * from order_header where User_id='$user_id' order by Order_date DESC";
                                                        $data1=mysqli_query($con,$sql1);
                                                        if(mysqli_num_rows($data1))
                                                        {
                                                            echo '
                                                        <h3>Orders</h3>
                                                        <div class="myaccount-table table-responsive text-center">
                                                            <table class="table table-bordered">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Name</th>
                                                                        <th>Date</th>
                                                                        <th>Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                            ';
                                                            
                                                            $count=1;
                                                            while($result1=mysqli_fetch_array($data1))
                                                            {
                                                                $Order_id=$result1['Order_id'];
                                                                $sql="select * from order_details where Order_id='$Order_id'";
                                                                $data=mysqli_query($con,$sql);
                                                                while($result=mysqli_fetch_array($data))
                                                                {
                                                                    $book_id=$result['Book_id'];
                                                                    $sql3="select Title from book_details where Book_id='$book_id'";
                                                                    $data2=mysqli_query($con,$sql3);
                                                                    $result2=mysqli_fetch_array($data2);
                                                                    echo '
                                                                    <tr>
                                                                        <td>'.$count++.'.</td>
                                                                        <td><a href="product_details.php?Book_id='.$result['Book_id'].'">'.$result2['Title'].' x '.$result['Quantity'].'</a></td>
                                                                        <td><span>'.$result1['Order_date'].'</span></td>
                                                                        <td>'.$result['Price'].'</td>
                                                                    </tr>
                                                                    ';
                                                                }
                                                            }

                                                            echo '
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                            ';
                                                        }
                                                }
                                                else
                                                {
                                                    echo "No records found!";
                                                }
                                            ?>
                                        </div>
                                    </div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<!-- <div class="tab-pane fade" id="download" role="tabpanel">
										<div class="myaccount-content">
											<h3>Downloads</h3>
											<div class="myaccount-table table-responsive text-center">
												<table class="table table-bordered">
													<thead class="thead-light">
														<tr>
															<th>Product</th>
															<th>Date</th>
															<th>Expire</th>
															<th>Download</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Mostarizing Oil</td>
															<td>Aug 22, 2018</td>
															<td>Yes</td>
															<td><a href="#" class="btn">Download File</a></td>
														</tr>
														<tr>
															<td>Katopeno Altuni</td>
															<td>Sep 12, 2018</td>
															<td>Never</td>
															<td><a href="#" class="btn">Download File</a></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div> -->
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<!-- <div class="tab-pane fade" id="payment-method" role="tabpanel">
										<div class="myaccount-content">
											<h3>Payment Method</h3>
											<p class="saved-message">You Can't Saved Your Payment Method yet.</p>
										</div>
									</div> -->
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
										<div class="myaccount-content">
											<h3>Billing/Shipping Address</h3>
                                            <div class="row">
                                                <?php
                                                    $sql2="select * from address_details where User_id='$user_id'";
                                                    $data3=mysqli_query($con,$sql2);
                                                    if(mysqli_num_rows($data3))
                                                    {
                                                        while($result3=mysqli_fetch_array($data3))
                                                        {
                                                            echo '
                                                            <div class="col-md-6 mb--40">
                                                                <address>
                                                                    <p><strong>'.$result3['Name'].'</strong></p>
                                                                    <p>'.$result3['Address'].' <br>
                                                                        '.$result3['City'].', '.$result3['State'].' '.$result3['Pincode'].'<br>
                                                                        Mobile: '.$result3['Phone'].'</p>
                                                                </address>
                                                                <a href="edit-address.php?Address_id='.$result3['Address_id'].'" class="btn btn--primary">
                                                                    <i class="fa fa-edit"></i>Edit Address
                                                                </a>
                                                            </div>
                                                            ';
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo '<div class="col-md-6 mb--40">No records Found!</div>';
                                                    }
                                                ?>                    
                                            </div>
										</div>
									</div>
									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<!-- Single Tab Content End -->
								</div>
							</div>
							<!-- My Account Tab Content End -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--=================================
  Brands Slider
===================================== -->
	<section class="section-margin">
		<h2 class="sr-only">Brand Slider</h2>
		<div class="container">
			<div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 6
                                            }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
				<div class="single-slide">
					<img src="image/others/brand-1.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-2.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-3.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-4.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-5.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-6.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-1.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-2.jpg" alt="">
				</div>
			</div>
		</div>
	</section>
	<!--=================================
    Footer Area
===================================== -->
	<footer class="footer-bottom text-white">
		<div class="container">
			
		</div>
	</footer>
	<!-- Use Minified Plugins Version For Fast Page Load -->
    <script>
        function check()
        {
            if(document.getElementById("").value==document.getElementById(""))
            {
                return true;
            }
            else
            {

            }
        }
    </script>
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>