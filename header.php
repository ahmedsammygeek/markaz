
<?php 

session_start();

if (!isset($_SESSION['logged_in']) || empty($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
   header('location: login.php?msg=np');
   die;
}


 ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Start Bootstrap - SB Admin Version 2.0 Demo</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top noprint" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">مركز شرطة بلقاس</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="editadmin.php"><i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['username'];   ?></a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> تسجيل الخروج</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

        </nav>
        <!-- /.navbar-static-top -->

        <nav class="navbar-default navbar-static-side noprint" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> الصفحة الرئيسية</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> بيانات المتهمين<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Mothms.php">جميع المتهمين</a>
                            </li>
                            <?php 
                            if($_SESSION['can_add'] == 1) {
                                echo '<li>
                                <a href="addMothm.php">اضافة جديد</a>
                            </li>';
                            }
                             ?>
                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <?php   

                    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                        echo '<li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> مستخدمى النظام<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="members.php">جميع المستخدمين</a>
                            </li>
                            <li>
                                <a href="add_member.php">اضافة مستخدم جديد</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>';
                    }
                        
                     ?>

                    

      
             
                    <li>
                        <a href="logout.php"><i class="fa fa-files-o fa-fw"></i> تسجيل الخروج<span class="fa arrow"></span></a>
                        
                    </li>
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->