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
                      <a href="register_user.php">
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
                      <a href="block_users.php" class="active">
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
            <section class="panel">
                <header class="panel-heading text-danger"><b>List Of Blocked Users</b></header>
                <div class="panel-body">
                    <table class="table table-bordered" id="pdDT">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Email Address</th>
                              <th>Join Date</th>
                              <th>Block Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                              $q1 = "select * from reg_details where block_status=1";
                              $result = $con->query($q1);
                              $count=1;
                              if ($result->num_rows > 0) {

                                while($row = $result->fetch_assoc()) {
                            ?>
                          
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo strtoupper($row['reg_name']); ?></td>
                                <td><?php echo $row['reg_email']; ?></td>
                                <td><?php echo $row['reg_date']; ?></td>
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
                            </tr>
                          <?php $count++; }} ?>
                        </tbody>
                      
                        <tfoot>
                            <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Email Address</th>
                              <th>Join Date</th>
                              <th>Block Status</th>
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

  <script type="text/javascript">
      $(document).ready(function() {
          $('#pdDT').DataTable( {
            dom: 'Bfrtip',
            buttons: [
              'csv', 'pdf', 'print'
            ]
          });
      });
  </script>

</body>
</html>
