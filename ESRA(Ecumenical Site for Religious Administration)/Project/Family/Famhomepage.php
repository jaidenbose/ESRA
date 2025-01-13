<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Piravom Valiya Pally</title>

		<!-- Loading third party fonts -->
		<link href="../Assets/Template/Main/fonts/novecento-font/novecento-font.css" rel="stylesheet" type="text/css">
		<link href="../Assets/Template/Main/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="../Assets/Template/Main/style.css">
		
		<!--[if lt IE 9]>
		<script src="../Assets/Template/Main/js/ie-support/html5.js"></script>
		<script src="../Assets/Template/Main/js/ie-support/respond.js"></script>
		<![endif]-->

	</head>

<?php
include("../Assets/Connection/Connection.php");
?>

	<body>
		<div class="site-content">
			<header class="site-header">
				<div class="container">
					<a href="index.php" class="branding">
						<img src="../Assets/Template/Main/logo.png" alt="" class="logo" width="250" height="250">
						<h1 class="site-title" style="font-size:28px;">St. Mary's Jacobite Syrian Congregation Piravom</h1>
					</a>

					<div class="main-navigation">
						<button class="menu-toggle"><i class="fa fa-bars"></i>Menu</button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="Famhomepage.php">Homepage</a></li>
                            <li class="menu-item current-menu-item"><a href="User.php">User</a></li>
                            <li class="menu-item current-menu-item"><a href="ViewDirectory.php">Directory</a></li>
                            <li class="menu-item current-menu-item"><a href="ApplyCertificate.php">Certificate</a></li>
                            <li class="menu-item current-menu-item"><a href="Auditoriumbooking.php">Auditorium</a></li>
                            <li class="menu-item current-menu-item"><a href="Donation.php">Donation</a></li>
                            <li class="menu-item current-menu-item"><a href="BookService.php">Service</a></li>
                            <li class="menu-item current-menu-item"><a href="ViewHallBooking.php">View Booking</a></li>
                            <li class="menu-item current-menu-item"><a href="ViewCertificateBookingStatus.php">View Certificate</a></li>
                            <li class="menu-item current-menu-item"><a href="../Guest/login.php">Logout</a></li>
							
						</ul>
					</div>

					<div class="mobile-navigation"></div>
				</div>
			</header> <!-- .site-header -->

			<div class="hero">
				<div class="slides">
					<li data-bg-image="../Assets/Template/Main/banner2.jpg">
						<div class="container">
							<div class="slide-content">
								<h1 style="font-family: PT Sans;">"For where two or three gather in my name, there am I with them."</h1>
<small class="slide-subtitle" style="font-family: 'Courier New';font-size:20px">-Matthew 18:20</small>
							</div>
						</div>
					</li>

					<li data-bg-image="../Assets/Template/Main/banner3.jpg">
						<div class="container">
							<div class="slide-content">
								<h1 style="font-family: PT Sans;">"Consequently, faith comes from hearing the message, and the message is heard through the word about Christ."</h1>
<small class="slide-subtitle" style="font-family: 'Courier New';font-size:20px">-Romans 10:17</small>
							</div>
						</div>
					</li>
                    <li data-bg-image="../Assets/Template/Main/banner1.jpg">
						<div class="container">
							<div class="slide-content">
								<h1 style="font-family: PT Sans;">"But seek first his kingdom and his righteousness, and all these things will be given to you as well."</h1>
<small class="slide-subtitle" style="font-family: 'Courier New';font-size:20px">-Matthew 6:33</small>
							</div>
						</div>
					</li>
				</div>
			</div>

			<main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
						<h2 class="section-title">Recent news</h2>

						<div class="row">
                        <marquee  direction="right" loop="30">
                        
                        <?php
                                                $i = 0;
                                                $selQry = "select * from tb_news";
                                                $rs = $conn->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                        
							<div class="col-md-3 col-sm-6">
								<div class="news">
									<image style="width:150px;height:150px" class="news-image" src="../Assets/Famphoto/<?php echo $data["news_image"] ?>" ></image>
									<h3 class="news-title"><a href="../"><?php echo $data["news_content"] ?></a></h3>
									<small class="date"><i class="fa fa-calendar"></i><?php echo $data["news_date"] ?></small>
								</div>
							</div>
                            <?php
												}
							?>
		
                            </marquee>
						</div> <!-- .row -->
					</div> <!-- .container -->
				</div> <!-- section -->

				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<h2 class="section-title">Upcoming events</h2>
								<ul class="event-list">
                                
                                 <?php
                                                $i = 0;
                                                $selQry = "select * from tb_event";
                                                $rs = $conn->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                                               <li>
                                                    <a href="javascript:void(0)">
                                                        <h3 class="event-title"><?php echo $data["event_name"] ?></h3>
                                                        <span class="event-meta">
                                                            <span><i class="fa fa-calendar"></i><?php echo $data["event_date"] ?></span>
                                                            <span><i class="fa fa-map-marker"></i> <?php echo $data["event_location"] ?></span>
            
                                                        </span>
                                                    </a>
                                                </li>
                                            <?php                    
                                              }


                                            ?>
                                
									
									
								</ul>

							</div>
							<div class="col-md-6">
								<h2 class="section-title">Latest Ceremony</h2>
								<ul class="seremon-list">
                                
                                  <?php
                                                $i = 0;
                                                $selQry = "select * from tb_ceremony";
                                                $rs = $conn->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                                
									<li>
										<img style="width:70px;height:70px" src="../Assets/Famphoto/<?php echo $data["ceremony_image"] ?>" alt="">
										<div class="seremon-detail">
											<h3 class="seremon-title"><a href="../"><?php echo $data["ceremony_data"] ?></a></h3>
											<div class="seremon-meta">
												<div class="pastor"><i class="fa fa-user"></i><?php echo $data["ceremony_name"] ?></div>
												<div class="date"><i class="fa fa-calendar"></i> <?php echo $data["ceremony_date"] ?></div>
											</div>
										</div>
									</li>
                                    
                                     <?php                    
                                              }


                                            ?>
									
								</ul>

							</div>
						</div> <!-- .row -->
					</div> <!-- .container -->
				</div> <!-- section -->
			</main> <!-- .main-content -->

			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="widget">
								<h3 class="widget-title">Our address</h3>
								<p>St. Mary's Jacobite Syrian Orthodox Christian Congregation, Piravom </p>
								<ul class="address">
									<li><i class="fa fa-map-marker"></i> Post Office Junction Piravom</li>
									<li><i class="fa fa-map-marker"></i> Pin: 686664</li>
									<li><i class="fa fa-map-marker"></i> Piravom P.O</li>
									<li><i class="fa fa-phone"></i>0485 2242260</li>
									<li><i class="fa fa-envelope"></i> Rajakkaludenada@gmail.com</li>
								</ul>
							</div>
						</div>
						<div class="col-md-4">
							<div class="widget">
								<h3 class="widget-title">The sole Church in the world in comemmoration of Holy Kings</h3>
								<p>
“Piravom Valiyapally”, the most ancient and prominent church in Kerala stands on a lovely hilltop on the eastern bank of the Muvattupuzha river at Piravom, 35 Kms east of Kochi. Adorned with all the majestic beauty of nature, this Church is believed to be as old as the Christianity. It is the centre of hope and refuge to the poor, the sick, the needy, the desperate, the destitutes and the down-trodden.
											</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="widget">
								<h3 class="widget-title">Emergency Service</h3>
								<p>The Ambulance service is available 24*7 </p>
								<form action="#" class="contact-form">
									<div class="row">
										<div class="col-md-6">
											<img src="../Ambulance-removebg-preview.png"width="220" height="180" >
										</div>
										<div class="col-md-6">
											Ph No: 7559095914 <br>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
											9544778428
										</div>
									</div>
								</form>
							</div>
						</div>
					</div> <!-- .row -->

					<p class="colophon">Copyright 2014 True Church. All right reserved</p>
				</div><!-- .container -->
			</footer> <!-- .site-footer -->

		</div>
		

		<script src="../Assets/Template/Main/js/jquery-1.11.1.min.js"></script>
		<script src="../Assets/Template/Main/js/plugins.js"></script>
		<script src="../Assets/Template/Main/js/app.js"></script>
		
	</body>

</html>