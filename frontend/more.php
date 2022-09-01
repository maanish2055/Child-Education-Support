
<!DOCTYPE html>  

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="moreinfo.css">
    
</head>

<?php include('common/head.php')



?>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
<?php include('common/sidebar.php')?>        
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
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to sponsor.</span>
                </li>
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

        <div class="wrapper wrapper-content">
        <div class="row">
 

        </div>


        </div>

<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

require_once('dbconnection.php');

?>
<?php
    $result = mysqli_query($conn,"select * from child ");                    
    $row=mysqli_fetch_array($result);
    while($row=mysqli_fetch_array($result))
    {
    ?>
    <div>
    
    <img src="<?php echo($row['image']);?>" alt="photo">
    
    <div class="description">
        <h1 class="heading"><?php echo($row['full_name']);?></h1>
        <h4>Date of birth:<?php echo($row['dob']);?></h4>
        <h4>religion: <?php echo($row['religion']);?></h4>
        <h4>Language: <?php echo($row['language']);?></h4>
        <h4>Address:<?php echo($row['address']);?></h4>
        <h4>height(inch):<?php echo($row['height']);?></h4>
        <h2>Description</h2>
        <p class="detail">
        <?php echo($row['message']);?>
        </p>
        <?php
    }
    ?>  
        <button class="payment" onclick="location.href='payment.php';">Sponsor</button>
        </div> 
      
    </div>
    

<?php include('common/script.php')?>
</body>
</html>