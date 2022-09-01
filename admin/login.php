<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once('dbconnection.php');

$emailErr=$passwordErr='';
if(isset($_POST['submit'])){
    $email=$password='';
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email)){
        $emailErr = 'Email is required';
    }

    if(empty($password)){
        $passwordErr = 'Password is required';
    }

    if($emailErr == '' && $passwordErr == ''){
        $pass = md5($password);
        $query = mysqli_query($conn,"select * from user where email='$email' and password='$pass'");
        $result = mysqli_fetch_array($query);
        $count = mysqli_num_rows($query);
        if($count > 0){
          
            $_SESSION['id'] = $result['id'];
            $_SESSION['email'] = $result['email'];
            header('location:dashboard.php');
        }else{
            $emailErr = 'Invalid Credential';
        }
    }
}

?>




    


<!DOCTYPE html>
<html>

<?php include('common/head.php')?>
<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">CES</h1>

        </div>
        <h3>Welcome to childeducationsupport</h3>
           
        <p>Login in. To see it in action.</p>
        <form method="post" role="form" action="">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" required="" name="email">
                <span class="error"><?php echo $emailErr?></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="" name="password">
                <span class="error"><?php echo $passwordErr?></span>
            </div>
            <button name="submit" type="submit" class="btn btn-primary block full-width m-b">Login</button>

           <a href="forgetpassword.php"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="user/create.php">Create an account</a>
        </form>
     <p class="m-t"> <small>Copyright to CES &copy; 2020</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="../assets/js/jquery-3.1.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>

</body>

</html>