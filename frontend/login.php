<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once 'dbconnection.php';

$usernameErr = $passwordErr = '';

if (isset($_POST['submit'])) {
	$username = $password = '';
	$username= $_POST['username'];
	// $username = $_POST['email'];
	$password = $_POST['password'];

	if (empty($username)) {
		$usernameErr = 'Email or username  is required';
	}

	// if (empty($username)) {
	// 	$usernameErr = 'Email or username  is required';
	// }
	if (empty($password)) {
		$passwordErr = 'Password is required';
	}

	if ($usernameErr == '' && $passwordErr == '') {
		$pass = md5($password);
		$query = mysqli_query($conn, "SELECT * from sponsor where (email='$username' or username='$username') and password='$pass'");
		$result = mysqli_fetch_array($query);
		$count = mysqli_num_rows($query);
		if ($count > 0) {
			$_SESSION['id'] = $result['id'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['username'] = $result['email'];
			header('location:dashboard.php');
		} else {
			$emailErr = 'invalid email and password';
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>login</title>
	<style>
		body {
			font-family: sans-serif;
			background-image: url(image/back.jpg);
			background-repeat: no-repeat;
			overflow: hidden;
			background-size: cover;
		}

		.container {
			width: 340px;
			margin: 4% auto;
			border-radius: 25px;
			background-color: rgba(0, 0, 0, 0.1);
			box-shadow: 0 0 17px #333;
		}

		.header {
			text-align: center;
			padding-top: 50px;
		}




		.header h1 {
			color: #333;
			font-size: 45px;
			margin-bottom: 20px;
		}

		.main {
			text-align: center;
		}

		.main input,
		button {
			width: 300px;
			height: 40px;
			border: none;
			outline: none;
			padding-left: 40px;
			box-sizing: border-box;
			font-size: 15px;
			color: #333;
			margin-bottom: 40px;
			
			border-radius: 15px;
		}

		.main button {
			padding-left: 0;
			background-color: #83acf1;
			letter-spacing: 1px;
			font-weight: bold;
			border-radius: 15px;
		}

		button a {
			color: white;
		}



		.main button:hover {
			box-shadow: 2px 2px 5px #555;
			background-color: #7799d4;
		}

		.main input:hover {
			box-shadow: 2px 2px 5px #555;
			background-color: #ddd;
		}

		.main span {
			position: relative;
		}

		.main i {
			position: absolute;
			left: 15px;
			color: #333;
			font-size: 16px;
			top: 2px;
		}

		.forget {
			color: darkorange;

		}

		.error {
			padding-left: 75px;
			font-size: 15px;
			color: red;
			margin-bottom: 20px;
			

		}

		.home {

			padding: 20px;
			color: darkorange;

		}
	</style>

</head>

<body>
	<div class="container">
		<div class="header">
			<h1>login</h1>
		</div>
		<div class="main">
			<form action="" method="POST" name="user-registration" enctype="multipart/form-data">
				<span>
					
					<?php
					if (isset($emailErr) && $emailErr != '') {
						echo $emailErr;
					}


					?>
					<input type="text"  placeholder="email or username " name="username"> 
				</span><br>

				<span>
					<i class="fa fa-lock"></i>
					<?php
					if (isset($passwordErr) && $passwordErr != '') {
						echo $passwordErr;
					}

					?>
					<input type="password" placeholder="password" name="password" class="password">
				</span><br>
				<button type="submit" name="submit">login</button><br>
				<a href="forgetpassword.php" class="forget">Forget Password?</a><br>
				<button><a href="form.php">Create New Account</a></button>
				<a href="index.php" class="home">Go to Home </a><br>


			</form>
		</div>
	</div>
	<?php $path = "http://" . $_SERVER['HTTP_HOST']; ?>
	<script src="<?php echo $path ?>/admin/assets/js/jquery-3.1.1.min.js"></script>
	 <script src="<?php echo $path ?>/admin/assets/js/plugins/validate/jquery.validate.min.js"></script> 
 
<script>
  
$(function() {
 
  $("form[name='user-registration']").validate({
  
    rules: {
     
    
      email: {
        required: true,
       
      },
      password: {
        required: true,
        minlength: 5
      }
    },
   
    messages: {
      
    
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },

    },
   
    submitHandler: function(form) {
      form.submit(); 
    }
  });
});

</script> 


</body>

</html>