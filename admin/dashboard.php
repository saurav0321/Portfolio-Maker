<?php  
    include ("connection.php");
    include("security.php");
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="">
    <link rel="icon" href="img/logo.png" type="image/icon type">

    <title>PortfolioBox - Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">

      <!--right slidebar-->
      <link href="css/slidebars.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="dashboard.php" class="logo">Admin<span> Dashboard</span></a>
            <!--logo end-->
        </header>
      <!--header end-->


      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="dashboard.php" class="active">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="register_user.php" >
                          <span>Registered User</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="personal_details.php">
                          <span>Personal Details</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="educational_details.php">
                          <span>Educational Details</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="project_details.php">
                          <span>Project Details</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="experiance_details.php" >
                          <span>Experiance details</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="achievement_details.php" >
                          <span>Achievement Details</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="logout.php" >
                          <span>Logout</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">

                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                            <?php  
                                $query = "select count(reg_id) as total from reg_details";
                                $result = mysqli_query($con,$query);
                                $row = mysqli_fetch_array($result);
                                $count = $row[0];
                            ?>
                              <h1 class="">
                                  <?php echo $count; ?>
                              </h1>
                              <p>Total Users</p>
                          </div>
                      </section>
                  </div>

                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-dot-circle-o"></i>
                          </div>
                          <div class="value">
                                <?php  
                                    $query_status = "select count(login_status) from reg_details where login_status='1'";
                                    $result_status = mysqli_query($con,$query_status);
                                    $row_status = mysqli_fetch_array($result_status);
                                    $count_status = $row_status[0];
                                ?>
                              <h1 class="">
                                <?php echo $count_status; ?>
                              </h1>
                              <p>Active Users</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                             <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                                <?php  
                                    $query_today = "select count(reg_id) from reg_details where DATE(reg_date) = DATE(NOW())";
                                    $result_today = mysqli_query($con,$query_today);
                                    $row_today = mysqli_fetch_array($result_today);
                                    $count_today = $row_today[0];
                                ?>
                              <h1 class="">
                                    <?php echo $count_today; ?>
                              </h1>
                              <p>Joined Today</p>
                          </div>
                      </section>
                  </div>
              </div><!--state overview end-->
          </section>
          
      </section><!--main content end-->


  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>
    <script src="js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/count.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  </body>
</html>
