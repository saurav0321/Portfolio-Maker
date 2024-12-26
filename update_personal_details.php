<?php  
	include("connection.php");
	session_start();

	$id = base64_decode($_GET['q']); 
	$q = "select * from personal_detail where reg_id = '$id'";
	$result = $con->query($q);

	if ($result->num_rows > 0) {
  		while($r = $result->fetch_assoc()) {
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
    	<form method="post" action="update_pd_process.php" enctype="multipart/form-data">
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
		          		
		                <h1 class="pb-4 text-warning">Personal Details</h1>
		
		                    <div class="form-row">
		                        <div class="form-group col-md-6">
		                        <?php 
		                        		$query=mysqli_query($con,"select * from reg_details where reg_id='$id'");
		                        		if(mysqli_num_rows($query)>0)
		                        		{
		                        			while ($row=mysqli_fetch_array($query)) {
		                        ?>
		                        <div class="form-row">
			                        <div class="form-group col-md-10">
			                        	<input type="hidden" name="id" value="<?php echo $id; ?>">
			                          <input id="Full Name" name="name" placeholder="Full Name" class="form-control" type="text" required="" value="<?php echo $row['reg_name']; ?>" disabled>
			                        </div>
			                        <div class="form-group col-md-10">
			                          <input type="email" class="form-control email" id="email" placeholder="Email" name="email" required="" value="<?php echo $row['reg_email'] ?>" disabled>
			                        </div>
		                    	</div>
		                        <?php }} ?>	
		                        </div>
		                    </div>
		                    <center>
		                    	<img src="profile/<?php echo $r['pd_profile']; ?>" style="width: 20%;height: 20%%;" alt="Profile Image" title="Profile"><br><br>
		                    </center>
		                    <div class="form-row">
		                       <input type="text" class="form-control" placeholder="Hobbies (ex: a,b,c)" name="hobbies" required="" value="<?php echo $r['pd_hobby']; ?>">
		                    </div> <br>
		                    
		                    <div class="form-row">
			                        <div class="form-group col-md-6">
			                        	<select class="form-select" aria-label="Gender" name="gender">
										  <option selected>Select your Gender</option>
										  <option <?php if($r['pd_gender']=="Male"){echo "selected";} ?> value="Male">Male</option>
										  <option <?php if($r['pd_gender']=="Female"){echo "selected";} ?> value="Female">Female</option>
										  <option value="Other">Other</option>
										</select>
			                        </div>
			                        <div class="col-md-6 form-group">
			                        	<input type="text" name="mobile" placeholder="Mobile Number" class="form-control" required="" maxlength="10" value="<?php echo $r['pd_contact']; ?>">
									</div>
		                    </div>

		                    <div class="form-row">
			                        <div class="form-group col-md-6">
			                        	<input type="text" name="dob" placeholder="Birthdate (DD/MM/YYYY)" class="form-control" required="" value="<?php echo $r['pd_dob']; ?>">
			                        </div>
			                        <div class="col-md-6 form-group">
			                        	<input type="text" name="skills" placeholder="Skills (eg. a,b,c)" class="form-control" required="" value="<?php echo $r['pd_skill']; ?>">
									</div>
		                    </div>

		                     <div class="form-row">
			                	<textarea class="form-control" id="add" rows="3" placeholder="Recidental Address" name="add"><?php echo $r['pd_add']; ?></textarea> 
		                    </div>
		                    <br>
		                    
		                    <div class="form-row">
			                       <div class="col-md-6 form-group">
			                        	<input type="file" name="profile">
			                        	<input type="hidden" name="profile_img" value="<?php echo $r['pd_profile']; ?>">
									</div>
			                        <div class="col-md-6 form-group">
			                        	<input type="text" name="nationality" placeholder="Nationality" class="form-control" required="" value="<?php echo $r['pd_nation']; ?>">
									</div>
		                    </div>

		                    <div class="form-row">
			                        <div class="form-group col-md-6">
			                        	<input type="text" name="status" placeholder="Married status" class="form-control md-col-6" required="" value="<?php echo $r['pd_status'] ?>">
			                        </div>
			                        <div class="col-md-6 form-group">
			                        	<input type="text" name="lang" placeholder="Languages known (eg. a,b,c)" class="form-control" required="" value="<?php echo $r['pd_lang']; ?>">
									</div>
		                    </div>
		                    <div class="form-row">
			                	<textarea class="form-control" id="add" rows="3" placeholder="Add some intro for yourself" name="pitch"><?php echo $r['pd_pitch']; ?></textarea> 
		                    </div>

		                     <p class="text-info">Please provide some accurate details with us so we can make your portfolio more attractive and reliable with the provided details.</p>
		                    <div class="form-row">
		                        <input type="submit" class="btn btn-danger" name="submit" value="Update">
		                    </div>
		            </div>
	        </div>
   		</form>
    </div>
</section>

</body>
</html>
<?php  
}}
?>