<?php 
	include("connection.php");
	session_start();
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

</head>
<body style="background-color: #343a40;color: white">

<section class="testimonial py-5" id="testimonial">
    <div class="container">
    	<form method="post" action="add_personal_details.php" enctype="multipart/form-data">
	        <div class="row ">
		            <div class="col-md-4 py-5 bg-primary text-white text-center ">
		                <div class=" ">
		                    <div class="card-body">
		                        <img src="img/logo.png" style="width:30%" title="PortFolioBox">
		                        <h2 class="py-3 text-warning">Personal Details</h2>
		                        <p class="text-white">Welcome to the PortFolioBox. This is the registration page for creating your own portfolio for the better experiance.</p>
		                    </div>
		                </div>
		            </div>
		            <div class="col-md-8 py-5 border">
		          		<?php  
		            		if (isset($_SESSION['pd_fail']))
		            		{
		            			
		            	?>
		            	<div class="alert alert-danger" role="alert">
  							<?php echo $_SESSION['pd_fail']; ?>
						</div>
						<?php 
							unset($_SESSION['pd_fail']);
						}
						?>
		                <h1 class="pb-4 text-warning">Personal Details</h1>
		
		                    <div class="form-row">
		                        <div class="form-group col-md-6">
		                        <?php 
		                        	if (isset($_SESSION['temp_user'])) {
		                        	
		                        		$uname = $_SESSION['temp_user'];
		                        		$query=mysqli_query($con,"select * from reg_details where reg_email='$uname'");
		                        		if(mysqli_num_rows($query)>0)
		                        		{
		                        			while ($row=mysqli_fetch_array($query)) {
		                        ?>
		                        <div class="form-row">
			                        <div class="form-group col-md-10">
			                        
			                          <input id="Full Name" name="name" placeholder="Full Name" class="form-control" type="text" required="" value="<?php echo $row['reg_name']; ?>" disabled>
			                        </div>
			                        <div class="form-group col-md-10">
			                          <input type="email" class="form-control email" id="email" placeholder="Email" name="email" required="" value="<?php echo $row['reg_email'] ?>" disabled>
			                        </div>
		                    	</div>
		                        <?php }}} ?>	
		                        </div>
		                    </div>
		                    
		                    <div class="form-row">
		                       <input type="text" class="form-control" id="" placeholder="Hobbies (ex: a,b,c)" name="hobbies" required="">
		                    </div> <br>
		                    
		                    <div class="form-row">
			                        <div class="form-group col-md-6">
			                        	<select class="form-select" aria-label="Gender" name="gender">
										  <option selected>Select your Gender</option>
										  <option value="Male">Male</option>
										  <option value="Female">Female</option>
										  <option value="Other">Other</option>
										</select>
			                        </div>
			                        <div class="col-md-6 form-group">
			                        	<input type="text" name="mobile" placeholder="Mobile Number" class="form-control" required="" maxlength="10">
									</div>
		                    </div>

		                    <div class="form-row">
			                        <div class="form-group col-md-6">
			                        	<input type="text" name="dob" placeholder="Birthdate (DD/MM/YYYY)" class="form-control" required="">
			                        </div>
			                        <div class="col-md-6 form-group">
			                        	<input type="text" name="skills" placeholder="Skills (eg. a,b,c)" class="form-control" required="">
									</div>
		                    </div>

		                     <div class="form-row">
			                	<textarea class="form-control" id="add" rows="3" placeholder="Recidental Address" name="add"></textarea> 
		                    </div>
		                    <br>
		                    
		                    <div class="form-row">
			                        <div class="form-group col-md-6">
			                        	<label for="profile">Profile Photo</label>
			                        	<input type="file" class="form-control--file" id="profile" name="profile">
			                        </div>
			                        <div class="col-md-6 form-group">
			                        	<input type="text" name="nationality" placeholder="Nationality" class="form-control" required="">
									</div>
		                    </div>

		                    <div class="form-row">
			                        <div class="form-group col-md-6">
			                        	<input type="text" name="status" placeholder="Married status" class="form-control md-col-6">
			                        </div>
			                        <div class="col-md-6 form-group">
			                        	<input type="text" name="lang" placeholder="Languages known (eg. a,b,c)" class="form-control" required="">
									</div>
		                    </div>
		                    <div class="form-row">
			                	<textarea class="form-control" id="add" rows="3" placeholder="Add some intro for yourself" name="pitch"></textarea> 
		                    </div>

		                     <p class="text-info">Please provide some accurate details with us so we can make your portfolio more attractive and reliable with the provided details.</p>
		                    <div class="form-row">
		                        <input type="submit" class="btn btn-danger" name="submit" value="Next ->">
		                    </div>
		            </div>
	        </div>
   		</form>
    </div>
</section>

</body>
</html>