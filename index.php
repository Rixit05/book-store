<?php
    session_start();
    error_reporting(1);
	include "connect.php";
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
							<li class="breadcrumb-item active">Shop</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<main class="inner-page-sec-padding-bottom">
			<div class="container">
				<div class="shop-toolbar mb--30">
					<div class="row align-items-center">
						<div class="col-lg-2 col-md-2 col-sm-6">
							<div class="product-view-mode">
								<a href="#" class="sorting-btn active" data-target="grid-four">
									<span class="grid-four-icon">
										<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
									</span>
								</a>
								<a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
							</div>
						</div>
					</div>
				</div>
				<?php 
				include "connect.php";
				$sql="select * from book_details";
				$data=mysqli_query($con,$sql);
				if($total=mysqli_num_rows($data))
				{
					echo '
					
					<div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">';
					if($_GET['page'])
					{
						$page=$_GET['page'];
					}
					else
					{
						$page=1;
					}
					$start=12*($page-1)+1;//1
					$end=12*$page;//12
					$count=1;
					while($result=mysqli_fetch_array($data))
					{
						if($count>=$start && $count<=$end && $result['Status'])
						{
							$Book_id=$result['Book_id'];
							$sql4="select avg(Review) as rating, count(*) as users from review_details where Book_id='$Book_id'";
							$data4=mysqli_query($con,$sql4);
							$result4=mysqli_fetch_array($data4);
							$rating=round($result4['rating']);
							$users=$result4['users'];
								echo '
									<div class="col-lg-3 col-sm-6">
										<div class="product-card">
											<div class="product-grid-content">
												<div class="product-header">
													<a href="" class="author">
														'.$result['Author_name'].'
													</a>
													<h3><a href="product-details.php?Id='.$result['Book_id'].'">'.$result['Title'].'</a></h3>
												</div>
												<div class="product-card--body">
													<div class="card-image">
														<img height="200px" src="image/products/'.$result['Image'].'" alt="'.$result['Title'].'">
														<div class="hover-contents">
															<a href="product-details.php?Id='.$result['Book_id'].'" class="hover-image">
																<img height="200px" src="image/products/'.$result['Image'].'" alt="'.$result['Title'].'">
															</a>
															<div class="hover-btns">
																<a href="add-to-cart.php?book_id='.$result['Book_id'].'" class="single-btn">
																	<i class="fas fa-shopping-basket"></i>
																</a>
																<a href="add-to-wishlist.php?b_id='.$result['Book_id'].'" class="single-btn">
																	<i class="fas fa-heart"></i>
																</a>
																<a href="#" data-toggle="modal" data-target="#quickModal'.$result['Book_id'].'"
																	class="single-btn">
																	<i class="fas fa-eye"></i>
																</a>
															</div>
														</div>
													</div>
													<div class="price-block">
														<span class="price">'.($result['Price']-($result['Discount']*$result['Price'])/100).'</span>
														<del class="price-old">'.$result['Price'].'</del>
														<span class="price-discount">'.$result['Discount'].'%</span>
													</div>
												</div>
											</div>
											<div class="product-list-content">
												<div class="card-image">
													<a href="product-details.php?Id='.$result['Book_id'].'">
														<img height="320px" width="213px"  src="image/products/'.$result['Image'].'" alt="'.$result['Title'].'">
													</a>
												</div>
												<div class="product-card--body">
													<div class="product-header">
														<a href="" class="author">
														'.$result['Author_name'].'
														</a>
														<h3><a href="product-details.php?Id='.$result['Book_id'].'" tabindex="0">'.$result['Title'].'</a></h3>
													</div>
													<article>
														<h2 class="sr-only">Card List Article</h2>
														<p>'.
														substr($result['Description'],0,150).'...'
														.'</p>
													</article>
													<div class="price-block">
														<span class="price">'.($result['Price']-($result['Discount']*$result['Price'])/100).'</span>
														<del class="price-old">'.$result['Price'].'</del>
														<span class="price-discount">'.$result['Discount'].'</span>
													</div>
													<div class="rating-block">
														<span class="fas fa-star ';
														if($rating>=1)
														{
															echo "star_on";
														}
														echo '"></span>
														<span class="fas fa-star ';
														if($rating>=2)
														{
															echo "star_on";
														}
														echo '"></span>
														<span class="fas fa-star ';
														if($rating>=3)
														{
															echo "star_on";
														}
														echo '"></span>
														<span class="fas fa-star ';
														if($rating>=4)
														{
															echo "star_on";
														}
														echo '"></span>
														<span class="fas fa-star ';
														if($rating>=5)
														{
															echo "star_on";
														}
														echo '"></span>('.$users.' Ratings)
														<div class="review-widget">
															
														</div>
													</div>
													<div class="btn-block">
														<a href="add-to-cart.php?book_id='.$result['Book_id'].'" class="btn btn-outlined">Add To Cart</a>
														<a href="add-to-wishlist.php?b_id='.$result['Book_id'].'" class="card-link"><i class="fas fa-heart"></i> Add To Wishlist</a>
														<!--<a href="" class="card-link"><i class="fas fa-random"></i> Add To Cart</a>-->
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="modal fade modal-quick-view" id="quickModal'.$result['Book_id'].'" tabindex="-1" role="dialog" aria-labelledby="quickModal" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<div class="product-details-modal">
													<div class="row">
														<div class="col-lg-5">
															<!-- Product Details Slider Big Image-->
															<div class="product-details-slider sb-slick-slider arrow-type-two">
																<div class="single-slide">
																	<img  src="image/products/'.$result['Image'].'" alt="">
																</div>
															</div>
															
														</div>
														<div class="col-lg-7 mt--30 mt-lg--30">
															<div class="product-details-info pl-lg--30 ">
																<h3 class="product-title">'.$result['Title'].'</h3>
																<ul class="list-unstyled">
																	<li>Author Name: <span class="list-value">'.$result['Author_name'].'</span></li>
																	<li>Genres: <a href="#" class="list-value font-weight-bold">'.$result['Genre1'].', '.$result['Genre2'].', '.$result['Genre3'].', '.$result['Genre4'].', '.$result['Genre5'].'</a></li>
																	<li>Language: <span class="list-value">'.$result['Language'].'</span></li>
																</ul>
																<div class="price-block">
																	<span class="price-new">'.($result['Price']-($result['Discount']*$result['Price'])/100).'</span>
																	<del class="price-old">'.$result['Price'].'</del>
																</div>
																<div class="rating-widget">
																	<div class="rating-block">
																		<span class="fas fa-star ';
																		if($rating>=1)
																		{
																			echo "star_on";
																		}
																		echo '"></span>
																		<span class="fas fa-star ';
																		if($rating>=2)
																		{
																			echo "star_on";
																		}
																		echo '"></span>
																		<span class="fas fa-star ';
																		if($rating>=3)
																		{
																			echo "star_on";
																		}
																		echo '"></span>
																		<span class="fas fa-star ';
																		if($rating>=4)
																		{
																			echo "star_on";
																		}
																		echo '"></span>
																		<span class="fas fa-star ';
																		if($rating>=5)
																		{
																			echo "star_on";
																		}
																		echo '"></span> ('.$users.' Ratings)
																	</div>
																	<div class="review-widget">
																	</div>
																</div>
																<article class="product-details-article">
																	<h4 class="sr-only">Product Summery</h4>
																	<p>'.$result['Description'].'</p>
																</article>
																<form method="post" action="add-to-cart-2.php">
																<div class="add-to-cart-row">
																	<div class="count-input-block">
																		<span class="widget-label">Qty</span>
																		<input type="number" class="form-control text-center" value="1" name="quantity">
																		<input type="hidden" value="'.$result['Book_id'].'" name="book_id">
																	</div>
																	<div class="add-cart-btn">
																		<button class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to
																			Cart</button>
																	</div>
																</div>
																</form>
																<div class="compare-wishlist-row">
																	<a href="add-to-wishlist.php?b_id='.$result['Book_id'].'" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
																	<!--<a href="" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>-->
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								';
						}
						$count++;
					}
					echo '</div>';
				}
				else
				{
					echo "<p>No records found!</p>";
				}
			?>
				<!-- Pagination Block -->
				<div class="row pt--30">
					<div class="col-md-12">
						<div class="pagination-block">
							<ul class="pagination-btns flex-center">
								

								<?php
								$sql2="select * from product_details where Status='1'";
								$data2=mysqli_query($con,$sql);
								$total=mysqli_num_rows($data2);
								if($page!=1)
								{
									echo '
									<li><a href="index.php?page=1" class="single-btn prev-btn ">|<i class="zmdi zmdi-chevron-left"></i> </a>
									</li>
									';
									echo '<li><a href="index.php?page='.($page-1).'" class="single-btn prev-btn "><i class="zmdi zmdi-chevron-left"></i> </a>
									</li>';
									echo '<li><a href="index.php?page='.($page-1).'" class="single-btn">'.($page-1).'</a></li>';
									if($page==ceil($total/12))
									{
										echo '<li class="active"><a href="index.php?page='.($page).'" class="single-btn">'.($page).'</a></li>';
									}
								}
								if($page<$total/12)
								{
									echo '<li class="active"><a href="index.php?page='.$page.'" class="single-btn">'.$page.'</a></li>';
									echo '<li><a href="index.php?page='.($page+1).'" class="single-btn">'.($page+1).'</a></li>';
									echo '<li><a href="index.php?page='.($page+1).'" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i></a>
									</li>';
									echo '
									<li><a href="index.php?page='.(ceil($total/12)).'" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i>|</a>
									</li>
									';
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	<!--=================================
    Footer Area
===================================== -->
	<footer class="footer-bottom text-white">
		<div class="container">
			
		</div>
	</footer>
	<!-- php -->
    
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>