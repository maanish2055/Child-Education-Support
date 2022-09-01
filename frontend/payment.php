<!DOCTYPE html>
<html>


<?php
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');
session_start();
require_once('dbconnection.php');
// if(!isset($_SESSION['email'])){
//    header('location:../logout.php');
// }


include('common/head.php');


$full_nameErr = $childIdErr = $AmountErr = $DateErr = '';
$full_name = $childId = $Amount = $Date = '';


if (isset($_POST['sponsor'])) {
    $full_name = $_POST['full_name'];
    $childId = $_GET['id'];
    $Amount = $_POST['Amount'];
    $Date = date("Y-m-d");

    if (empty($full_name)) {
        $full_nameErr = 'Full name is required';
    }

    if (empty($Amount)) {
        $usernameErr = 'Amount is required';
    }




    if ($full_nameErr == '' && $childIdErr == '' && $AmountErr == '' && $DateErr == '') {
        $mysql = mysqli_query($conn,"insert into sponsoredchild(full_name,childId,Amount,Date) values('$full_name','$childId','$Amount','$Date')") or die(mysqli_error($conn));
    }
    if ($mysql) {
        $_SESSION['action'] = 'success';
        $_SESSION['message'] = 'payment  Successfully!';
        header('location:sponsoredchild.php');
    }
}

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



            <head>


                <style>
                    .container {
                        margin-top: -50px;
                        width: 750px;
                        height: 100%;
                        border: 1px solid;
                        background-color: rgb(0, 0, 0, 0.6);
                        display: flex;
                        flex-direction: column;
                        padding: 30px;
                        justify-content: space-around;
                    }

                    .container h1 {
                        text-align: center;
                        margin-top: 0px;
                        color: white;

                    }

                    h3 {
                        margin-top: 2px;
                        color: white;
                        margin-bottom: 1px;
                    }

                    .first-row {
                        display: flex;
                    }

                    .owner {
                        width: 100%;
                        margin-right: 40px;
                    }

                    .input-field {
                        border: 1px solid #999;
                    }

                    .input-field input {
                        width: 100%;
                        border: none;
                        outline: none;
                        padding: 10px;
                    }

                    .selection {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                    }

                    .selection select {
                        padding: 10px 20px;
                    }

                    button {
                        background-color: blueviolet;
                        color: white;
                        text-align: center;
                        text-transform: uppercase;
                        text-decoration: none;
                        padding: 10px;
                        font-size: 18px;
                        transition: 0.5s;
                        margin-top: 4px;
                        width: 75%;
                        margin-left: 15%;
                    }

                    button:hover {
                        background-color: dodgerblue;
                    }

                    .cards img {
                        width: 100px;
                    }

                    .option select {
                        width: 100%;
                        height: 2rem;
                    }
                </style>
            </head>

            <body>
                <form action="" method="post">
                    <div class="container">
                        <h1>Confirm Your Payment</h1>
                        <div class="second-row">
                            <div class="card-number">
                                <h3>Full name </h3>
                                <div class="input-field">
                                    <input type="text" name="full_name">
                                </div>
                            </div>
                        </div>
                        <div class="payment">
                            <div class="card-number">
                                <h3>Child Name </h3>
                                <?php
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $query = mysqli_query($conn, "select * from child where id='$id'");
                                    $row = mysqli_fetch_array($query);
                                }

                                ?>

                                <div class="input-field">
                                    <input type="text" name="childId" value="<?php echo $row['full_name'] ?>" readonly>

                                </div>
                            </div>
                        </div>
                        <div class="second-row">
                            <div class="card-number">
                                <h3>Bank</h3>
                                <div class="input-field">
                                    <input type="text" value="Nepal Investment Bank" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="second-row">
                            <div class="card-number">
                                <h3> Our Account Detail</h3>
                                <div class="input-field">
                                    <input type="text" value="Account name: Child support" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="second-row">
                            <div class="card-number">

                                <div class="input-field">
                                    <input type="text" value="Account no: 1234567890123456" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="owner">
                            <h3>Amount</h3>
                            <div class="input-field">
                                <input type="number"name="Amount">
                            </div>
                          
                            <button class="payment" type="submit" name="sponsor">Sponsor</button>
                        </div>
                </form>

                <div class="footer">
                    <div class="float-right">

                    </div>
                    <div>
                        <strong>Copyright</strong> to CES &copy; 2020
                    </div>
                </div>

                <?php include('common/script.php') ?>
            </body>



</html>