<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{ ?>


<!doctype html>

 <html class="no-js" lang="">
<head>
    
    <title>DPMS - Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    body {
  font-family: 'Lato', sans-serif;
  font-size: 16px;
  font-weight: normal;
  line-height: 1.5;
  color: #fefefe;
  position: relative;
  overflow-x: hidden;
    }

.container {
  width: 1280px;
  max-width: 97%;
  margin: 0 auto;
}

.hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 20px;
  background-image: url("hero-background.jpg");
  background-size: cover;
  background-position: center;
}

.hero h1 {
  font-size: 4rem;
  color: #fff;
  margin-bottom: 2rem;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.hero p {
  font-size: 1.5rem;
  color: #fff;
  margin-bottom: 3rem;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.hero a {
  display: inline-block;
  background-color: #ffd173;
  color: #242424;
  padding: 1rem 2rem;
  border-radius: 2rem;
  text-decoration: none;
  transition: all 0.3s ease-in-out;
}

.hero a:hover {
  background-color: #e3ff7c;
}

.card {
  border-radius: 0.5rem;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  margin-bottom: 2rem;
}

.card-header {
  background-color: #ffd173;
  color: #242424;
  border-bottom: none;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}

.card-body {
  padding: 2rem;
}

.table {
  background-color: #fff;
  border-radius: 0.5rem;
  overflow: hidden;
}

.table th {
  font-weight: bold;
  text-align: left;
  border-bottom: 2px solid #f2f2f2;
  padding: 1rem;
  vertical-align: top;
}

.table td {
  padding: 1rem;
  vertical-align: top;
  border-bottom: 1px solid #f2f2f2;
}

.table tbody tr:nth-of-type(even) {
  background-color: #f5f5f5;
}

.table tbody tr:hover {
  background-color: #f9f9f9;
}

.pagination {
  display: flex;
  justify-content: center;
  margin-top: 2rem;
}

.pagination li {
  margin: 0 5px;
}

.pagination a {
  padding: 0.5rem 1rem;
  background-color: #ffd173;
  color: #242424;
  border-radius: 0.5rem;
  text-decoration: none;
  transition: all 0.3s ease-in-out;
}

.pagination a:hover {
  background-color: #e3ff7c;
}

.pagination .active a {
  background-color: #242424;
  color: #fff;
}
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body style="background-color:#240852;">
    
   <?php include_once('includes/sidebar.php');?>

        <?php include_once('includes/header.php');?>
      
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                <?php
//todays Vehicle Entries
 $query=mysqli_query($con,"select ID from tblvehicle where date(InTime)=CURDATE();");
$count_today_vehentries=mysqli_num_rows($query);
 ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-car" style="font-size:45px"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $count_today_vehentries;?></span></div>
                                            <div class="stat-heading">Todays Total Vehicle Entries</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
    <?php
    // Total Current bicycle Entries
    $query_current_Bicycle = mysqli_query($con, "SELECT ID FROM tblvehicle WHERE 
    VehicleCategory = 'Bicycle' AND Status = 'IN' AND date(InTime) = CURDATE()");
    $count_current_Bicycle_entries = mysqli_num_rows($query_current_Bicycle);
    ?>
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-6">
                    <i class="fa fa-bicycle" style="font-size:45px"></i>
                </div>
                <div class="stat-content">
                    <div class="text-left dib">
                        <div class="stat-text"><span class="count"><?php echo $count_current_Bicycle_entries
                         ?></span></div>
                        <div class="stat-heading">Today bicycle IN Entries</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    <div class="col-lg-3 col-md-6">
    <?php
    // Total Current Two Wheeler Entries
    $query_current_twowheeler = mysqli_query($con, "SELECT ID FROM tblvehicle WHERE VehicleCategory = 'Two Wheeler Vehicle' AND Status = 'In' AND date(InTime) = CURDATE()");
    $count_current_twowheeler_entries = mysqli_num_rows($query_current_twowheeler);
    ?>
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-6">
                    <i class="fa fa-motorcycle" style="font-size:45px"></i> <!-- Assuming a bicycle icon for Two Wheeler -->
                </div>
                <div class="stat-content">
                    <div class="text-left dib">
                        <div class="stat-text"><span class="count"><?php echo $count_current_twowheeler_entries ?></span></div>
                        <div class="stat-heading">Today Two Wheeler IN Entries</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <?php
    // Total Current Four Wheeler Entries
    $query_current_fourwheeler = mysqli_query
    ($con, "SELECT ID FROM tblvehicle WHERE VehicleCategory = 'Four Wheeler Vehicle' 
    AND Status = 'In' AND date(InTime) = CURDATE()");
    $count_current_fourwheeler_entries = mysqli_num_rows($query_current_fourwheeler);
    ?>
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-6">
                    <i class="pe-7s-car" style="font-size:45px"></i>
                </div>
                <div class="stat-content">
                    <div class="text-left dib">
                        <div class="stat-text"><span class="count"><?php echo $count_current_fourwheeler_entries ?></span></div>
                        <div class="stat-heading">Today Four Wheeler IN Entries</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <?php
    // Total Today Two Wheeler Entries Updated as 'Out'
    $query_today_twowheeler_out = mysqli_query($con, "SELECT ID FROM tblvehicle WHERE 
    VehicleCategory = 'Two Wheeler Vehicle' AND date(OutTime) = CURDATE()");
    $count_today_twowheeler_out_entries = mysqli_num_rows($query_today_twowheeler_out);
    ?>
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-5">
                    <i class="fa fa-motorcycle" style="font-size:45px"></i> <!-- Assuming a bicycle icon for Two Wheeler -->
                </div>
                <div class="stat-content">
                    <div class="text-left dib">
                        <div class="stat-text"><span class="count"><?php echo $count_today_twowheeler_out_entries ?></span></div>
                        <div class="stat-heading">Today's Two Wheeler Out Entries</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <?php
    // Total Today Four Wheeler Entries Updated as 'Out'
    $query_today_fourwheeler_out = mysqli_query($con, "SELECT ID FROM tblvehicle WHERE VehicleCategory = 'Four Wheeler Vehicle' AND date(OutTime) = CURDATE()");
    $count_today_fourwheeler_out_entries = mysqli_num_rows($query_today_fourwheeler_out);
    ?>
    <div class="card">
        <div class="card-body">

            <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-5">
                    <i class="pe-7s-car" style="font-size:45px"></i>
                </div>
                <div class="stat-content">
                    <div class="text-left dib">
                        <div class="stat-text"><span class="count"><?php echo $count_today_fourwheeler_out_entries ?></span></div>
                        <div class="stat-heading">Today's Four Wheeler Out Entries</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-3 col-md-6">
    <?php
    // Total Today bicycle Entries Updated as 'Out'
    $query_today_Bicycle_out = mysqli_query($con, "SELECT ID FROM tblvehicle WHERE VehicleCategory = 'Bicycle' AND date(OutTime) = CURDATE()");
    $count_today_Bicycle_out_entries = mysqli_num_rows($query_today_Bicycle_out);
    ?>
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-5">
                    <i class="fa fa-bicycle" style="font-size:45px"></i>
                </div>
                <div class="stat-content">
                    <div class="text-left dib">
                        <div class="stat-text"><span class="count"><?php echo $count_today_Bicycle_out_entries ?></span></div>
                        <div class="stat-heading">Today's bicycle Out Entries</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>





                </div>
                <!-- /Widgets -->
               
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->


    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    
</body>
</html>
<?php } ?>