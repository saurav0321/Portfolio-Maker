<?php 
	include("connection.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PortfolioBox - Welcome to the site.</title>
	
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="icon" href="img/logo.png" type="image/icon type">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>	
<body class="align" style="background-color: #343a40;">
	<div class="grid">
  		
  		<div class="img-cls">
  			<img src="img/logo.png" class="img-logo" style="width: 70%;height: auto;margin-left: 25%" alt="PortfolioBox Logo" title="PortfolioBox">	
  		</div>
    
    	<form action="login.php" method="post" class="form login">
    		<h1 class="text-info" style="margin-left: 5%"><i class="fas fa-sign-in-alt"></i> Sigin Me!</h1>
     		
     		<?php 
     			if (isset($_SESSION['err_login'])) {
     		 ?>
     		<div class="alert alert-danger alert-dismissible fade show" role="alert">
  				<?php echo $_SESSION['err_login']; ?>
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  				</button>
			</div>
			<?php  
				unset($_SESSION['err_login']);
			}
			?>
      <?php 
          if (isset($_SESSION['security'])) {
         ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $_SESSION['security']; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <?php  
        unset($_SESSION['security']);
      }
      ?>
      <?php 
          if (isset($_SESSION['block'])) {
         ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $_SESSION['block']; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <?php  
        unset($_SESSION['block']);
      }
      ?>

      		<div class="form__field">
        		<label for="login__username"><svg class="icon">
            		<use xlink:href="#icon-user"></use>
          		</svg><span class="hidden">Username</span></label>
        		<input autocomplete="username" id="login__username" type="text" name="username" class="form__input" placeholder="Email Address" required="" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
      		</div>

      		<div class="form__field">
        		<label for="login__password"><svg class="icon">
            		<use xlink:href="#icon-lock"></use>
          		</svg><span class="hidden">Password</span></label>
        		<input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required="">
      		</div>
          <div class="form__field">
              <input type="checkbox" name="rememberme" id="remember"<?php if(isset($_COOKIE["username"])) { echo "checked"; } ?> >&nbsp;Remember Me
          </div>
      		<div class="form__field">
        		<input type="submit" value="Sign In" name="submit">
      		</div>
		</form>
    	<br>
    	<p class="text--center" style="color:white">Not a member? <a href="registration.php" class="text-info">Sign up</a>
    		<svg class="icon">
        		<use xlink:href="#icon-arrow-right"></use>
      		</svg>
      	</p>
      	<p class="text--center" style="color:white">Forgot Password? <a href="forgotpasswd.php" class="text-info">Click Here</a>
    		<svg class="icon">
        		<use xlink:href="#icon-arrow-right"></use>
      		</svg> <br><br>
          
      	</p>

	</div>

  <svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
      <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
      <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1792 1792">
      <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
    </symbol>
  </svg>

</body>
</body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/27f80803e6.js" crossorigin="anonymous"></script>
</html>