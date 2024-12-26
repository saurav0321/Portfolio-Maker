<?php 
	session_start();
	include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>PortFolioBox - Welcome to the site</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/logo.png" type="image/icon type">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body style="background-color: #343a40;color: white">

<section class="testimonial py-5" id="testimonial">
    <div class="container">
    	<form method="post" action="register.php">
	        <div class="row ">
		            <div class="col-md-4 py-5 bg-primary text-white text-center ">
		                <div class=" ">
		                    <div class="card-body">
		                        <img src="img/logo.png" style="width:30%" title="PortFolioBox">
		                        <h2 class="py-3 text-warning">Login Details</h2>
		                        <p class="text-white">Welcome to the PortFolioBox. This is the registration page for creating your own portfolio for the better experiance.</p>
		                    </div>
		                </div>
		            </div>
		            <div class="col-md-8 py-5 border">
		            	<?php  
		            		if (isset($_SESSION['email_err']))
		            		{
		            			
		            	?>
		            	<div class="alert alert-danger" role="alert">
  							<?php echo $_SESSION['email_err']; ?>
						</div>
						<?php 
							unset($_SESSION['email_err']);
						}
						?>
		                <h1 class="pb-4 text-warning">Basic Login Details</h1>
		
		                    <div class="form-row">
		                        <div class="form-group col-md-6">
		                          <input id="Full Name" name="name" placeholder="Full Name" class="form-control" type="text" required="">
		                        </div>
		                        <div class="form-group col-md-6">
		                          <input type="email" class="form-control email" id="email" placeholder="Email" name="email" required="">
		                        </div>
		                    </div>

		                    <div class="form-row">
		                       <input type="password" class="form-control" id="inputpasswdl4" placeholder="Password" name="passwd" required="">
		                    </div> <br>

		                    <div class="form-row">
		                        <div class="form-group">
		                            <div class="form-group">
		                                <div class="form-check">
		                                  	<input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
		                                  	<label class="form-check-label" for="invalidCheck2">
		                                    	<small>By clicking Submit, you agree to <a class="text-warning" data-bs-toggle="modal" data-bs-target="#termsmodal" style="cursor: pointer;"><b>Our Terms &amp; Conditions.</b></a></small>
		                                  	</label>
		                                </div>
		                            </div>
		                    	</div>
		                    </div>
		                    <p class="text-info">Please provide some accurate details with us so we can make your portfolio more attractive and reliable with the provided details.</p>

		                    <div class="form-row">
		                        <input type="submit" class="btn btn-danger" name="submit" value="Next">
		                    </div>
		            </div>
	        </div>
   		</form>


<!-- Modal -->
<div class="modal fade" id="termsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="staticBackdropLabel">Terms &amp; Conditions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body text-muted" style="text-align: justify;">
     
      	<ol>
      		<li>Who controls your information?</li>
      		<p>Information provided to or gathered by us is controlled by: The system admin (you may contact them as: portfoliobox1@gmail.com</p>

      		<li>What information do we collect?</li>
      		<p>We collect Personal Information that you voluntarily provide to us such as email address, contact details, birthdate, educational details, project details, experiance details etc.</p>
      	</ol>
      	<b><u>Prohibited Conduct</u></b>
      	<p>This site imposes certain restrictions on your use of the Services. You agree to abstain from, but not limited to, the following prohibited conduct:</p>
      	<ul style="list-style: number">
      		<li>Provide any false, misleading, or inaccurate information, create more than one Account, transfer your Account, create an Account for anyone other than yourself, or create an Account without authorization.</li>
      		<li>Upload, post, transmit, display, perform, or distribute any content, information, or materials that is libelous, defamatory, abusive, threatening, excessively violent, harassing, obscene, lewd, lascivious, filthy. <b>Your account will be blocked and further actions to be taken.</b></li>
      		<li>Disclose, harvest, or otherwise collect information about users, for example email addresses and phone numbers.</li>
      		<li>Use or attempt to use any engine, software, tool, agent, or other device or mechanism (including without limitation browsers, spiders, robots, avatars, or intelligent agents) to harvest or otherwise collect information from the Service for any use, including without limitation use on Third Party Websites.</li>
      		<li>Access content or data not intended for you, or log into a server or account that you are not authorized to access.</li>
      		<li>Interfere or attempt to interfere with the use of the Service by any other user, host, or network, including (without limitation) by submitting malware or exploiting software vulnerabilities.</li>
      		<li>Modify or change the placement and location of any advertisement posted through the Site.</li>
      	</ul>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </div>
</section>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>