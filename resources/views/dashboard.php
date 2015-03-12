<?php

session_start();

date_default_timezone_set('Asia/Dubai');

include ("dbfunctions.php");
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Wealth Management Tool | Dashboard</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
	</head>
	<body class="left-sidebar">

		<!-- Header -->
			<div id="header-wrapper" class="wrapper">
				<div id="header">
					
					<!-- Logo -->
						<div id="logo">
							<h1 style="font-weight:normal;font-size:36px;color:#ffffff;text-decoration: none;"></h1>
							<p></p>
						</div>
					
					<!-- Nav -->
						<nav id="nav">
							<ul>
							<?php if (isset($_SESSION["admin-authentication"]) && $_SESSION["admin-authentication"] == true) {
							echo "<li class='current'><span>Profile</span><ul>
															<li><a href='./aclient.php'>Client's info</a></li>
															<li><a href='./afa.php'>FA's info</a></li>
														</ul></li>
								<li><span>Client</span><ul>
															<li><a href='./atransfer.php'>Transfer Client </a></li>
															<li><a href='./aaddc.php'>Add Client</a></li>
															<li><a href='./aremovec.php'>Remove Client</a></li>
														</ul></li>
								<li><span>Financial Advisor</span><ul>
															<li><a href='./aschedule.php'>Schd Meeting</a></li>
															<li><a href='./aaddf.php'>Add FA</a></li>
															<li><a href='./aremovef.php'>Remove FA</a></li>
														</ul></li>
								<li><span>WP Control</span><ul>
															<li><a href='./abuy_sell.php'>Buy/Sell Shares</a></li>
															<li><a href='./achange.php'>Change Limits</a></li>
														</ul></li>
								<li ><a href='./logout.php'>Logout</a></li>" ;
								}
							elseif (isset($_SESSION["fa-authentication"]) && $_SESSION["fa-authentication"] == true) {
								echo "<li class='current'><span>Profile</span><ul>
															<li><a href='./fa.php'>My Info</a></li>
															<li><a href='./fclient.php'>Client Info</a></li>
														</ul></li>
								
								<li><span>My Clients</span><ul>
															<li><a href='./fschedule.php'>Schd Meeting</a></li>
															<li><a href='./fviewc.php'>View MyClient</a></li>
															<li><a href='./feditc.php'>Edit/Remove Client</a></li>
														</ul></li>
								<li><span>Wallet</span><ul>
															<!--<li><a href='./fcard.php'>Add/Remove Card</a></li>-->
															<li><a href='./fcash.php'>Add/Remove Cash</a></li>
														</ul></li>
								<li><span>WP Control</span><ul>
															<li><span>Stock Market</span><ul>
															<li><a href='./browse.php'>Browse Market</a></li>
															<li><a href='./charts.php'>Historical Charts</a></li>
														</ul></li>
															<li><a href='./buysellshare.php'>Buy/Sell Shares</a></li>
															<li><a href='./makenotes.php'>Make Notes</a></li>
														</ul></li>
								<li ><a href='./logout.php'>Logout</a></li>" ;
							}
							elseif (isset($_SESSION["client-authentication"]) && $_SESSION["client-authentication"] == true){
								echo "<li class='current'><a href='cprofile.php'>Profile</a></li>
								
								<li><span>Financial Advisor</span><ul>
															<li><a href='./crequest.php'>Request Meeting</a></li>
															<li><a href='./caddf.php'>Add/Request FA</a></li>
															<li><a href='./cremovef.php'>Remove/Change FA</a></li>
														</ul></li>
								<li><span>Wallet</span><ul>
															<li><a href='./ccard.php'>Add/Remove Card</a></li>
															<li><a href='./ccash.php'>Add/Remove Cash</a></li>
														</ul></li>
								<li><span>WP Control</span><ul>
															<li><span>Stock Market</span><ul>
															<li><a href='./browse.php'>Browse Market</a></li>
															<li><a href='./charts.php'>Historical Charts</a></li>
														</ul></li>
														
															<li><a href='./buysellshare.php'>Buy/Sell Shares</a></li>
															<li><a href='./viewnotes.php'>View Notes</a></li>
														</ul></li>
								<li ><a href='./logout.php'>Logout</a></li>";
							}
							else{
								header("Location:http://localhost/SE/failure.php");
							}
							
					
							 ?>
							</ul>
						</nav>

				</div>
			</div>
		
			<div class="wrapper style3">
				<div class="title">Welcome $Username</div>
				<p style="text-align:center; font-size:36px;">Wealth Logic Tool</p>
				<div id="highlights" class="container">
				
					<div class="row 150%">
						<div class="4u">
							<section class="highlight">
								<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
								
								<ul class="actions">
									<li><a href="#" class="button style1">Stock Market</a></li>
								</ul>
							</section>
						</div>
						<div class="4u">
							<section class="highlight">
								<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
								
								<ul class="actions">
									<li><a href="#" class="button style1">Buy or Sell</a></li>
								</ul>
							</section>
						</div>
						<div class="4u">
							<section class="highlight">
								<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
								
								<ul class="actions">
									<li><a href="#" class="button style1">View Notes</a></li>
								</ul>
							</section>
						</div>
					</div>
				</div>
			</div>
		
		<!-- Footer -->
			<div id="footer-wrapper" class="wrapper">
				<div class="title">STAY IN TOUCH</div>
				<div id="footer" class="container">
					
					
					<div class="row 150%">
						
						<!-- Footer -->
								<div id="footer">
									
									
									<div>
										<div class="row">
											
											<div class="12u">
											
												<!-- Contacts -->
													<section class="footer-two">
														<div class="feature-list feature-list-small">
															
																<div class="row">
																	<div class="2u">
																		<section>
																			<h3 class="fa"></h3>
																			<p>
																				
																			</p>
																		</section>
																	</div>
																	<div class="3u">
																		<section>
																			<h3 class="fa fa-comment">Social</h3>
																			<p>
																				<a href="http://www.twitter.com/@WMTool">twitter@WMTool</a><br />
																				
																			</p>
																		</section>
																	</div>
																	<div class="3u">
																		<section>
																			<h3 class="fa fa-envelope">Email</h3>
																			<p>
																				<a href="#">info@WMTool.com</a>
																			</p>
																		</section>
																	</div>
																	<div class="3u">
																		<section>
																			<h3 class="fa fa-phone">Phone</h3>
																			<p>
																			<a href="">	(+971)50-1234567</a>
																			</p>
																		</section>
																	</div>
																</div>
															
														</div>
													</section>
												<!-- /Contacts -->
													
											</div>
										</div>
									</div>
									
									<header class="style1">
										
										<p class="byline" align = "justify">
											Spread betting, CFDs and FX are leveraged products and carry a high level of risk to your capital as prices may move rapidly against you. It is possible to lose more than your initial investment and you may be required to make further payments. These products may not be suitable for all clients therefore ensure you understand the risks and seek independent advice.
										</p>
									</header>
								</div>
							<!-- /Footer -->
					</div>
					
				</div>
				<div id="copyright">
					<ul>
						<li>&copy; All Rights Reserved</li><li> <a href="http://">Wealth Management Tool</a></li>
					</ul>
				</div>
			</div>

	</body>
</html>