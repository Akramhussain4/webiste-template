<?PHP
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/contact-form/php-contact-form-tutorial.html
*/
require_once("./include/fgcontactform.php");
require_once("./include/captcha-creator.php");

$formproc = new FGContactForm();
$captcha = new FGCaptchaCreator('scaptcha');

$formproc->EnableCaptcha($captcha);

//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('Youremail@example.com'); //<<---Put your email address here


//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('n91LqHNvMrpoXte');


if(isset($_POST['submitted']))
{
   if($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("thankyou.php");
   }
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Welcome To Medicure Pulse Diagnostic Centre</title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<script src="js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
   		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
   		 <!-- webfonts -->
   		 <link href='http://fonts.googleapis.com/css?family=Arimo:400,700' rel='stylesheet' type='text/css'>
		 <!-- contactstyles --> 
         <link href="contact.css" rel="stylesheet">
   		  <!-- webfonts -->
		  <style>
		  
		  
		  
.row{
background-color:#00CED1;
}
@media screen and (max-width: 768px) {
		#menu {
			width:1.4em;
			display: block;
			background:#ddd;
			font-size:1.35em;
			text-align: center;
		}
		#nav.js {
			display: none;
		}
		ul {
			width:100%;
		}
		li {
			width:100%;
			border-right:none;
		}
	}
	@media screen and (min-width: 768px) {
		#menu {
			display: none;
		}
	}
</style>
	</head>
	<body>
	
			<!-- container -->
			<!-- header -->
			<div class="header">
			
				<div class="container">
				<div id="social-media-icons">
					<a href="http://www.facebook.com" TARGET="_NEW">
					<img src="images/facebookround.png"/>
					</a>
					<a href="http://www.twitter.com" TARGET="_NEW">
					<img src="images/twitterround.png"/>
					</a>
					
					</div>
					<!-- logo -->
					
					<div class="logo"> 
						<a href="http://www.medicurepulse.com"><img class="img-responsive" src="images/IMG-a1.png" title="medicalpluse" /></a>
	
				</div>
					
				<!--<div id="social-media-icons">
					<a href="http://www.facebook.com" TARGET="_NEW">
					<img src="images/facebookround.png"/>
					</a>
					<a href="http://www.twitter.com" TARGET="_NEW">
					<img src="images/twitterround.png"/>
					</a>
					
					</div>
					<!-- logo -->
					
					
					<!-- top-nav ---->
					
									<div class="top-nav">

						<span class="menu">  </span>
						
						
						<ul id="nav">
								
							<li class="active"><a href="http://www.medicurepulse.com">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<span class="caret"></span></a>
							<ul class="dropdown-menu">
							<li><a href="services.html">PATHOLOGICAL</a></li>
							<li><a href="histopathology.html"> HISTOPATHOLOGICAL</a></li>
							<li><a href="ecg&x-ray.html"> ECG & X-RAY</a></li>
							<li><a href="ultrasound.html"> ULTRASOUND SCAN </a></li>
							
							
						</ul>
						</li>
						
							<li><a href="homeservice.html">Home Service</a></li>
							<li><a href="contact.php">Contact</a></li>
							
                    </ul>
					</div>

                 <!--css-->
            	 
	<script type="text/javascript">
	$("#nav").addClass("js").before('<div id="menu">&#9776;</div>');
	$("#menu").click(function(){
		$("#nav").toggle();
	});
	$(window).resize(function(){
		if(window.innerWidth > 768) {
			$("#nav").removeAttr("style");
		}
	});
</script>


					
					
				<!---top-nav -->
					<!-- script-for-nav -->
					<script>
						$(document).ready(function(){
							$("span.menu").click(function(){
								$(".top-nav ul").slideToggle(300);
							});
						});
					</script>
					<!-- script-for-nav -->
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- /header -->
		
		<!-- /container -->
		
		<!-- Contact -->
		<div class="container">
		<div class="row">
		<div class="col-sm-4">
		   <form id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
             <br/>
               <input type='hidden' name='submitted' id='submitted' value='1'/>
               <input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
                <input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />
               <div class='short_explanation'>* required fields</div>
	           <div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
               
               <div class="form-group">
       
	    <label for='name' >Your Full Name*: </label><br/>
    	<input type='text' name='name' class='form-control' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" />
    	<span id='contactus_name_errorloc' class='error'></span>
      </div>
      <div class="form-group">
        <label for='email' >Email Address*:</label><br/>
    	<input type='text' name='email' class='form-control' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" />
   		<span id='contactus_email_errorloc' class='error'></span>
		</div>
	<div class="form-group">
		<label for='email' >Subject*:</label><br/>
    	<input type='text' name='subject' class='form-control' id='subject' value='<?php echo $formproc->SafeDisplay('subject') ?>' maxlength="50" />
    	<span id='contactus_subject_errorloc' class='error'></span>
		
      </div>
	  <div class="form-group">
        <label for='message' >Message:</label><br/>
		<span id='contactus_message_errorloc' class='error'></span>
		<textarea rows="3" cols="50" name='message' class='form-control' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
      </div>
      <div class="form-group">
        <div class="cptImg"><img alt='Captcha image' src='show-captcha.php?rand=1' id='scaptcha_img' /></div>
		<div class='short_explanation lftFlt'><!--Can't read the image?-->
		<a href='javascript: refresh_captcha_img();'><img src="images/refresh.png" alt="Refresh" width="28" height="auto"/></a>.</div>
		<div class="cptInput">
		<label for='scaptcha' >Enter the code above here:</label>
		<input type='text' name='scaptcha' id='scaptcha' maxlength="10" />
		<span id='contactus_scaptcha_errorloc' class='error'></span>
		</div>
		
      </div>
      <div class="form-group"> 
       <input type='submit' name='Submit' class="btn btn-success" value='Submit' />
	  </div> 
               
<!--<br>
			<p style="color:white;"> Name <br>
			<input type="text" name="name" id="" /></p>
<p style="color:white;"> Email <br/>
<input type="text" name="email"  id=""/></p>
<p style="color:white;"> Subject<br/>
<input type="text" name="subject" id=""/></p>
<p style="color:black;"> comments<br/>
<textarea name="comments" id="" cols="30" rows="10"></textarea></p>
<p> <input type="submit" value="submit" name="submit"/></p>-->

</form>			

		</div> 
		<div class="col-sm-4" style="color:white;">
		<h3><b>CONTACT US:</b></h3>
		<p><b><i>Medicure pulse diagnostic Center</i></b></p>
      <p>12-2-54/A,Beside Vilada Maternity Nursing Home</p>
	  <p> Opp:Shifa Medical Hall, Muradnagar</p>
	  <p>Mehdipatnam, Hyderabad-500028.</P>
	  <p>Phone No's:-</P>
	  <p><u><b>98666076381</b></u></P>
	  <p><u><b>9989565546</b></u></p>
	  <p><u><b>7396131612</b></u></p>
	  <p><i><b> Email Us:-</b></i>medicurepulse@gmail.com</p>
	  
    </div>
	
	<div class="col-sm-4"><br>
	
	<p>

<a href="http://pulse.labspark.in" TARGET="_NEW">
<img class="img-responsive" src="images/button1.png">
</a>
</p>
	<br><br>
	
	<img class="img-responsive" src="images/homeservice4.jpg">
	
	</div>
		<br>
		<!----
		<div class="contact">
				<div class="container">
					<div class="contact-head text-left">
			
								
						
					<!----- contact-grids---->
						<!----
						<div class="contact-map">
						<center><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1578265.0941403757!2d-98.9828708842255!3d39.41170802696131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1407515822047"> </iframe></center>
						</div>

			<!----		
			<form action="" method="post">
<p> Name <br>
<input type="text" name="name" id="" /></p>
<p> Email <br/>
<input type="text" name="email"  id=""/></p>
<p> Subject<br/>
<input type="text" name="subject" id=""/></p>
<p> comments<br/>
<textarea name="comments" id="" cols="30" rows="10"></textarea></p>
<p> <input type="submit" value="send email" name="submit"/></p>

</form>			
	
	---->									
						
						
						<!----- 
						<div class="contact-form">
							<form>
								<div class="contact-form-row">
									<div>
										<span>Name :</span>
										<input type="text" class="text" value="Your Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email here';}">
									</div>
									<div>
										<span>Email :</span>
										<input type="text" class="text" value="Your Email here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email here';}">
									</div>
									<div>
										<span>Subject :</span>
										<input type="text" class="text" value="Subject	" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email here';}">
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
								<div class="contact-form-row2">
									<span>Message :</span>
									<textarea> </textarea>
								</div>
								<input type="submit" value="send">
							</form>
						</div>
						  ------>
						 
					</div>
					
					<div class="contact-grids"> <br>
				<center>	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7614.959901539994!2d78.4403395728661!3d17.38873985231118!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb970626b4269d%3A0x1f855c8be571c7ae!2sMurad+Nagar%2C+Hyderabad%2C+Telangana+500264!5e0!3m2!1sen!2sin!4v1474390372052" width="700" height="300" frameborder="0" style="border:0" allowfullscreen></iframe><br><br>
						</center>
					
					<!----- contact-grids ----->
				</div>
			</div>
			<div class="bottom-grids">
					<div class="col-md-4"  style="background-color:#D6EAF8">
					
					<h6><p>&#8728 Home</p></h6>
					<h6><p>&#8728 About Us</p></h6>
					<h6><p>&#8728 services</p></h6>
					<h6><p>&#8728 Contact us</p></h6>
					
					</div>
					<div class="col-md-4"  style="background-color:#D6EAF8">
					<h6><p>Pathological Test</p></h6>
					<h6><p>Digital X-RAY & ECG</p></h6>
					<h6><p> Histopathology</p></h6>
					<h6><p> Ultrasound</p></h6>
					</div>
					<div class="col-md-4"  style="background-color:#D6EAF8">
					
					<h5><b><p>OUR TIMINGS:</p><b></h5>
					<h6><p>Working Days:-</p></h6>
					<h6><P> MONDAY - SUNDAY <p></h6>
					<h6><p> 7AM - 11PM </p></h6>
					</div>
					<div class="clearfix"> </div>

		<!-- /Contact -->
		
			
		<!-- team-grids-caption -->
		
		<!--------
							<center><a class="more-btn" href="http://www.medicurepulse.com">Back</a></center>    
							--------->
		<!-- team-grids-caption -->
		<!-- footer -->
		<div class="footer">
			<div class="container">
			<center><h5><p> Copyright &copy; 2016. All Rights Reserved.</p></h5></center>
				<center><h5><p>Website Design and Developed by <a href="http://www.gatetoweb.com/" TARGET="_NEW">gatetoweb.com</a></p></h5></center>
			</div>
		
		</div>
		<!-- /footer -->
   
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
	<script type="text/javascript" src="../js/easing.js"></script>
   <!-- Contact Form JavaScript -->
   <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      <script type='text/javascript' src='scripts/fg_captcha_validator.js'></script>
	<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");
	
	frmvalidator.addValidation("subject","req","Please provide your subject");

    frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");


    frmvalidator.addValidation("scaptcha","req","Please enter the code in the image above");

    document.forms['contactus'].scaptcha.validator
      = new FG_CaptchaValidator(document.forms['contactus'].scaptcha,
                    document.images['scaptcha_img']);

    function SCaptcha_Validate()
    {
        return document.forms['contactus'].scaptcha.validator.validate();
    }

    frmvalidator.setAddnlValidationFunction("SCaptcha_Validate");

    function refresh_captcha_img()
    {
        var img = document.images['scaptcha_img'];
        img.src = img.src.substring(0,img.src.lastIndexOf("?")) + "?rand="+Math.random()*1000;
    }

// ]]>
</script>                
                        
	</body>
</html>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
