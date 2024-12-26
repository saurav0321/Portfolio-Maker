<?php  
  include ("connection.php");
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="">
    <link rel="icon" href="img/logo.png" type="image/icon type">

    <title>PortfolioBox - Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>

  <body class="login-body" style="background-color: #343a40">

    <div class="container">

      <form class="form-signin" action="admin_login.php" method="post">

        <h2 class="form-signin-heading">Admin Login</h2>
         <?php  
              if (isset($_SESSION['err_login'])) {
           ?>   
          <div class="alert alert-danger fade in">
              <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="fa fa-times"></i>
              </button>
              <?php echo $_SESSION['err_login']; ?>
          </div>
          <?php
              unset($_SESSION['err_login']);}
          ?>
          <?php  
              if (isset($_SESSION['security'])) {
           ?>   
          <div class="alert alert-danger fade in">
              <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="fa fa-times"></i>
              </button>
              <?php echo $_SESSION['security']; ?>
          </div>
          <?php
              unset($_SESSION['security']);}
          ?>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="Username" autofocus name="username" required="" value="<?php if(isset($_COOKIE["username_admin"])) { echo $_COOKIE["username_admin"]; } ?>">
            <input type="password" class="form-control" placeholder="Password" name="password" required="">
            <label class="checkbox">
                <input type="checkbox" value="remember-me" name="rememberme">&nbsp;Remember me
                <span class="pull-right">
                    <a href="forgotpasswd.php">Forgot Password</a>
                </span>
            </label>
            <input type="submit" name="submit" class="btn btn-lg btn-login btn-block" value="Login">

        </div>

    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
