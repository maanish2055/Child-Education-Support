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
     <title> Sponsor a Child</title>
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
             display: inline;
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

             <div class="wrapper wrapper-content">
                 <div class="row">


                 </div>


             </div>
             <div class="footer">
                 <div class="float-right">

                 </div>
                 <div>
                     <strong>Copyright</strong> to CES &copy; 2020
                 </div>
             </div>

             <?php



                error_reporting(E_ALL);
                ini_set('display_errors', '1');

                require_once('dbconnection.php');

                ?>
             <header>

                 <h1 class=heading> Child you Sponsor</heading>
             </header>
             <section>
                 <?php
                    $result = mysqli_query($conn, "select * from child ");
                    // $row = mysqli_fetch_array($result);
                    while ($row = mysqli_fetch_array($result)) {

                    ?>
                     <div class="cont">
                         <!--cards start-->
                         <div class="cards">
                             <div class="image">
                                 <img src="SPC2.jpg">
                             </div>
                             <div class="title">
                                 <h1><?php echo ($row['full_name']); ?></h1>

                             </div>
                             <div class="des">
                                 <h2><?php echo ($row['dob']); ?></h2>
                                 <button onclick="location.href='moreinfo.php';"> more info...</button>

                             </div>
                         </div>

                     <?php
                    }
                        ?>
             </section>
 </body>