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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.5/css/autoFill.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.5.3/css/colReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.6.1/css/keyTable.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.3/css/scroller.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchbuilder/1.0.1/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.2.1/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">

  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="register_user.php" class="logo">Admin<span> Dashboard</span></a>
            <!--logo end-->
        </header>
      <!--header end-->


      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                

                  <li class="sub-menu">
                      <a href="register_user.php" class="active">
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
                      <a href="block_users.php" >
                          <span>Block Users</span>
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
                              <i class="fa fa-users"></i>
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
                             <i class="fa fa-calendar"></i>
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

                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                             <i class="fa fa-minus-circle"></i>
                          </div>
                          <div class="value">
                                <?php  
                                    $query_today = "select count(reg_id) from reg_details where block_status=1";
                                    $result_today = mysqli_query($con,$query_today);
                                    $row_today = mysqli_fetch_array($result_today);
                                    $count_today = $row_today[0];
                                ?>
                              <h1 class="">
                                    <?php echo $count_today; ?>
                              </h1>
                              <p>Blocked User</p>
                          </div>
                      </section>
                  </div>
              </div><!--state overview end-->
          </section>
          
      </section><!--main content end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <section class="panel">
                <header class="panel-heading text-danger"><b>Register User List</b></header>
                <div class="panel-body">
                
                <?php if (isset($_SESSION['block'])) {
                 ?>
                  <div class="alert alert-block alert-danger fade in">
                      <button data-dismiss="alert" class="close close-sm" type="button">
                        
                          <i class="fa fa-times"></i>
                      </button>
                     <?php echo $_SESSION['block']; ?>
                    </div>
                    <?php 
                      unset($_SESSION['block']);
                  } ?>

                  <?php if (isset($_SESSION['unblock'])) {
                 ?>
                  <div class="alert alert-block alert-success fade in">
                      <button data-dismiss="alert" class="close close-sm" type="button">
                        
                          <i class="fa fa-times"></i>
                      </button>
                     <?php echo $_SESSION['unblock']; ?>
                    </div>
                    <?php 
                      unset($_SESSION['unblock']);
                  } ?>

                    <table class="table table-bordered" id="redDT">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name of User</th>
                                <th>Email Address</th>
                                <th>Date of Join</th>
                                <th>Login Status</th>
                                <th>Blocked Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                         <?php  
                                $fetch_ed = "select * from reg_details";
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
                                <td><?php echo strtoupper($row['reg_name']); ?></td>
                                <td><?php echo $row['reg_email']; ?></td>
                                <td><?php echo $row['reg_date']; ?></td>
                                <td>
                                    <?php  
                                      if ($row['login_status']==1)
                                      {
                                          echo "Activate";
                                      }
                                      else
                                      {
                                        echo "Offline";
                                      }
                                    ?>
                                </td>
                                <td>
                                  <?php  
                                      if ($row['block_status']==1)
                                      {
                                          echo "Blocked";
                                      }
                                      else
                                      {
                                        echo "Not Blocked";
                                      }
                                    ?>
                                </td>
                                <td>
                                  <?php  
                                    if($row['block_status']==0)
                                    {
                                    ?>
                                  <a href="block_status.php?q=<?php echo base64_encode($row['reg_id']); ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i>&nbsp;Block</a>
                                   <?php }
                                    else{
                                  ?>
                                  <a href="unblock_me.php?q=<?php echo base64_encode($row['reg_id']); ?>" class="btn btn-primary"><i class="fa fa-dot-circle-o"></i>&nbsp;Unblock</a>
                                <?php } ?>
                                </td>
                            </tr>
                       
                        </tbody>
                         <?php $count++;}} ?>
                        <tfoot>
                              <tr>
                                <th>No</th>
                                <th>Name of User</th>
                                <th>Email Address</th>
                                <th>Date of Join</th>
                                <th>Login Status</th>
                                <th>Blocked Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </section>
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

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.5/js/dataTables.autoFill.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.5.3/js/dataTables.colReorder.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/keytable/2.6.1/js/dataTables.keyTable.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.3/js/dataTables.scroller.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/searchbuilder/1.0.1/js/dataTables.searchBuilder.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>


</body>
</html>
