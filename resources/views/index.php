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
        $sql = "SELECT uid,usrn,pwd  FROM user_pwd WHERE usrn='$username1' AND pwd='$password1'";

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
			  header("Location: http://localhost/api/site/dashboard.php");
              //header("Location: http://$host$path/admin.php");
              exit;
            }
            else if($check["account_type"] == 'fa')
            {
			  $_SESSION["fa-authentication"] = true;
              $host = $_SERVER["HTTP_HOST"];
              $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
			  header("Location: http://localhost/api/site/dashboard.php");
              //header("Location: http://$host$path/FA.php");
              exit;
            }
			else if($check["account_type"] == 'client')
            {
			  $_SESSION["client-authentication"] = true;
              $host = $_SERVER["HTTP_HOST"];
              $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
			  header("Location: http://localhost/api/site/dashboard.php");
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
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="utf-8">
      <title>Vashu Markets - Trade Wisely</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>
      <meta name="description" content="">
      <meta name="keywords" content="">
      <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]--> 
      <link rel="shortcut icon" href="img/favicon.html">
      <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
      <link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
      <link type="text/css" rel="stylesheet" href="css/magnific-popup.css">
      <link type="text/css" rel="stylesheet" href="css/animate.min.css">
      <link type="text/css" rel="stylesheet" href="css/dark-style.css">
      <link type="text/css" rel="stylesheet" href="css/switcher.css">
      <link type="text/css" rel="stylesheet" href="css/orange.css" title="orange">
      <link type="text/css" rel="stylesheet" href="css/red.css" title="red">
      <link type="text/css" rel="stylesheet" href="css/dark-red.css" title="dark-red">
      <link type="text/css" rel="stylesheet" href="css/yellow.css" title="yellow">
      <link type="text/css" rel="stylesheet" href="css/green.css" title="green">
      <link type="text/css" rel="stylesheet" href="css/pink.css" title="pink">
      <link type="text/css" rel="stylesheet" href="css/lite-blue.css" title="lite-blue">
      <link type="text/css" rel="stylesheet" href="css/blue.css" title="blue">
      <link type="text/css" rel="stylesheet" href="css/indigo.css" title="indigo">
      <link type="text/css" rel="stylesheet" href="css/cyan.css" title="cyan">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
	

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
<script>

$(document).ready(function() {	

	//select all the a tag with name equal to modal
	$('a[name=modal]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		
		//Get the A tag
		var id = $(this).attr('href');
	
		//Get the screen height and width
		var coverHeight = $(document).height();
		var coverWidth = $(window).width();
	
		//Set heigth and width to cover to fill up the whole screen
		$('#cover').css({'width':coverWidth,'height':coverHeight});
		
		//transition effect		
		$('#cover').fadeIn(1000);	
		$('#cover').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 
	
	});
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#cover').hide();
		$('.window').hide();
	});		
	
	//if cover is clicked
	$('#cover').click(function () {
		$(this).hide();
		$('.window').hide();
	});			

	$(window).resize(function () {
	 
 		var box = $('#boxes .window');
 
        //Get the screen height and width
        var coverHeight = $(document).height();
        var coverWidth = $(window).width();
      
        //Set height and width to cover to fill up the whole screen
        $('#cover').css({'width':coverWidth,'height':coverHeight});
               
        //Get the window height and width
        var winH = $(window).height();
        var winW = $(window).width();

        //Set the popup window to center
        box.css('top',  winH/2 - box.height()/2);
        box.css('left', winW/2 - box.width()/2);
	 
	});
	
});

</script>
<style>
body {
font-family:verdana;
font-size:15px;
}

a {color:#333; text-decoration:none}
a:hover {color:#ccc; text-decoration:none}

#cover {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
  
#boxes .window {
  position:fixed;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}

#boxes #dialog {
  width:375px; 
  height:203px;
  padding:10px;
  background-color:#ffffff;
}

#boxes #dialog1 {
  width:375px; 
  height:203px;
}

#dialog1 .d-header {
  background:url(images/notice.png) no-repeat 0 0 transparent; 
  width:375px; 
  height:150px;
}

#dialog1 .d-header input {
  position:relative;
  top:60px;
  left:100px;
  border:3px solid #cccccc;
  height:32px;
  width:200px;
  font-size:15px;
  padding:5px;
  margin-top:4px;
}

#dialog1 .d-blank {
  float:left;
  background:url(images/notice.png) no-repeat 0 0 transparent; 
  width:267px; 
  height:53px;
}

#dialog1 .d-login {
  float:left;
  width:108px; 
  height:53px;
  
}

#boxes #dialog2 {
  background:url(images/notice.png) no-repeat 0 0 transparent; 
  width:326px; 
  height:229px;
  padding:50px 0 20px 25px;
}
</style>



   </head>
   <body>
   



<!-- cover to cover the whole screen -->
  <div id="cover"></div>
  
  
</div>   




      <div id="mask">
	  
	    
         <div id="loader"> </div>
      </div>





	  
      <header class="header-area clearfix">
         <div class="container clearfix">
            <div class="logo-area"> <a href="#" class="logo-main"><img src="img/logo.png" alt=""></a> <a class="toggle-ico"><i class="fa fa-bars"></i></a> </div>
            <nav class="navigation-area">
               <ul class="main-menu">
                  <li><a href="#home-page">Home</a></li>
                  <li><a href="#about">About</a></li>
                  <li><a href="#features">Features</a></li>
                  <li><a href="#contact-us">Contact Us</a></li>
                  <li><a href="#dialog1" name="modal" class="download-btn" >Login</a></li>
               </ul>
            </nav>
	
         </div>
      </header>
	  
     
        <div id="boxes">


  
<form method="post" action='<?php echo $_SERVER["PHP_SELF"] ?>'>
<!-- Start of Login Dialog -->  
<div id="dialog1" class="window" style="background: url('images/notice.png');">
  <div class="d-header" >
    <input type="text" name="username1" id="username1"  value="username" onclick="this.value=''"/><br/>
    <input type="password" name="password1" id="password1" value="Password" onclick="this.value=''"/>    
  </div>
  <div class="d-blank"></div>
  <div class="d-login"><input type="submit" alt="Login" title="Login" value="submit"></div>
</div>
<!-- End of Login Dialog -->  
</form>



<!-- cover to cover the whole screen -->
  <div id="cover"></div>
</div>
		
		
		
		
		
	   <section class="banner-slider" id="home-page">
	    
	  <ul class="slides clearfix">
            <li class="slide01">
               <div class="bg-solid">
                  <h1>TRADE WISELY</h1>
                  <h2><span>WEALTH MANAGEMENT</span> TOOL</h2>
                  <p> </p>
                  <div class="ban-download-btns"> <a href="#about" class="view-btn">Let's Start</a>  </div>
               </div>
            </li>
            <li class="slide02">
               <div class="bg-solid">
                  <h1>START TODAY</h1>
                  <h2><span>Powerful Research Tool. </span>Stock Trading Simplified</h2>
                  <p> </p>
                  <div class="ban-download-btns"> <a href="#about" class="view-btn">Let's Start</a> </div>
               </div>
            </li>
           
         </ul>


   
      </section>
      <section class="banner-secondary-main clearfix" id="about">
         <div class="banner-secondary">
             <div class="container" align="center">
			 </br></br>
			 <h1 class="animated" data-animation="fadeInUp" data-animation-delay="100"><span>About</span> Vashu Market</h1></br>
            <p class="medium animated" data-animation="fadeInUp" data-animation-delay="100">Founded in 1998, Wealth Management(WM) is one of the most respected names in Forex, with offices in many of the world's major financial centers. </p>
           </br></br></br><h3> Our History</h3></br>
<p align="justify">
Our sterling reputation, dedication to meeting our clients' needs and innovative approach to business development are some of the driving forces behind our success. Today, as a successful Forex broker, we are trusted by hundreds of thousands of clients.

Today, Wealth Management(WM) is one of the leading names in Forex trading, but getting here didn't come easy. Wealth Management(WM)'s history is a story of triumph over seemingly insurmountable odds; a story of three men who started with nothing, during one of the most devastating economic crises in recent history, and managed to develop their small, provincial trading center into a global online trading company.
</br></br> At Wealth Management(WM), we believe it was not luck that got us here, but rather our reputation for honest business practices, our devotion to our clients and our forward-thinking approach to business development, values that we have worked to maintain throughout our company's history.</br></br></br>
       </p></br></br></div></div>
      </section>
     
      <section class="features-second" id="features">
         <div class="container">
            <h1 class="animated" data-animation="fadeInUp" data-animation-delay="100"><span>Vashu Market</span> Tools</h1>
            <p class="medium animated" data-animation="fadeInUp" data-animation-delay="200">Following list of features makes us different from other traded companies. </p>
            <div class="row features-cont-all clearfix">
               <div class="col-md-4 animated" data-animation="fadeInUp" data-animation-delay="100">
                  <div class="features-single">
                     <div class="features-icon"><i class="fa fa-laptop"></i></div>
                     <div class="features-cont">
                        <h4>Charts in Vashu Tool</h4>
                        <p align="justify">WM Tool charts are used for illustrating the changes in symbol prices, enabling technical analysis and utilizing Expert Advisors. This allows traders to detect symbol quotes in real time and respond instantly to any changes in the financial markets.</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 animated" data-animation="fadeInUp" data-animation-delay="200">
                  <div class="features-single">
                     <div class="features-icon"><i class="fa fa-plug"></i></div>
                     <div class="features-cont">
                        <h4>Technical Analysis</h4>
                        <p align="justify">Technical analysis of the forex and stock markets is an integral part of trading. It helps identify various symbol trends, define support/resistance levels, forecast price dynamics and much more. In other words, technical analysis is cool.</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 animated" data-animation="fadeInUp" data-animation-delay="300">
                  <div class="features-single">
                     <div class="features-icon"><i class="fa fa-twitter"></i></div>
                     <div class="features-cont">
                        <h4>Fundamental Analysis</h4>
                        <p align="justify">Fundamental analysis is another tool that can be used to predict the price dynamics of financial instruments. Its aim in the constant analysis of various economic and industrial indicators, which may affect the quotes of a financial instrument.</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 animated" data-animation="fadeInUp" data-animation-delay="400">
                  <div class="features-single">
                     <div class="features-icon"><i class="fa fa-html5"></i></div>
                     <div class="features-cont">
                        <h4>Trade Signals</h4>
                        <p align="justify">It can help you monitor trades of successful traders and have your terminal automatically reproduce everything your target trader is doing. You choose a provider, connect to his signal - et voila! All his trades are now yours! </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 animated" data-animation="fadeInUp" data-animation-delay="500">
                  <div class="features-single">
                     <div class="features-icon"><i class="fa fa-sliders"></i></div>
                     <div class="features-cont">
                        <h4>Automated Tradings</h4>
                        <p align="justify">Managing a trade account using a computer program is called Automated Trading or Algorithmic Trading. Such programs can analyze forex quotes or stock quotes and execute trade operations.  </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 animated" data-animation="fadeInUp" data-animation-delay="600">
                  <div class="features-single">
                     <div class="features-icon"><i class="fa fa-link"></i></div>
                     <div class="features-cont">
                        <h4>Robots and Indicators</h4>
                        <p align="justify">Any trader can use trading robots (Expert Advisors) to work on financial markets: Forex, Stocks, Futures & CFD. These powerful programs can take humans place both in market analysis and trading.  </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
      <section class="contact-main" id="contact-us">
         <div class="solid-bg">
            <div class="container">
               <div class="contact-icon">
                  <div class="icon-cont"><i class="fa fa-envelope-o"></i></div>
               </div>
               <h2 class="animated" data-animation="fadeInUp" data-animation-delay="100">Contact</h2>
               <hr class="animated" data-animation="fadeInUp" data-animation-delay="200">
               <p class="animated" data-animation="fadeInUp" data-animation-delay="300">Drop the line bellow to get a quick response from our supporting team.</p>
               <div class="contact-form">
                  <form name="contact" method="post">
                     <div id="contact-form"> <input type="text" id="contact-name" class="first-field animated" data-animation="fadeInUp" data-animation-delay="100" placeholder="Your Name"> <input type="text" id="contact-email" class="second-field animated" data-animation="fadeInUp" data-animation-delay="100" placeholder="Your Email"> <input type="text" id="contact-phone" class="third-field animated" data-animation="fadeInUp" data-animation-delay="100" placeholder="Your Phone"> <textarea id="contact-msg" rows="10" cols="10" class="forth-field animated" data-animation="fadeInUp" data-animation-delay="200" placeholder="Your Message"></textarea> <button type="button" id="contact-submit" class="contact-submit animated" data-animation="fadeInUp" data-animation-delay="300">Submit Now</button> </div>
                     <div id="contact-loading"> Email Sending... </div>
                     <div id="contact-success"> Your message sent successfully to our team and they will be in touch with you asap. </div>
                     <div id="contact-failed"> Error...!, message sending failed , try after sometime. </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <footer class="footer-area">
         <div class="container">
            <p class="animated" data-animation="fadeInUp" data-animation-delay="200"> &copy; copyright 2015 <b><a href="#">Vashu Markets</a></b> </p>
           
         </div>
      </footer>
      <script type="text/javascript" src="js/jquery-1.10.2.js"></script> <script type="text/javascript" src="js/bootstrap.js"></script> <script type="text/javascript" src="js/jquery.flexslider.js"></script> <script type="text/javascript" src="js/jquery.easytabs.min.js"></script> <script type="text/javascript" src="js/jquery.magnific-popup.js"></script> <script type="text/javascript" src="js/testimonialcarousel.js"></script> <script type="text/javascript" src="js/jquery.appear.js"></script> <script type="text/javascript" src="js/responsiveCarousel.js"></script> <script type="text/javascript" src="js/settings.js"></script> <script type="text/javascript" src="js/forms.js"></script> <script type="text/javascript" src="js/styleswitcher.js"></script> 
   
   
   
   </body>
</html>
