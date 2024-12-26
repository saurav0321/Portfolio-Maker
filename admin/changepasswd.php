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

    <title>Forgot Password - Admin</title>

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

      <form class="form-signin" action="update_passwd_process.php" method="post">

        <h2 class="form-signin-heading">ChangePassword</h2>
         <?php  
              if (isset($_SESSION['change-passwd'])) {
           ?>   
          <div class="alert alert-danger fade in">
              <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="fa fa-times"></i>
              </button>
              <?php echo $_SESSION['change-passwd']; ?>
          </div>
          <?php
              unset($_SESSION['change-passwd']);}
          ?>

          <?php  
              if (isset($_SESSION['pass-err'])) {
           ?>   
          <div class="alert alert-danger fade in">
              <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="fa fa-times"></i>
              </button>
              <?php echo $_SESSION['pass-err']; ?>
          </div>
          <?php
              unset($_SESSION['pass-err']);}
          ?>

        <div class="login-wrap">
            <form method="post" action="update_passwd_process.php">
                <input type="password" class="form-control" placeholder="New Password" name="newpasswd" required="">
          
                <input type="password" name="cnpasswd" class="form-control" placeholder="Confrim Password" required="">

                <input type="submit" name="submit" class="btn btn-lg btn-login btn-block" value="Submit">
            </form>
            <a href="index.php">Back to login</a>
        </div>

    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
