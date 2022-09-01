<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once('dbconnection.php');
// if(!isset($_SESSION['email'])){
//    header('location:../logout.php');
// }
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scales=1.0">
    <title> About You</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        section {
            font-family: 'Times New Roman', Times, serif;
            background: #374957;

        }

        .cont {
            margin-right: 20px;
            color: red;
        }

        .heading {
            color: #f44336;
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;

        }

        .cards {
            opacity: 1.0;
            display: inline-block;
            width: 20%;
            height: 22rem;
            background-color: white;
            border-radius: 15px;
            box-shadow: 2px 2px 10px black;
            margin: 40px;


        }


        .image img {
            width: 100%;
            height: 200px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .title {
            text-align: center;

            size: 20%;

        }

        .des {
            text-align: center;

        }

        button {
            border-radius: 5px;
            margin-top: 20px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #f44336;
            color: white;
            transition: .5s;
        }

        a.button {
            -webkit-appearance: button;
            -moz-appearance: button;
            appearance: button;

            text-decoration: none;
            color: initial;
        }
    </style>


    <?php include('common/head.php')

    ?>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <?php include('common/sidebar.php') ?>
        </nav>

        <div id="page-wrapper" class="gray-bg">
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


                        $result = mysqli_query($conn, "select full_name from sponsor where id=$id");
                        while ($row = mysqli_fetch_array($result)) {
                        ?>

                            <li>
                                <span class="m-r-sm text-muted welcome-message">Welcome <?php echo $row['full_name'] ?> </span>
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
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>


                        <li>
                            <a href="logout.php">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>

            <div class="wrapper wrapper-content">
                <div class="row">


                </div>


            </div>
            <!-- <div class="footer">
                <div class="float-right">

                </div>
                <div>
                    <strong>Copyright</strong> to CES &copy; 2020
                </div>
            </div> -->

            <?php



            error_reporting(E_ALL);
            ini_set('display_errors', '1');

            require_once('dbconnection.php');

            ?>
            <header>

                <h1 class=heading> Child you Sponsor</heading>
            </header>
            <section>
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Profile Detail</h5>
                    </div>
                    <div>
                        <?php

                        $id = $_SESSION['id'];

                        $query = mysqli_query($conn, "select * from sponsor where id='$id'");
                        $result = mysqli_fetch_array($query);
                        ?>


                        <img alt="image" class="rounded-circle" width="100px" height="100px" margin-left='300px' src="http://ces.local/frontend/image/<?php echo $result['image'] ?>">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><?php echo $result['full_name'] ?> </span>

                        </a>
                        <div class="ibox-content profile-content">
                            <h4><strong>Monica Smith</strong></h4>
                            <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>
                            <h5>
                                About me
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
                            </p>
                            <div class="row m-t-lg">
                                <div class="col-md-4">
                                    <span class="bar" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32">
                                        <rect fill="#1ab394" x="0" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect>
                                        <rect fill="#d7d7d7" x="3.3" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect>
                                        <rect fill="#1ab394" x="6.6" y="0" width="2.3" height="16"></rect>
                                        <rect fill="#d7d7d7" x="9.899999999999999" y="5.333333333333334" width="2.3" height="10.666666666666666"></rect>
                                        <rect fill="#1ab394" x="13.2" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect>
                                        <rect fill="#d7d7d7" x="16.5" y="0" width="2.3" height="16"></rect>
                                        <rect fill="#1ab394" x="19.799999999999997" y="3.555555555555557" width="2.3" height="12.444444444444443"></rect>
                                        <rect fill="#d7d7d7" x="23.099999999999998" y="10.666666666666668" width="2.3" height="5.333333333333333"></rect>
                                        <rect fill="#1ab394" x="26.4" y="7.111111111111111" width="2.3" height="8.88888888888889"></rect>
                                        <rect fill="#d7d7d7" x="29.7" y="12.444444444444445" width="2.3" height="3.5555555555555554"></rect>
                                    </svg>
                                    <h5><strong>169</strong> Posts</h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="line" style="display: none;">5,3,9,6,5,9,7,3,5,2</span><svg class="peity" height="16" width="32">
                                        <polygon fill="#1ab394" points="0 15 0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666 32 15"></polygon>
                                        <polyline fill="transparent" points="0 7.166666666666666 3.5555555555555554 10.5 7.111111111111111 0.5 10.666666666666666 5.5 14.222222222222221 7.166666666666666 17.77777777777778 0.5 21.333333333333332 3.833333333333332 24.888888888888886 10.5 28.444444444444443 7.166666666666666 32 12.166666666666666" stroke="#169c81" stroke-width="1" stroke-linecap="square"></polyline>
                                    </svg>
                                    <h5><strong>28</strong> Following</h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="bar" style="display: none;">5,3,2,-1,-3,-2,2,3,5,2</span><svg class="peity" height="16" width="32">
                                        <rect fill="#1ab394" x="0" y="0" width="2.3" height="10"></rect>
                                        <rect fill="#d7d7d7" x="3.3" y="4" width="2.3" height="6"></rect>
                                        <rect fill="#1ab394" x="6.6" y="6" width="2.3" height="4"></rect>
                                        <rect fill="#d7d7d7" x="9.899999999999999" y="10" width="2.3" height="2"></rect>
                                        <rect fill="#1ab394" x="13.2" y="10" width="2.3" height="6"></rect>
                                        <rect fill="#d7d7d7" x="16.5" y="10" width="2.3" height="4"></rect>
                                        <rect fill="#1ab394" x="19.799999999999997" y="6" width="2.3" height="4"></rect>
                                        <rect fill="#d7d7d7" x="23.099999999999998" y="4" width="2.3" height="6"></rect>
                                        <rect fill="#1ab394" x="26.4" y="0" width="2.3" height="10"></rect>
                                        <rect fill="#d7d7d7" x="29.7" y="6" width="2.3" height="4"></rect>
                                    </svg>
                                    <h5><strong>240</strong> Followers</h5>
                                </div>
                            </div>
                            <div class="user-button">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
</body>