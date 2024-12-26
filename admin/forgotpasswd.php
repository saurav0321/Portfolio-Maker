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

      <form class="form-signin" action="forgot_password_process.php" method="post">

        <h2 class="form-signin-heading">Forgot Password</h2>
         <?php  
              if (isset($_SESSION['err'])) {
           ?>   
          <div class="alert alert-danger fade in">
              <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="fa fa-times"></i>
              </button>
              <?php echo $_SESSION['err']; ?>
          </div>
          <?php
              unset($_SESSION['err']);}
          ?>

          <?php  
              if (isset($_SESSION['err_otp'])) {
           ?>   
          <div class="alert alert-danger fade in">
              <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="fa fa-times"></i>
              </button>
              <?php echo $_SESSION['err_otp']; ?>
          </div>
          <?php
              unset($_SESSION['err_otp']);}
          ?>
        <div class="login-wrap">
            <form method="post" action="forgot_password_process.php">
                <input type="text" class="form-control" placeholder="Username" name="username" required="">
                <?php  
                    $captcha = rand(100000,999999);
                    $_SESSION['captcha'] = $captcha;
                ?>

                <div class="alert alert-success" role="alert">
                    <?php echo "Your captcha code: "."<b>".$captcha."</b>"; ?>
                </div>
                <input type="text" name="otp" maxlength="6" class="form-control" placeholder="Security Code" required="">

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
