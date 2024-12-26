<?php  
include("security.php");
include("connection.php");

if (isset($_SESSION['user']))
{
	
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <title>My PortfolioBox</title>

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.css"/>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>

  <link rel="icon" href="img/logo.png" type="image/icon type">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
</head>

<body>
  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
      	<?php  
      		$username = $_SESSION['user'];
      		$fetch_rec = "select * from reg_details where reg_email = '$username'";
      		$result = $con->query($fetch_rec);

      		if (mysqli_num_rows($result) > 0)
      		{
 
  					while($row = mysqli_fetch_assoc($result))
  					{
   						$reg_id=$row["reg_id"];
   						$reg_name = $row['reg_name'];
      	?>
      	<br>
        <h1 class="text-light"><a href="portfolio.php"><i class="fas fa-user-circle"></i> <?php echo $row['reg_name']; ?></a></h1>
      </div>

      <nav class="nav-menu">
        <ul>

          <li><a href="portfolio.php"><i class="far fa-user"></i> <span>Personal Details</span></a></li>
          <li><a href="#education"><i class="fas fa-user-graduate"></i> <span>Educational Details</span></a></li>
          <li><a href="#project"><i class="fas fa-tasks"></i> Project Details</a></li>
          <li><a href="#experiance"><i class="fas fa-briefcase"></i> Work Experiance</a></li>
          <li><a href="#ach"><i class="fas fa-trophy"></i> Achievements</a></li>
          <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
    </div>
  </header><!-- End Header -->


  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="section-title">
          <h2><i class="far fa-user"></i> About <?php echo $row['reg_name'];  ?></h2>
          <h4 class="text-info"><i class="fas fa-envelope"></i> Email Address :- <b><?php echo $row['reg_email']; ?></b></h4>
          <?php }} ?>


          <?php  

			$fetch_pd = "select * from personal_detail where reg_id = '$reg_id'";
			$result = $con->query($fetch_pd);

      		if (mysqli_num_rows($result) > 0)
      		{
 
  					while($row = mysqli_fetch_assoc($result))
  					{
  					
          ?>
          <p class=""><b><?php echo $row['pd_pitch']; ?></b></p>
        </div>
   
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img style="width: 60%;height: 100%;" src="profile/<?php echo $row['pd_profile']; ?>" class="img-fluid img-thumbnail" alt="profile" title="Profile Picture">
            
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
           
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="icofont-rounded-right"></i> <strong><i class="fas fa-birthday-cake"></i> Birthday:&nbsp;</strong><?php echo $row['pd_dob']; ?></li>
                  <li><i class="icofont-rounded-right"></i> <strong><i class="far fa-user"></i> Gender:&nbsp;</strong><?php echo $row['pd_gender']; ?></li>
                  <li><i class="icofont-rounded-right"></i> <strong><i class="fas fa-phone"></i> Phone:&nbsp;</strong><?php echo $row['pd_contact']; ?></li>
                 <li><i class="icofont-rounded-right"></i> <strong><i class="fas fa-volleyball-ball"></i> Hobbies:&nbsp;</strong><?php echo $row['pd_hobby']; ?></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="icofont-rounded-right"></i> <strong><i class="far fa-user"></i> Marital Status:&nbsp;</strong><?php echo $row['pd_status']; ?></li>
                  <li><i class="icofont-rounded-right"></i> <strong><i class="far fa-user"></i> Nationality:&nbsp;</strong><?php echo $row['pd_nation']; ?></li>
                  <li><i class="icofont-rounded-right"></i> <strong><i class="fas fa-envelope"></i> Address:&nbsp;</strong><?php echo $row['pd_add']; ?></li>
                  <li><i class="icofont-rounded-right"></i> <strong><i class="fas fa-laptop"></i> Skills:&nbsp;</strong><?php echo $row['pd_skill']; ?></li>
                </ul>
              </div>
              <div>
              	<a href="update_personal_details.php?q=<?php echo base64_encode($row['reg_id']); ?>" class="btn btn-danger"><i class="fas fa-user-edit"></i>&nbsp;Edit Details</a>
              </div>
            </div>
             <?php }} ?>
          
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

  
    <!-- ======= education Section ======= -->
    <section id="education" class="resume">
      <div class="container">

	        <div class="section-title">
	          <h2><i class="fas fa-user-graduate"></i> Educational Details</h2>
	        </div>

	       <table class="table table-hover table-bordered">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Qualification</th>
				      <th scope="col">Passing Year</th>
				      <th scope="col">Board/University</th>
				      <th scope="col">Grades</th>
				      <th>Actions</th>
				    </tr>
				  </thead>

				  <tbody>
				  	<?php  
				  		$fetch_ed = "select * from education_detail where reg_id = '$reg_id' order by edu_qua desc";
						$result = $con->query($fetch_ed);
						$count=1;
			      		if (mysqli_num_rows($result) > 0)
			      		{
			  					while($row = mysqli_fetch_assoc($result))
			  					{
				  	?>
				    <tr>
				    	<td><?php echo $count; ?></td>
				    	<td><?php echo $row['edu_qua'];?></td>
				    	<td><?php echo $row['edu_year']; ?></td>
				    	<td><?php echo $row['edu_uni']; ?></td>
				    	<td><?php echo $row['edu_grade']; ?></td>
				    	<td><a href="update_edu_details.php?q=<?php echo base64_encode($row['edu_id']); ?>" class="btn btn-danger"><i class="fas fa-user-edit"></i>&nbsp;Edit</a></td>
				    </tr>
				    <?php $count++;}} ?>
				  </tbody>
				  
				  <tfoot>
				  	<tr>
				      <th scope="col">No</th>
				      <th scope="col">Qualification</th>
				      <th scope="col">Passing Year</th>
				      <th scope="col">Board/University</th>
				      <th scope="col">Grades</th>
				      <th>Actions</th>
				    </tr>
				  </tfoot>
			</table>
      </div>
    </section><!-- End education Section -->

    <!-- ======= project Section ======= -->
    <section id="project" class="portfolio">
      <div class="container">

        	<div class="section-title">
          		<h2><i class="fas fa-tasks"></i> Project Details</h2>
        	</div>
        	<table class="table table-hover table-bordered">
				  <thead>
				    <tr>
				      <th>No</th>
				      <th>Project Title</th>
				      <th>Project Duration</th>
				      <th>Project Description</th>
				      <th>Actions</th>
				    </tr>
				  </thead>
				  <?php  
				  		$fetch_ed = "select * from project_detail where reg_id = '$reg_id'";
						$result = $con->query($fetch_ed);
						$count=1;
			      		if (mysqli_num_rows($result) > 0)
			      		{
			  					while($row = mysqli_fetch_assoc($result))
			  					{
				  	?>
				  <tbody>
				    <tr>
				      <td><?php echo $count; ?></td>
				      <td><?php echo $row['p_title']; ?></td>
				      <td><?php echo $row['p_dur']; ?></td>
				      <td><?php echo $row['p_desc']; ?></td>
				      <td><a href="update_pro_details.php?q=<?php echo base64_encode($row['p_id']); ?>" class="btn btn-danger"><i class="fas fa-user-edit"></i>&nbsp;Edit</a></td>
				    </tr>
				    <?php $count++;}} ?>
				  </tbody>
				  
				  <tfoot>
				  	 <tr>
				      <th>No</th>
				      <th>Project Title</th>
				      <th>Project Duration</th>
				      <th>Project Description</th>
				      <th>Actions</th>
				    </tr>
				  </tfoot>
			</table>
        </div>
    </section><!-- End project Section -->

 
    <!-- ======= experiance Section ======= -->
    <section id="experiance" class="contact">
      <div class="container">
        <div class="section-title">
          <h2><i class="fas fa-briefcase"></i> Work Experiance</h2>
        </div>
 			          	<table class="table table-hover table-bordered">
				  <thead>
				    <tr>
				      <th>No</th>
				      <th>Work Title</th>
				      <th>Company Name</th>
				      <th>Duration of work</th>
				      <th>Work Description</th>
				      <th>Achievements</th>
				      <th>Actions</th>
				    </tr>
				  </thead>
				  <?php  
				  		$fetch_ed = "select * from work_experiance_detail where reg_id = '$reg_id'";
						$result = $con->query($fetch_ed);
						$count=1;
			      		if (mysqli_num_rows($result) > 0)
			      		{
			  					while($row = mysqli_fetch_assoc($result))
			  					{
				  	?>
				  <tbody>
				    <tr>
				      <td><?php echo $count; ?></td>
				      <td><?php echo $row['we_title']; ?></td>
				      <td><?php echo $row['we_comp']; ?></td>
				      <td><?php echo $row['we_dur']; ?></td>
				      <td><?php echo $row['we_desc']; ?></td>
				      <td><?php echo $row['we_ach']; ?></td>
				      <td><a href="update_ex_detail.php?q=<?php echo base64_encode($row['we_id']); ?>" class="btn btn-danger"><i class="fas fa-user-edit"></i>&nbsp;Edit</a></td>
				    </tr>
				    <?php $count++;}} ?>
				  </tbody>
				  
				  <tfoot>
				  	 <tr>
				      <th>No</th>
				      <th>Work Title</th>
				      <th>Company Name</th>
				      <th>Duration of work</th>
				      <th>Work Description</th>
				      <th>Achievements</th>
				      <th>Actions</th>
				    </tr>
				  </tfoot>
			</table>   
      </div>
    </section><!-- End experiance Section -->


    <!-- ======= achivement Section ======= -->
    <section id="ach" class="contact">
      <div class="container">
        <div class="section-title">
          <h2><i class="fas fa-trophy"></i> Achievements</h2>
        </div>
 			          	<table class="table table-hover table-bordered">
				  <thead>
				    <tr>
				      <th>No</th>
				      <th>Name of achievement</th>
				      <th>Rank</th>
				      <th>Year</th>
				      <th>Certificate</th>
				      <th>Actions</th>
				    </tr>
				  </thead>
				  <?php  
				  		$fetch_ed = "select * from achievement_details where reg_id = '$reg_id'";
						$result = $con->query($fetch_ed);
						$count=1;
			      		if (mysqli_num_rows($result) > 0)
			      		{
			  					while($row = mysqli_fetch_assoc($result))
			  					{
				  	?>
				  <tbody>
				    <tr>
				      <td><?php echo $count; ?></td>
				      <td><?php echo $row['ach_name']; ?></td>
				      <td><?php echo $row['ach_rank']; ?></td>
				      <td><?php echo $row['ach_year']; ?></td>
				      <td><img src="certificates/<?php echo $row['ach_certy']; ?>" style="width: 50%;" title="Certificate" alt="Certificate"></td>
				      <td><a href="update_ach_details.php?q=<?php echo base64_encode($row['ach_id']); ?>" class="btn btn-danger"><i class="fas fa-user-edit"></i>&nbsp;Edit</a></td>
				    </tr>
				    <?php $count++;}} ?>
				  </tbody>
				  
				  <tfoot>
				  	 <tr>
				      <th>No</th>
				      <th>Name of achievement</th>
				      <th>Rank</th>
				      <th>Year</th>
				      <th>Certificate</th>
				      <th>Actions</th>
				    </tr>
				  </tfoot>
			</table>   
      </div>
    </section><!-- End achievement Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>PortfolioBox</span></strong>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  
  <script src="js/main.js"></script>
 
 </script>
 <script src="https://kit.fontawesome.com/27f80803e6.js" crossorigin="anonymous"></script>
 
</body>
</html>
<?php } ?>