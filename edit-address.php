<!DOCTYPE html>
<html lang="zxx">
<?php
    session_start();
    error_reporting(1);
	include "connect.php";
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
							<li class="breadcrumb-item active">Checkout</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
        <?php
            $Address_id=$_GET['Address_id'];
            $sql="select * from address_details where Address_id='$Address_id'";
            $data=mysqli_query($con,$sql);
            $result=mysqli_fetch_array($data);
        ?>
		<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Checkout Form s-->
						<form method="post" action="save-address.php">
						<div class="checkout-form">
							<div class="row row-40">
								<!-- <div class="col-12">
									<h1 class="quick-title">Checkout</h1>
								</div> -->
                                <input type="hidden" value="<?php echo $Address_id; ?>" name="Address_id">
								<div class="col-lg-8 mb--20 mx-auto">
									<!-- Billing Address -->
									<div id="billing-form" class="mb-40">
										<h4 class="checkout-title">Edit Address</h4>
										<div class="row">
											<div class="col-md-12 col-12 mb--20">
												<label for="name">Full Name*</label>
												<input type="text" placeholder="Full Name" id="name" required name="Name" value="<?php echo $result['Name'] ?>">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label for="phone">Phone no*</label>
												<input type="text" placeholder="Phone number" id="phone" required name="Phone" value="<?php echo $result['Phone'] ?>">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label for="pin">Pin Code*</label>
												<input type="number" placeholder="Pin Code" maxlength="6" id="pin" required name="Pin" value="<?php echo $result['Pincode'] ?>">
											</div>
											<div class="order-note-block mb--20 col-md-12 col-12">
												<label for="address">Address*</label>
												<textarea id="order-note" cols="30" rows="10" class="order-note"
												placeholder="Address(Area/Street)" id="address" required name="Address"><?php echo $result['Address'] ?></textarea>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label for="town">Town/City*</label>
												<input type="text" placeholder="Town/City" id="town" required name="City" value="<?php echo $result['City'] ?>">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label for="state">State*</label>
												<input type="text" placeholder="State" id="state" required name="State" value="<?php echo $result['State'] ?>">
											</div>
                                            <div class="col-md-12 col-12 mb--20" align="center">
												<button type="submit" class="btn btn--primary" name="Update">Update</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>
	<!--=================================
  Brands Slider
===================================== -->

	<!--=================================
    Footer Area
===================================== -->
	<footer class="footer-bottom text-white">
		<div class="container">
			
		</div>
	</footer>
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>