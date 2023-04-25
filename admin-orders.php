<!DOCTYPE html>
<html lang="zxx">
<?php 
    include "connect.php";
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
							<li class="breadcrumb-item active">Orders</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!--=============================================
    =            Login Register page content         =
    =============================================-->
		<!-- Cart Page Start -->
		<main class="cart-page-main-block inner-page-sec-padding-bottom">
			<div class="cart_area cart-area-padding  ">
				<div class="container">
					<div class="page-section-title">
						<h1>Books</h1>
					</div>
					<div class="row">
						<div class="col-12">
							<form action="#" class="">
								<!-- Cart Table -->
											<!-- Product Row -->
											<?php
                                            if($_GET['page'])
                                            {
                                                $page=$_GET['page'];
                                            }
                                            else
                                            {
                                                $page=1;
                                            }
                                                $start=10*($page-1)+1;
                                                $end=10*($page);
												$sql="select * from order_header";
												$data=mysqli_query($con,$sql);
												if($Total=mysqli_num_rows($data))
												{
                                                    echo '
                                                    <div class="cart-table table-responsive mb--40">
                                                        <table class="table">
                                                            <!-- Head Row -->
                                                            <thead>
                                                                <tr>
                                                                    <th >Order No.</th>
                                                                    <th class="pro-title">Customer Name</th>
                                                                    <th class="pro-price">Order date</th>
                                                                    <th class="pro-quantity">Shipping charge</th>
                                                                    <th class="pro-discount">Subtotal</th>
                                                                    <th class="pro-thumbnail">Total</th>
                                                                    <th>View</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                    ';
                                                    $count=1;
													while($result=mysqli_fetch_array($data))
													{
														$User_id=$result['User_id'];
														$sql2="select * from user_details where User_id='$User_id'";
														$data2=mysqli_query($con,$sql2);
														while($result2=mysqli_fetch_array($data2))
														{
                                                            if($count>=$start && $count<=$end)
                                                            {
                                                                echo '
                                                                <tr>
                                                                    <td class="pro-remove">'.$result['Order_id'].'</td>
                                                                    <td class="pro-thumbnail">'.$result2['Name'].'</td>
                                                                    <td class="pro-title">'.$result['Order_date'].'</td>
                                                                    <td class="pro-price"><span>'.$result['Shipping_charge'].'</span></td>
                                                                    <td class="pro-quantity">'.$result['Total'].'</td>
                                                                    <td class="pro-subtotal"><span>'.$result['Total']+$result['Shipping_charge'].'</span></td>
                                                                    <td class="pro-remove">
                                                                        <a href="show-order.php?id='.$result['Order_id'].'"><i class="fas fa-eye"></i></a>
                                                                    </td>
                                                                </tr>
                                                                ';
                                                            }
                                                            $count++;
														}
                                                    }
                                                        echo '
                                                        </tbody>
									                </table>
								                </div>
                                                        ';
                                                        if($page!=1)
                                                        {
                                                            echo '
                                                            <a href="admin-orders.php?page='.($page-1).'" class="btn btn--primary">
                                                                <i class="fas fa-chevron-left"></i> Previous
                                                            </a>
                                                            ';
                                                        }
                                                        if($page<$Total/10)
                                                        {
                                                            echo '
                                                            <a href="admin-orders.php?page='.($page+1).'" class="btn btn--primary" style="float:right;" >
                                                                Next <i class="fas fa-chevron-right"></i>
                                                            </a>
                                                            ';
                                                        }
												}
												else
												{
													echo "No records found!";
												}
											?>
											<!-- Product Row -->
											<!-- Discount Row  -->
										
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- Cart Page End -->
	</div>
	<footer class="site-footer">
		<div class="footer-bottom">
			<div class="container">
			</div>
		</div>
	</footer>
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>