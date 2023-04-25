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
                            <li class="breadcrumb-item active">Product Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <main class="inner-page-sec-padding-bottom">
            <?php
                include "connect.php";
                $Id=$_GET['Id'];
                $sql="select * from Book_details where Book_Id=$Id";
                $data=mysqli_query($con,$sql);
                $result=mysqli_fetch_array($data);
                $sql2="select * from review_details where Book_id='$Id'";
                $data2=mysqli_query($con,$sql2);
                $sql4="select avg(Review) as rating, count(*) as users from review_details where Book_id='$Id'";
                $data4=mysqli_query($con,$sql4);
                $result4=mysqli_fetch_array($data4);
                $rating=round($result4['rating']);
                $users=$result4['users'];
                $sql5="select * from review_details where Comment!='' and Book_id='$Id'";
                $data5=mysqli_query($con,$sql5);
                echo '
                <div class="container">
                    <div class="row  mb--60">
                        <div class="col-lg-5">
                            <!-- Product Details Slider Big Image-->
							<div class="product-details-slider sb-slick-slider arrow-type-two">
								<div class="single-slide">
									<img  src="image/products/'.$result['Image'].'" alt="">
								</div>
							</div>						
						</div>
                        <div class="col-lg-7">
                            <div class="product-details-info pl-lg--30 ">
                                <!-- <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p> -->
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
                                        echo '"></span>
                                    </div>
                                    <div class="review-widget">
                                        <a href="#tab-2">('.$users.' Ratings)</a> <span>|</span>
                                        <a href="#add-review">Write a review</a>
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
                    ';
                    echo '
                    <div class="sb-custom-tab review-tab section-padding">
                        <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="tab1" data-toggle="tab" href="#tab-1" role="tab"
                                    aria-controls="tab-1" aria-selected="true">
                                    DESCRIPTION
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="tab2" data-toggle="tab" href="#tab-2" role="tab"
                                    aria-controls="tab-2" aria-selected="true">
                                    REVIEWS ('.mysqli_num_rows($data5).')
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content space-db--20" id="myTabContent">
                            <div class="tab-pane fade" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                                <article class="review-article">
                                    <h1 class="sr-only">Tab Article</h1>
                                    <p>'.$result['Description'].'</p>
                                </article>
                            </div>
                            <div class="tab-pane fade show active" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                                <div class="review-wrapper">';

                                    if(mysqli_num_rows($data5))
                                    {
                                            echo '
                                        <h2 class="title-lg mb--20">Reviews on "'.$result['Title'].'"</h2>
                                        ';
                                        $count++;
                                        while($result2=mysqli_fetch_array($data5))
                                        {
                                            $User_id=$result2['User_id'];
                                            $sql3="select Name from user_details where User_id='$User_id'";
                                            $data3=mysqli_query($con,$sql3);
                                            $result3=mysqli_fetch_array($data3);
                                                echo '
                                                <div class="review-comment mb--20">
                                                    <!--<div class="avatar">
                                                        <img src="image/icon/author-logo.png" alt="">
                                                    </div>-->
                                                    <div class="text">
                                                        <h6 class="author">'.$count++.'. '.$result['Name'].' – <span class="font-weight-400">'.$result2['Date'].'</span>';

										                if($result2['User_id']==$_SESSION['user_id'])
                                                        {
                                                            echo '<a href="remove-review.php?Book_id='.$Id.'"style="float:right;" ><i class="far fa-trash-alt"></i></a>';
                                                        }
                                                        echo '</h6>
                                                        <div class="rating-block mb--15">
                                                            <span class="fas fa-star ';
                                                            if($result2['Review']>=1)
                                                                echo "star_on";

                                                            echo '"></span>
                                                            <span class="fas fa-star ';
                                                            if($result2['Review']>=2)
                                                                echo "star_on";
                                                            
                                                            echo '"></span>
                                                            <span class="fas fa-star ';
                                                            if($result2['Review']>=3)
                                                                echo "star_on";
                                                            
                                                            echo '"></span>
                                                            <span class="fas fa-star ';
                                                            if($result2['Review']>=4)
                                                                echo "star_on";
                                                            
                                                            echo '"></span>
                                                            <span class="fas fa-star ';
                                                            if($result2['Review']>=5)
                                                                echo "star_on";
                                                            
                                                            echo '"></span>
                                                        </div>
                                                        <p>'.$result2['Comment'].'</p>
                                                    </div>
                                                </div>
                                                ';
                                        }
                                    }

                                    echo '
                                    <form action="add-review.php" class="mt--15" method="post" onsubmit="return check()">
                                    <h2 class="title-lg mb--20 pt--15" id="add-review">ADD A REVIEW</h2>
                                    <div class="rating-row pt-2">
                                        <font class="d-block">Your Rating</font>
                                        <span class="rating-widget-block">
                                            <input type="radio" name="star1" id="star1">
                                            <label for="star1"></label>
                                            <input type="radio" name="star2" id="star2">
                                            <label for="star2"></label>
                                            <input type="radio" name="star3" id="star3">
                                            <label for="star3"></label>
                                            <input type="radio" name="star4" id="star4">
                                            <label for="star4"></label>
                                            <input type="radio" name="star5" id="star5" >
                                            <label for="star5"></label>
                                        </span>
                                        <input type="hidden" value="'.$result['Book_id'].'" name="book_id">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="message">Comment</label>
                                                        <textarea name="Message" id="message" cols="30" rows="5"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="submit-btn">
                                                        <button class="btn btn-black">Post Comment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="tab-product-details">
                        <div class="brand">
                            <img src="image/others/review-tab-product-details.jpg" alt="">
                        </div>
                        <h5 class="meta">Reference <span class="small-text">demo_5</span></h5>
                        <h5 class="meta">In stock <span class="small-text">297 Items</span></h5>
                        <section class="product-features">
                            <h3 class="title">Data sheet</h3>
                            <dl class="data-sheet">
                            <dt class="name">Compositions</dt>
                            <dd class="value">Viscose</dd>
                            <dt class="name">Styles</dt>
                            <dd class="value">Casual</dd>
                            <dt class="name">Properties</dt>
                            <dd class="value">Maxi Dress</dd>
                            </dl>
                        </section>
                    </div>-->
                </div>
                ';
            ?>
            <!--=================================
    RELATED PRODUCTS BOOKS
===================================== -->
            <!-- <section class="">
                <div class="container">
                    <div class="section-title section-title--bordered">
                        <h2>RELATED PRODUCTS</h2>
                    </div>
                    <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 4,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                            {"breakpoint":992, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} }
                        ]'>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Lpple
                                    </a>
                                    <h3><a href="product-details.php">Revolutionize Your BOOK With</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="image/products/product-10.jpg" alt="">
                                        <div class="hover-contents">
                                            <a href="product-details.php" class="hover-image">
                                                <img src="image/products/product-1.jpg" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.php" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="wishlist.php" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.php" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Jpple
                                    </a>
                                    <h3><a href="product-details.php">Turn Your BOOK Into High Machine</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="image/products/product-2.jpg" alt="">
                                        <div class="hover-contents">
                                            <a href="product-details.php" class="hover-image">
                                                <img src="image/products/product-1.jpg" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.php" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="wishlist.php" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.php" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Wpple
                                    </a>
                                    <h3><a href="product-details.php">3 Ways Create Better BOOK With</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="image/products/product-3.jpg" alt="">
                                        <div class="hover-contents">
                                            <a href="product-details.php" class="hover-image">
                                                <img src="image/products/product-2.jpg" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.php" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="wishlist.php" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.php" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Epple
                                    </a>
                                    <h3><a href="product-details.php">What You Can Learn From Bill Gates</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="image/products/product-5.jpg" alt="">
                                        <div class="hover-contents">
                                            <a href="product-details.php" class="hover-image">
                                                <img src="image/products/product-4.jpg" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.php" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="wishlist.php" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.php" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="" class="author">
                                        Hpple
                                    </a>
                                    <h3><a href="product-details.php">a Half Very Simple Things You To</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="image/products/product-6.jpg" alt="">
                                        <div class="hover-contents">
                                            <a href="product-details.php" class="hover-image">
                                                <img src="image/products/product-4.jpg" alt="">
                                            </a>
                                            <div class="hover-btns">
                                                <a href="cart.php" class="single-btn">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a href="wishlist.php" class="single-btn">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare.php" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- Modal -->
            <!-- <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
                aria-labelledby="quickModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="product-details-modal">
                            <div class="row">
                                <div class="col-lg-5">
                                    Product Details Slider Big Image
                                    <div class="product-details-slider sb-slick-slider arrow-type-two"
                                        data-slick-setting='{
                "slidesToShow": 1,
                "arrows": false,
                "fade": true,
                "draggable": false,
                "swipe": false,
                "asNavFor": ".product-slider-nav"
                }'>
                                        <div class="single-slide">
                                            <img src="image/products/product-details-1.jpg" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="image/products/product-details-2.jpg" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="image/products/product-details-3.jpg" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="image/products/product-details-4.jpg" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="image/products/product-details-5.jpg" alt="">
                                        </div>
                                    </div>
                                    <!-- Product Details Slider Nav
                                    <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
                                        data-slick-setting='{
                "infinite":true,
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "arrows": true,
                "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
                "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
                "asNavFor": ".product-details-slider",
                "focusOnSelect": true
                }'>
                                        <div class="single-slide">
                                            <img src="image/products/product-details-1.jpg" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="image/products/product-details-2.jpg" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="image/products/product-details-3.jpg" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="image/products/product-details-4.jpg" alt="">
                                        </div>
                                        <div class="single-slide">
                                            <img src="image/products/product-details-5.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 mt--30 mt-lg--30">
                                    <div class="product-details-info pl-lg--30 ">
                                        <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
                                        <h3 class="product-title">Beats EP Wired On-Ear Headphone-Black</h3>
                                        <ul class="list-unstyled">
                                            <li>Ex Tax: <span class="list-value"> £60.24</span></li>
                                            <li>Brands: <a href="#" class="list-value font-weight-bold"> Canon</a></li>
                                            <li>Product Code: <span class="list-value"> model1</span></li>
                                            <li>Reward Points: <span class="list-value"> 200</span></li>
                                            <li>Availability: <span class="list-value"> In Stock</span></li>
                                        </ul>
                                        <div class="price-block">
                                            <span class="price-new">£73.79</span>
                                            <del class="price-old">£91.86</del>
                                        </div>
                                        <div class="rating-widget">
                                            <div class="rating-block">
                                                <span class="fas fa-star star_on"></span>
                                                <span class="fas fa-star star_on"></span>
                                                <span class="fas fa-star star_on"></span>
                                                <span class="fas fa-star star_on"></span>
                                                <span class="fas fa-star "></span>
                                            </div>
                                            <div class="review-widget">
                                                <a href="">(1 Reviews)</a> <span>|</span>
                                                <a href="">Write a review</a>
                                            </div>
                                        </div>
                                        <article class="product-details-article">
                                            <h4 class="sr-only">Product Summery</h4>
                                            <p>Long printed dress with thin adjustable straps. V-neckline and wiring
                                                under the Dust with ruffles at the bottom
                                                of the
                                                dress.</p>
                                        </article>
                                        <div class="add-to-cart-row">
                                            <div class="count-input-block">
                                                <span class="widget-label">Qty</span>
                                                <input type="number" class="form-control text-center" value="1">
                                            </div>
                                            <div class="add-cart-btn">
                                                <a href="" class="btn btn-outlined--primary"><span
                                                        class="plus-icon">+</span>Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="compare-wishlist-row">
                                            <a href="" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                                            <a href="" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="widget-social-share">
                                <span class="widget-label">Share:</span>
                                <div class="modal-social-share">
                                    <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                                    <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </main>
    </div>
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
            if(!document.getElementById("star1").checked && !document.getElementById("star2").checked && !document.getElementById("star3").checked && !document.getElementById("star4").checked && !document.getElementById("star5").checked)
            {
                alert("Giving ratings is neccessary for submitting your review!");
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