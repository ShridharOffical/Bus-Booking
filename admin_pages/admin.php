<?php
require '../db_scripts/login.php';
session_start();

//* Custom function to find a character in a stream_set_blocking
function isPresent($str, $ch)
{
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] == $ch) {
            return true;
        }
    }

    return false;
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: ../admin_login.php");
    exit;
}

// ^Total Seats code below

$tables = mysqli_query($conn, "SHOW TABLES");

$total_seats = 0; //^ will store all the booked seats from the database
$total_earnings = 0; //^ will store the total earnings

while ($table = mysqli_fetch_object($tables)) {
    $table_name = $table->{"Tables_in_learn"};

    $results = mysqli_query($conn, "SELECT * FROM `$table_name` WHERE IsTaken=1");

    $total_seats += mysqli_num_rows($results);

    if (isPresent($table_name, 'b')) {
        $temp = mysqli_num_rows($results) * 750;
        $total_earnings += $temp;
        // echo $table_name ." ". mysqli_num_rows($results)." ";
    } elseif (isPresent($table_name, 'd')) {
        $temp = mysqli_num_rows($results) * 2200;
        $total_earnings += $temp;
        // echo $table_name . " " .mysqli_num_rows($results)." ";

    } else {
        $temp = mysqli_num_rows($results) * 450;
        $total_earnings += $temp;
        // echo $table_name . " " .mysqli_num_rows($results)." ";

    }
}

//^End of total seats and Earnings code


require '../db_scripts/view_count.php';
// require '../db_scripts/earnings.php';



// $outcome;

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>BusX Admin Panel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png"> -->
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="../img/logo.png" width="20px" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <em style="color:black; font-size:2.1rem; ">BusX</em>
                        </span>
                    </a>

                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/arijit.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium">Admin</span></a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin.php"
                                aria-expanded="false">
                                <i class="far fa-server" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic_table.php"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Search Name</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="changepassword.php"
                                aria-expanded="false">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <span class="hide-menu">Change Password</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../db_scripts/AutorunStatusExpiredScript.php" aria-expanded="false">
        <i class="bi bi-ticket-detailed"></i>
        <span class="hide-menu" style="color: red;">Make Ticket Expire </span>
    </a>
</li>

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="../admin_login.php" //& Add another script as bridge to start and stop the sessions
                                class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Seats Booked</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success">
                                        <?php echo $total_seats; ?>
                                    </span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Page Views</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple">
                                        <?php echo $total_views; ?>
                                    </span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Earnings Rs</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info">
                                        <?php echo $total_earnings; ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">

                            <form action="" method="get">
                                <div class="d-md-flex mb-3">
                                    <h3 class="box-title mb-0">Check Tables</h3>
                                    <input class="col-md-3 col-sm-4 col-xs-6 ms-auto" type="date" id="start" name="day"
                                        value="">
                                    <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                        <select name="route" id="locations"
                                            class="form-select shadow-none row border-top">
                                            <option value="ktom">Kolhapur->Mumbai</option>
                                            <option value="mtok">Mumbai->kolhapur</option>
                                            <option value="ktod">Kolhapur->Delhi</option>
                                            <option value="dtok">Delhi->Kolhapur</option>
                                            <option value="ktob">Kolhapur->Bangalore</option>
                                            <option value="btok">Bangalore->Kolhapur</option>
                                        </select>
                                    </div>
                                    <button type="submit" id="selectedDat"
                                        class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Search</button>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Age</th>
                                            <th class="border-top-0">Gender</th>
                                            <th class="border-top-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="an">
                                        <?php

                                        try {
                                            require "../db_scripts/login.php";

                                            $k = $_GET['route'] . $_GET['day'];
                                            $root=$_GET['route'];

                                            $table_name = str_replace('-', '', $k);
                                           
                                            
                                            // Execute the SQL query and fetch the result  
                                            if ($sql = $conn->query("SELECT * from $table_name WHERE Age>0")) {

                                                while ($rows = mysqli_fetch_array($sql)) {
                                                    ?>

                                                    <tr>
                                                        <td>
                                                            <?php echo $rows['Name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rows['Email']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rows['Age']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rows['Gender']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rows['Status']; ?>
                                                        </td>
                                                    </tr>
                                                    
                                                    <?php

                                                }
                                                $hn = "localhost";
                                                $un = "root";
                                                $pw = "";
                                                $db = "learn";
                                                // Connect to the database
                                                $conn = mysqli_connect($hn, $un, $pw, $db);
                                                // Execute the SQL query to count the number of times the value of 1 appears in the column of your choice
                                                $sql = "SELECT COUNT(*) as count FROM $table_name WHERE IsTaken = 1";
                                                $result = mysqli_query($conn, $sql);
        
                                                // Fetch the result
                                                $row = mysqli_fetch_assoc($result);
                                                $count = $row['count'];
                                                
                                                // Output the count
                                                $root_name = substr($table_name, 0, 4);
                                                $year = substr($table_name, 4, 4);
                                                $month = substr($table_name, 8, 2);
                                                $day = substr($table_name, 10, 2);
                                                $formatted_date = $year . "-" . $month . "-" . $day;
                                                
                                                

                                                echo " ||  Date : " . $formatted_date . " || <br>";
                                                
                                                
                                                if (substr($table_name, 0, 4) === "ktom") {
                                                    echo " || Root : Kolhapur To Mumbai  || <br>";
                                                } elseif (substr($table_name, 0, 4) === "mtok") {
                                                    echo "Root : Mumbai To Kolhapur  || <br>";
                                                } elseif (substr($table_name, 0, 4) === "ktod") {
                                                    echo " || Root : Kolhapur To Delhi  || <br>";
                                                } elseif (substr($table_name, 0, 4) === "dtok") {
                                                    echo " || Root : Delhi To Kolhapur  || <br>";
                                                } elseif (substr($table_name, 0, 4) === "ktob") {
                                                    echo " || Root : Kolhapur To Bengaluru  || <br>";
                                                } elseif (substr($table_name, 0, 4) === "btok") {
                                                    echo " || Root : Bengaluru To Kolhapur  || <br>";
                                                } 
                                               
                                                echo "      || Total Seats Booked : " , $count - 1," || <br>";
        
                                                // Close the database connection
                                                mysqli_close($conn);


                                            }


                                        }

                                        //catch exception
                                        catch (Exception $e) {
                                            echo "<h5 style=color:red>!! On This Date , Data is Not avaible Please chnage Date.</h5>";
                                        }




                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer text-center"> 2022 © BusX</footer>
            </div>

        </div>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script>
        <script src="queries.js"></script>
        <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/app-style-switcher.js"></script>
        <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!--Wave Effects -->
        <script src="js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="js/custom.js"></script>
        <!--This page JavaScript -->
        <!--chartis chart-->
        <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
        <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
        <script src="js/pages/dashboards/dashboard1.js"></script>
        <script>
            document.getElementById('start').valueAsDate = new Date();
        </script>
</body>


</html>