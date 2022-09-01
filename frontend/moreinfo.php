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

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .back {
            background-color: #374957;
            height: 100%;

        }

        .row img {
            border-radius: 50%;
            width: 20em;
            height: 20em;
            margin-top: 100px;
            margin-left: 100px;
            margin-right: 100px;
            margin-bottom: 100px;
            float: left;
        }

        description {
            padding-top: 5rem;
            padding-left: 2rem;
        }

        .heading {
            text-align: center;
            margin-top: 100px;
            color: yellow;


        }

        .detail {
            text-align: center;
            padding-right: 4rem;
            font-size: 1.35rem;
            color: yellowgreen;
        }

        .sub-part {
            color: yellowgreen;
        }

        button {
            background-color: #3BAF9F;

            margin: 20px 0px 0px 20px;
            text-align: center;
            border-radius: 12px;
            border: 2px solid #366473;
            padding: 14px 110px;
            outline: none;
            color: white;
            cursor: pointer;
            transition: 0.25px;


        }

        button:hover {
            background-color: #5390F5;
        }

        button {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            transition-duration: 0.4s;
        }

        */
    </style>

</head>

<?php include('common/head.php')
?>

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

                            <ul class="dropdown-menu dropdown-messages">


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
            <?php

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = mysqli_query($conn, "select * from child where id='$id'");
                $row = mysqli_fetch_array($query);
            }

            ?>

            <div class="back">
                <div>
                    <div class="row1">

                        <div class="row">
                            <img src="../admin/images/child/<?php echo ($row['image']); ?>" alt="photo">

                            <div class="description">
                                <h1 class="heading"><?php echo ($row['full_name']); ?></h1>
                                <h4 class="sub-part">Date of birth:<?php echo ($row['dob']); ?></h4>
                                <h4 class="sub-part">religion: <?php echo ($row['religion']); ?></h4>
                                <h4 class="sub-part">Language: <?php echo ($row['language']); ?></h4>
                                <h4 class="sub-part">Address:<?php echo ($row['address']); ?></h4>
                                <h4 class="sub-part">height(inch):<?php echo ($row['height']); ?></h4>
                                <h2 class="sub-part">Description</h2>
                                <p class="detail">
                                    <?php echo ($row['message']); ?>
                                </p>
                                
                                <button class="payment" onclick="location.href='payment.php?id=<?php echo $row['id'] ?>';">Sponsor</button>
                            </div>


                        </div>

                    </div>

                    <div class="footer">
                        <div class="float-right">

                        </div>
                        <div>
                            <strong>Copyright</strong> to CES &copy; 2020
                        </div>
                    </div>


</body>

</html>