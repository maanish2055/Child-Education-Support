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

        div .image {
            padding-left: 200px;
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



            <?php



            error_reporting(E_ALL);
            ini_set('display_errors', '1');

            require_once('dbconnection.php');

            ?>
            <header>

                <h1 class=heading>About You</heading>
            </header>
            <section>
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Profile Detail</h5>
                    </div>
                    <div>
                        <div class="ibox-content profile-content">
                            <?php

                            $id = $_SESSION['id'];

                            $query = mysqli_query($conn, "select * from sponsor where id='$id'");
                            $result = mysqli_fetch_array($query);
                            ?>

                            <img alt="image" class="rounded-circle" width="200px" height="200px" margin-left='400px' src="http://ces.local/frontend/image/<?php echo $result['image'] ?>">







                            <h4><strong><?php echo $result['full_name'] ?></strong></h4>
                            <p><i class="fa fa-user"></i> <strong>Username:</strong> <?php echo $result['username'] ?></p>
                            <p><i class="fa fa-map-marker"></i> <strong>Address:</strong> <?php echo $result['address'] ?></p>
                            <p><i class="fa fa-phone"></i> <strong>Contact:</strong> <?php echo $result['contact'] ?></p>
                            <p><i class="fa fa-envelope"></i> <strong>Email:</strong> <?php echo $result['email'] ?></p>
                            <h5>
                                About me
                            </h5>
                            <p>
                                <?php echo $result['message'] ?>
                            </p>

                            <div class="user-button">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary"> <a href="Edit.php">Edit</a> </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="footer">
    <div class="float-right">

    </div>
    <div>
        <strong>Copyright</strong> to CES &copy; 2020
    </div>
</div> -->

            </section>
</body>

</html>