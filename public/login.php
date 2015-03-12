<?php
 /**
     * login.php
     *
     */

    // enable sessions
    session_start();
    
    date_default_timezone_set('Asia/Dubai');

    // connect to database
    if (($connection = mysql_connect("localhost", "root", "")) === false)
        die("Could not connect to database");

    // select database
    if (mysql_select_db("se_db", $connection) === false)
        die("Could not select database");

    // if username and password were submitted, check them
    if (isset($_POST["username1"]) && isset($_POST["password1"]))
    {
		
		$username1 = $_POST["username1"];
		$password1 = $_POST["password1"];
        // prepare SQL
        $sql = "SELECT cid,password,account_type  FROM client WHERE cid='$username1' AND password='$password1'";

        // execute query
        $result = mysql_query($sql);
        if ($result === false)
		{
			echo "$result";
            die("Could not query database");
			}
        // check whether we found a row
        if (mysql_num_rows($result) == 1)
        {
            // remember that user's logged in
            //$_SESSION["authenticated"] = true;
            $_SESSION["username1"] = $_POST["username1"];

            // save password in, ack, cookie for a week if requested
            if ($_POST["keep"])
                setcookie("password1", $_POST["password1"], time() + 7 * 24 * 60 * 60);			
			     
           $check = mysql_fetch_assoc($result);
            if($check["account_type"] == 'admin')
            {
			  $_SESSION["admin-authentication"] = true;
              $host = $_SERVER["HTTP_HOST"];
              $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
			  header("Location: http://$host$path/dashboard.php");
              //header("Location: http://$host$path/admin.php");
              exit;
            }
            else if($check["account_type"] == 'fa')
            {
			  $_SESSION["fa-authentication"] = true;
              $host = $_SERVER["HTTP_HOST"];
              $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
			  header("Location: http://$host$path/dashboard.php");
              //header("Location: http://$host$path/FA.php");
              exit;
            }
			else if($check["account_type"] == 'client')
            {
			  $_SESSION["client-authentication"] = true;
              $host = $_SERVER["HTTP_HOST"];
              $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
			  header("Location: http://$host$path/dashboard.php");
              //header("Location: http://$host$path/Client.php");
              exit;
            }
			else 
            {
              header("Location: http://$host$path/Failure.php");
              exit;
            }
        }
    }
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Wealth Management Tool | Login</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
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
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="login">

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
								<li class="current"><a href="index.html">Home</a></li>
								<li><a href="register.php">Register</a></li>
								<li><a href="login.php">Login</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
						</nav>


				</div>
			</div>
		
		

		<!-- Highlights -->
			<div class="wrapper style2">
				<div class="title">LOGIN</div>
				<div id="main" class="container">
							
					<!-- Content -->
													<div id="content">
														<article class="is is-post">
															<header class="style1">
																<h2>WealthLogic Authentication<br class="mobile-hide" />
																</h2>
																<span class="byline"></span>
															</header>
															
															
															<p>Fill out your Username and Password correctly. </p>
															
															<div class="12u">

												<!-- Contact Form -->
													<section class="footer-one">
														<form method="post" action='<?php echo $_SERVER["PHP_SELF"] ?>'>
															<div>
																<div class="row">
																	<div class="12u">
																		<input type="text" class="text" name="username1" id="username1" placeholder="username" />
																	</div>
																	<div class="12u">
																		<input type="password" class="text" name="password1" id="password1" placeholder="password" />
																	</div>
																	
																	
																</div>
																
																<div class="row">
																	<div class="12u">
																		<ul class="actions">
													<li><input type="submit" class="style1" value="Login" /></li>
													<li><input type="reset" class="style2" value="Forgot your password?" /></li>
												</ul>
																	</div>
																</div>
															</div>
														</form>
													</section>
												<!-- /Contact Form -->

											</div>
															
														</article>
														
													
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