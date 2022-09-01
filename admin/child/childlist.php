<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once('../dbconnection.php');
// if(!isset($_SESSION['email'])){
//    header('location:../logout.php');
// }

?>


<!DOCTYPE html>
<html>
<?php include("../common/head.php") ?>

<body class="fixed-navigation">
    <div class="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <?php include('../common/sidebar.php') ?>
        </nav>


        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
            </div>
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <?php


                        $result = mysqli_query($conn, "select first_name  from user where id=$id");
                        while ($row = mysqli_fetch_array($result)) {
                        ?>

                            <li>
                                <span class="m-r-sm text-muted welcome-message">Welcome <?php echo $row['first_name'] ?> </span>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="profile.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="grid_options.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="../logout.php">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>

            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Child List Table</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['message'])) {
                    ?>

                        <div class="alert alert-<?php echo $_SESSION['action'] ?>">

                            <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);

                            ?>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="ibox-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>fullname</th>
                                    <th>DOB</th>
                                    <th>age</th>
                                    <th>religion</th>
                                    <th>language</th>
                                    <th>contact</th>
                                    <th>address</th>
                                    <th>height</th>
                                    <th>message</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 0;
                                $result = mysqli_query($conn, "select * from child");
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $i = $i + 1 ?></td>
                                        <td><?php echo $row['full_name'] ?></td>
                                        <td><?php echo $row['dob'] ?> </td>
                                        <td><?php echo $row['age'] ?></td>
                                        <td><?php echo $row['religion'] ?></td>
                                        <td><?php echo $row['language'] ?></td>

                                        <td><?php echo $row['contact'] ?></td>
                                        <td><?php echo $row['address'] ?></td>
                                        <td><?php echo $row['height'] ?></td>
                                        <td><?php echo $row['message'] ?></td>

                                        <td>
                                            <?php
                                            ?>
                                            <img src="../images/child/<?php echo $row['image'] ?>" width="100px" height="100px" />
                                        </td>
                                        <td>
                                            <a href="childedit.php?id=<?php echo $row['id'] ?>" class="btn btn-info " type="button"><i class="fa fa-paste"></i> Edit</a>


                                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info " type="button"><i class="fa fa-paste"></i> View</a>

                                            <a onclick="return confirm('Are you sure want to delete?')" href="childdelete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger " type="button"><i class="fa fa-paste"></i> Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="footer">
        <div class="float-right">
            10GB of <strong>250GB</strong> Free.
        </div>
        <div>
            <strong>Copyright</strong> Example Company &copy; 2014-2018
        </div>
    </div>


    </div>
    <?php include('../common/script.php') ?>
</body>

</html>