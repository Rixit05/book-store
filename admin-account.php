<?php
    error_reporting(0);
    session_start();
?>

<!DOCTYPE html>
<html lang="zxx">
<?php 
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
		<!--=============================================
    =            Login Register page content         =
    =============================================-->
    <section class="breadcrumb-section">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="admin-index.php">Home</a></li>
							<li class="breadcrumb-item active">FAQ</li>
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
									<a href="#account-info" class="active" data-toggle="tab"><i class="fa fa-user"></i> Account
										Details</a>
									<a href="login-register.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
								</div>
							</div>
							<!-- My Account Tab Menu End -->
							<!-- My Account Tab Content Start -->
							<div class="col-lg-9 col-12 mt--30 mt-lg--0">
								<div class="tab-content" id="myaccountContent">
									<div class="tab-pane fade show active" id="account-info" role="tabpanel">
										<div class="myaccount-content">
											<h3>Account Details</h3>
											<div class="account-details-form">
												<form action="update-profile.php" method="post">
													<div class="row">
														<div class="col-lg-12 col-12  mb--30">
															<input id="Name" placeholder="Name" type="text" name="Name" minlength="6">
														</div>
														<div class="col-12  mb--30">
															<input id="email" placeholder="Email Address" type="email" name="Email" required>
														</div>
														<div class="col-12  mb--30">
															<h4>Password change</h4>
														</div>
														<div class="col-12  mb--30">
															<input id="current-pwd" placeholder="Current Password"
																type="password" name="Old_password" required>
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
								</div>
							</div>
							<!-- My Account Tab Content End -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- faq Page End -->
        <section class="section-margin"></section>
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