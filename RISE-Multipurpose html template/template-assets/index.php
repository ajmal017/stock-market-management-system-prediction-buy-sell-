<?php
session_start();
$message="";
if(count($_POST)>0) {
$conn = mysql_connect("localhost","root","");
mysql_select_db("form",$conn);
$result = mysql_query("SELECT * FROM user WHERE activate=1 and name='" . $_POST["name"] . "' and password = '". $_POST["password"]."'");
$row  = mysql_fetch_array($result);
if(is_array($row)) {
$_SESSION["id"] = $row[id];
$_SESSION["name"] = $row[name];
$_SESSION["bankaccount"] = $row[bankaccount];
} else {
$message = "Invalid Username or Password!";
//echo "Invalid Username or Password!";

}
}
if(isset($_SESSION["id"])) {
header("Location:dashboard-charts/dashboard.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>H&K securities</title>
    <link rel="icon" type="image" href="img/1474110651_bar-chart_opt.png" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Stock Market Predictor">
    <meta name="keywords" content="">
    <meta name="author" content="keval Shah, Harsh Shah">

    <!-- Bootstrap Css -->
    <link href="bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- for login modal -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="yo.css"><!-- for flipping images -->

    <link href="plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="plugins/Lightbox/dist/css/lightbox.css" rel="stylesheet">
    <link href="plugins/Icons/et-line-font/style.css" rel="stylesheet">
    <link href="plugins/animate.css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!-- Icons Font -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
function validateLogin() {
    var x = '<?php echo $message; ?>';
   
    if(x !="")
     {
         document.getElementById("error").innerHTML = "invalid username password";
         //alert("password doesnot match");
         //window.location.href = "http://www.google.com";
         return false;
     }

     
}
</script>
</head>

<body>
    <!-- Preloader
	============================================= -->
    <div class="preloader"><i class="fa fa-circle-o-notch fa-spin fa-2x"></i></div>
    <!-- Header
	============================================= -->
    <section class="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">

                <div class="navbar-header ">
                   
                    <a class="navbar-brand" href="#"><img src="img/blacklogo.png" class="img-responsive" alt="logo" style="width:70px;height:70px;"></a>
                </div>

                <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                    <div class="col-md-8 nav-wrap">
                        <ul class="nav navbar-nav">
                            <li><a href="#owl-hero" class="page-scroll">Home</a></li>
                            <li><a href="#services" class="page-scroll">Services</a></li>
                            <li><a href="#team" class="page-scroll">About</a></li>
                            <li><a href="#faq" class="page-scroll">F.A.Q</a></li>
                            <li><a href="#contact" class="page-scroll">Contact</a></li>
                        </ul>
                    </div>
                    
                    

                    <div class="social-media ">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/?stype=lo&jlou=AffIiFxsd1RSSp9DgUjFGet5EQrO8h996O6efz5rTixvjvV9kwyrKT6TYvzzbXZcKBsHR31cqTTp01NePjbfPtm1dcJDLeCKyQ1TWU7HgWAMoA&smuh=44889&lh=Ac-0_BMKtYCiwntx"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" id="abc">LogIn</a></li>
                            
                            
                        </ul>
                    </div>

                    
                    
                </div>
            </div>
        </nav>
        <div id="owl-hero" class="owl-carousel owl-theme">
            <div class="item" style="background-image: url(img/sliders/img10.jpg)">
                <div class="caption">
                    
                    <h1>We Are <span>H&K securities</span></h1>
                    <a class="btn btn-transparent page-scroll" href="#services" >LEARN MORE</a><a class="btn btn-light" href="../../login1/form.html">SIGN UP</a>
                </div>
            </div>
            <div class="item" style="background-image: url(img/sliders/img14.jpg)">
                <div class="caption">
                   
                    <h1>We Are <span>H&K securities</span></h1>
                    <a class="btn btn-transparent page-scroll" href="#services" >LEARN MORE</a><a class="btn btn-light" href="../../login1/form.html">SIGN UP</a>
                </div>
            </div>
            <div class="item" style="background-image: url(img/sliders/img13.jpg)">
                <div class="caption">
                                      <h1>We Are <span>H&K securities</span></h1>
                    <a class="btn btn-transparent page-scroll" href="#services" >LEARN MORE</a><a class="btn btn-light" href="../../login1/form.html">SIGN UP</a>
                </div>
            </div>
        </div>
    </section>

   

 <!-- Modal -->


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>

     <form name="frmUser" method="post" enctype="multipart/form-data" action="" onsubmit="return validateLogin()">
<div class="message"><?php if($message!="") { echo $message; } ?>
<p id="error"></p>
<!--  yet to be completed  -->
</div>
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2">Enter Login Details</td>
</tr>
<tr class="tablerow">
<td align="right"><span class="glyphicon glyphicon-user">Username<br></td>
<td><input type="text" name="name"></td>
</tr>


<tr class="tablerow">
<td align="right"><span class="glyphicon glyphicon-eye-open">Password</td>
<td><input type="password" name="password"></td>
</tr>
<tr class="tableheader">
<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
<div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="../../login1/form.html">Sign Up</a></p>
          <p>Forgot <a href="Forgot password/forgotPassword.php">Password?</a></p>
        </div> 
      </div>
    </div>
  </div>

<!-- Log In -modal
    ============================================= -->


  <!-- Trigger the modal with a button -->

  
  <!-- Modal -->
<!--  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <!--<div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>

        <div><?php if($message!="") { echo $message; } ?></div>
        
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="Password" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="form.html">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div> 
    -->


 <!-- Welcome
    ============================================= -->
    <section id="welcome">
        <div class="container">
            <h2>Welcome To <span>H&K</span></h2>
            <hr class="sep">
            <p>Make Yourself At Home Don't Be Shy</p>
            <img class="img-responsive center-block wow fadeInUp" data-wow-delay=".3s" src="img/logo.png" alt="logo">
        </div>
    </section>
 

    <!-- Services
	============================================= -->
    <section id="services">
        <div class="container">
            <h2>What We Do</h2>
            <hr class="light-sep">
            <p>We Can Do Crazy Things</p>
            <div class="services-box">
                <div class="row wow fadeInUp" data-wow-delay=".3s">
                    <div class="col-md-4">
                        <div class="media-left"><span class="icon-lightbulb"></span></div>
                        <div class="media-body">
                            <h3>Analyse data</h3>
                            <p>Helps u to invest.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media-left"><span class="icon-mobile"></span></div>
                        <div class="media-body">
                            <h3>Mobile connectivity</h3>
                            <p>Can access on all devices.</p>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="media-left"><span class="icon-compass"></span></div>
                        <div class="media-body">
                            <h3>Collaborated with NSE</h3>
                            <p>Gives you the exact information.</p>
                        </div>

                    </div>

                    <div class="row wow fadeInUp" data-wow-delay=".6s">
                        <div class="col-md-4">
                            <div class="media-left"><span class="icon-adjustments"></span></div>
                            <div class="media-body">
                                <h3>Less Brokerage</h3>
                                <p>Provides the minimum brokerage.</p>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="media-left"><span class="icon-tools"></span></div>
                            <div class="media-body">
                                <h3>Accurate Prediction</h3>
                                <p>Worlds best prection algorithm is used.</p>
                             </div>

                        </div>
                        <div class="col-md-4">
                            <div class="media-left"><span class="icon-wallet"></span></div>
                            <div class="media-body">
                                <h3>Easy Transaction</h3>
                                <p>Easy transaction process.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio
	============================================= -->
    <!-- <section id="portfolio">
        <div class="container-fluid">
            <h2>Our Work</h2>
            <hr class="sep">
            <p>Showcase Your Amazing Work With Us</p>
            <div class="row">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a class="portfolio-box" href="img/portfolio/1.jpg" data-lightbox="image-1" data-title="Your caption">
                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="1">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a href="img/portfolio/2.jpg" class="portfolio-box" data-lightbox="image-2" data-title="Your caption">
                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="2">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a href="img/portfolio/3.jpg" class="portfolio-box" data-lightbox="image-3" data-title="Your caption">
                        <img src="img/portfolio/3.jpg" class="img-responsive" alt="3">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a href="img/portfolio/4.jpg" class="portfolio-box" data-lightbox="image-4" data-title="Your caption">
                        <img src="img/portfolio/4.jpg" class="img-responsive" alt="4">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a href="img/portfolio/5.jpg" class="portfolio-box" data-lightbox="image-5" data-title="Your caption">
                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="5">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a href="img/portfolio/6.jpg" class="portfolio-box" data-lightbox="image-6" data-title="Your caption">
                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="6">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

-->
    <!-- Work Process
	============================================= -->
    <section id="work-process">
        <div class="container">
            <h2>Work Process</h2>
            <hr class="sep">
            <p>What Happen In The Background</p>
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-lg-3">
                    <span class="icon-chat"></span>
                    <h4>1.Discuss</h4>
                </div>
                <div class="col-lg-3">
                    <span class="icon-circle-compass"></span>
                    <h4>2.Analyse Data</h4>
                </div>
                <div class="col-lg-3">
                    <span class="icon-browser"></span>
                    <h4>3.Predict</h4>
                </div>
                <div class="col-lg-3">
                    <span class="icon-global"></span>
                    <h4>4.Publish</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- Some Fune Facts
	============================================= -->
    <section id="fun-facts">
        <div class="container">
            <h2>Some Fun Facts </h2>
            <hr class="light-sep">
            <p>Fun Facts</p>
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-lg-4">
                    <span class="icon-happy"></span>
                    <h2 class="number timer">9670</h2>
                    <h4>Happy Clients</h4>
                </div>
                <div class="col-lg-4">
                    <span class="icon-trophy"></span>
                    <h2 class="number timer">250</h2>
                    <h4>Global Awards</h4>
                </div>
                <div class="col-lg-4">
                    <span class="icon-documents"></span>
                    <h2 class="number timer">1000</h2>
                    <h4>Transactions per day</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- Some Fune Facts
	============================================= -->
    <section id="team">
        <div class="container">
            <h2>Our Team</h2>
            <hr class="sep">
            <p>Designers Behind This Work</p>
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-md-4">
                    <div class="team">
                        <div id="f1_container">
<div id="f1_card" class="shadow">
  <div class="front face">
    <img class="img-responsive center-block" src="img/team/JasonDoe.jpg"/>
  </div>
  <div class="back face center">
    <h4>Keval Shah</h4>
                        <p style="color:white">CEO & Designer</p>
                         <div class="team-social-icons">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
  </div>
</div>
</div>


                        
                        <div class="team-social-icons">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                <div class="team">
                        <div id="f1_container">
<div id="f1_card" class="shadow">
  <div class="front face">
    <img class="img-responsive center-block" src="img/team/JasonDoe.jpg"/>
  </div>
  <div class="back face center">
    <h4>Sudhir Bagul</h4>
                        <p style="color:white">Mentor</p>
                         <div class="team-social-icons">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
  </div>
</div>
</div>


                        
                        <div class="team-social-icons">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-4">
                 <div class="team">
                        <div id="f1_container">
<div id="f1_card" class="shadow">
  <div class="front face">
    <img class="img-responsive center-block" src="img/team/JasonDoe.jpg"/>
  </div>
  <div class="back face center">
    <h4>Harsh Shah</h4>
                        <p style="color:white">CEO & Techie</p>
                         <div class="team-social-icons">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
  </div>
</div>
</div>


                        
                        <div class="team-social-icons">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- Testimonials
	============================================= -->
    <section id="testimonials">
        <div class="container">
            <h2>Testimonials</h2>
            <hr class="light-sep">
            <p>What Clients Say About Us</p>
            <div id="owl-testi" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="quote">
                        <i class="fa fa-quote-left left fa-2x"></i>
                        <h5>I’am amazed, I should say thank you so much for your awesome website. Service provided is very good, every detail has been taken care. These team are realy amazing and talented! I will 
work only with <span>H&K</span>.<i class="fa fa-quote-right right fa-2x"></i></h5>
<p style="font-size:200%;">- Keval Shah</p>
                    </div>
                </div>
                <div class="item">
                    <div class="quote">
                        <i class="fa fa-quote-left left fa-2x"></i>
                        <h5>The website has updated data and brookerage is also very less.The predictions are 80% accurate most of the time.<span>H&K</span>.<i class="fa fa-quote-right right fa-2x"></i></h5>
<p style="font-size:200%;">- Harsh Shah</p>
                    </div>
                </div>
                <div class="item">
                    <div class="quote">
                        <i class="fa fa-quote-left left fa-2x"></i>
                        <h5>I’am amazed, I should say thank you so much for your awesome template. Design is so 
good and neat, every detail has been taken care these team are realy amazing and talented! I will 
work only with <span>H&K</span>.
 <i class="fa fa-quote-right right fa-2x"></i></h5>
<p style="font-size:200%;">- Tejas Patel</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- F.A.Q
    ============================================ -->

  <section id="faq">
        <div class="container">
            <h2>Frequently Asked Questions</h2>
            <hr class="sep">
            <p>Alittle Q&A to get u started.</p>

<div class="row">
 <div class="panel-group col-sm-12" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Who is eligible to open a trading account with you?</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">Any individual who is major in age can open a trading account with us.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">What is the brokerage being that you charge on trades? Are there any other charges that I need to pay when I trade?</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">TRANSACTION CHARGES: NATURE OF TRANSACTION - RATE OF STT (Charged on Traded Value).

Delivery based transaction in equity - Buyer and seller each to pay 0.125%<br>
<br>
Non-delivery based transaction in equity - Seller to pay 0.025%<br>
<br>
Derivatives (Futures) - Seller to pay 0.017%<br>
<br>
Derivatives (Options) - 0.017% only on sell side if squared off. (On premium)<br>
<br>
0.125% to be paid by purchaser if exercised. (On settlement value).<br>
<br>
Stamp Duty 0.010% for delivery based trades and 0.002% for intra-day trades.<br>
<br>
Stamp Duty - Derivatives (F&O) : 0.002% for Futures on actual price and 0.002% for options on premium.<br>
<br>
Service Tax 10.30% on Brokerage + Transaction Charges ( 10% Service Tax + Education Cess 2% of Service Tax + Higher Education Cess 1% of Service Tax).
<br><br>
Turnover Tax 0.00335% for Cash Segment (0.00325% + 0.0001% Sebi Turnover Fees) and 0.002% for Futures on actual rate (0.0019% + 0.0001% Sebi Turnover Fees) and 0.0501 on premium ( 0.05% + 0.0001% Sebi Turnover Fees).</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">How much margin do I require for trading? </a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Margin requirement would depend upon the scrip margin which is pre decided by our risk & compliance team.</div>
      </div>
    </div>

     <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Do you have any alternate brokerage plans?</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
        Yes, we do have alternate brokerage plans and you may choose the one which suits you the most. These brokerage plans are known as "Prepaid AMC schemes" wherein you can avail the benefit of a reduced brokerage structure as well get a refund of the brokerage paid by you to the extent of advance brokerage during the tenure of your Prepaid AMC plan.
        </div>
      </div>
    </div>

  </div>
  </div> 
 </div>
</section>
    <!-- Contact Us
	============================================= -->
    <section id="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <hr class="sep">
            <p>Get In Touch</p>


  <div class="row">
    <div class="col-sm-6">
      <p>To send us a message, use the contact form or the information below.</p><br>

      <p><b>H&K.pvt Ltd</b></p><br>
        A-301, Jayesh Apartment, Chandavarkar Road, Borivali(West), Mumbai-400092<br>
        
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-earphone" style="font-size:50px;"></span><br>
             +91 7666304533
        </div>
         
        <div>
            <span class="glyphicon glyphicon-envelope pull-center" style="font-size:50px;"></span>

    <br>
    <p> kevalshah2515@gmail.com</p>
      

        </div>
         
    </div>



    <div class="col-sm-6">


      <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="Name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="Email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                    </div>
                    <a href="#" class="btn-block">Send</a>
                </form>
</div>

    </div>


           <!-- <div class="col-md-6 col-md-offset-3 wow fadeInUp" data-wow-delay=".3s">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="Name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="Email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                    </div>
                    <a href="#" class="btn-block">Send</a>
                </form>
            </div>-->
        </div>
    </section>
    <!-- Google Map
	============================================= -->
    <div id="map" style="width:100%;height:500px"></div>


    <!-- Footer
	============================================= -->
    <footer>
        <div class="container">
            <h1>H&K</h1>
            <div class="social">
                <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                <a href="#"><i class="fa fa-dribbble fa-2x"></i></a>
            </div>
            <h6>&copy; 2016 Developed By H&K.</h6>
        </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-assets/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- JS PLUGINS -->
    <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="plugins/countTo/jquery.countTo.js"></script>
    <script src="plugins/inview/jquery.inview.min.js"></script>
    <script src="plugins/Lightbox/dist/js/lightbox.min.js"></script>
    <script src="plugins/WOW/dist/wow.min.js"></script>
    <!-- GOOGLE MAP -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmja0VhlqMxpDPKnUanLEPcU0QDyzA78"></script>






<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});

$(document).ready(function(){
    $("#abc").click(function(){
        $("#myModal").modal();
    });
});
</script>

<script language="JavaScript">
window.onbeforeunload = bunload;
function bunload(){
dontleave="Are you sure you want to leave?";
return dontleave;
}
</script>


</body>

</html>