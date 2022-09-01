<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('dbconnection.php');


$full_nameErr = $usernameErr = $passwordErr = $cpasswordErr = $addressErr = $contactErr = $emailErr = $messageErr = $imageErr = '';
$full_name = $username = $password = $cpassword = $address = $contact = $email = $message = $image = '';

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
$uploadImage = false;

    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $message = $_POST['message'];



    if (empty($full_name)) {
        $full_nameErr = 'Full name is required';
    }

    if (empty($username)) {
        $usernameErr = 'Username is required';
    }
    if (empty($password)) {
        $passwordErr = 'Password is required';
    } else if ($password != $cpassword) {
        $passwordErr = 'Password dont match';
    }


    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $uploadImage = true;
        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_tmp_name = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];

        if (!in_array($file_type, ['image/jpeg', 'image/jpg', 'image/png'])) {
            $imageErr = 'Only jpeg, png and jpg image is required';
        }
    }

    if (empty($address)) {
        $addressErr = 'Address is required';
    }
    if (empty($contact)) {
        $contactErr = 'Contact is required';
    }
    if (empty($email)) {
        $emailErr = 'Email is required';
    }

    if (empty($message)) {
        $messageErr = 'Message is required';
    }

    if ($full_nameErr == '' && $usernameErr == '' && $passwordErr == '' && $cpasswordErr == '' && $imageErr == '' && $addressErr == '' && $contactErr == '' && $emailErr == '' && $messageErr == '') {
        $password = md5($password);


        if ($uploadImage) {

            $fileName = time() . '-' . $file_name;

            $target = 'image/' . $fileName;
            die($target);
            move_uploaded_file($file_tmp_name, $target);
            $mysql = mysqli_query($conn, "insert into sponsor(full_name,username,password,address,contact,email,message,image) values('$full_name','$username','$password','$address','$contact','$email', '$message','$fileName')") or die(mysqli_error($conn));
        } else {
            $mysql = mysqli_query($conn, "insert into sponsor(full_name,username,password,address,contact,email, message) values('$full_name','$username','$password','$address','$contact','$email', '$message')");
        }

        if ($mysql) {
            $_SESSION['action'] = 'success';
            $_SESSION['message'] = 'Users Created Successfully!';
            header('location:login.php');
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="form.css"> -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {

            background-image: url(image/abc.jpg);
            background-repeat: no-repeat;
            margin-top: 10px;
            background-position: center;
            background-size: cover;
            font-family: sans-serif;
        }

        .header {
            /* min-height: 100vh; */
            width: 100%;
            /* background-image: url(image/back.jpg); */
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .left_area {
            color: blueviolet;
            position: relative;
            text-transform: uppercase;
            font-size: 30px;
            font-weight: 900;
        }

        .left_area span {
            color: #19B3D3;
            font-size: 30px;
        }

        nav {
            display: flex;
            padding: 2% 6%;
            jusify-content: space-between;
            align-items: center;
        }

        .nav-links {
            flex: 1;
            text-align: right;
        }

        .nav-links li {
            list-style: none;
            display: inline-block;
            padding: 8px 12px;
            position: relative;
        }

        .nav-links ul li a {
            text-decoration: none;
            color: aliceblue;
            font-size: 15px;
            font-family: serif;
        }

        .nav-links ul li::after {
            content: '';
            width: 0%;
            height: 2px;
            background: #f44336;
            display: block;
            margin: auto;
            transition: 0.5s;
        }

        .nav-links ul li:hover::after {
            width: 100%;
        }

        .submenu {
            display: none;
        }

        .has_submenu:hover ul {
            padding: 1px 2px 0 2px;
            margin-top: 10px;
            text-align: center;
            text-transform: uppercase;
            background-color: transparent;
            display: block;
            position: absolute;
        }


        form {
            padding: 10px;
            height: 70em;
        }

        .regform {
            width: 80%;
            height: 100%;
            /* width: 800px; */
            background-color: rgb(0, 0, 0, 0.6);
            margin: auto;
            color: #FFFFFF;
            padding: 10px 0px 10px 0px;
            text-align: center;
            border-radius: 15px 15px 0px 0px;
        }

        .main {
            background-color: rgb(0, 0, 0, 0.5);

            width: 80%;
            height: 100%;
            margin: auto;
            border-radius: 0px 0px 15px 15px;
        }

        .error {
            color: red;
        }

        #name {
            width: 100%;
            height: 100px;
        }

        .name {
            margin-left: 25px;
            margin-top: 30px;
            width: 125px;
            color: white;
            font-size: 18px;
            font-weight: 700;
        }


        .Address {
            position: relative;
            left: 200px;
            top: -37px;
            line-height: 30px;
            width: 480px;
            border-radius: 15px;
            padding: 0 22px;
            font-size: 16px;

        }


        .Code {
            position: relative;
            left: 200px;
            top: -37px;
            line-height: 40px;
            width: 95px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555;
        }

        .number {
            position: relative;
            left: 200px;
            top: -37px;
            line-height: 40px;
            width: 255px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555;
        }

        .area-code {
            position: relative;
            color: #E5E5E5;
            text-transform: capitalize;
            font-size: 16px;
            left: 54px;
            top: -4px;
        }

        .phone-number {
            position: relative;
            color: #E5E5E5;
            text-transform: capitalize;
            font-size: 16px;
            left: -100px;
            top: -2px;
        }

        .option {
            position: relative;
            left: 200px;
            top: -37px;
            line-height: 40px;
            width: 532px;
            height: 40px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555;
            outline: none;
            overflow: hidden;
        }

        .option option {
            font-size: 20px;
        }

        #coustomer {
            margin-left: 25px;
            color: white;
            font-size: 18px;
        }

        div {
            margin-left: 30px;

        }

        button {
            background-color: #3BAF9F;
            display: block;
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

        #upload_file {
            color: white;
        }

        .g-recaptcha {
            margin-left: 180px;
        }
    </style>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <section class="header">
        <nav>

            <div class="nav-links" id="navLinks">

                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="home.php"><b>HOME</b></a></li>
                    <li><a href="about.php"><b>ABOUT</b></a></li>
                    <li><a href="blog.php"><b>BLOG</b></a></li>
                    <li><a href="contact.php"><b>CONTACT</b></a></li>
                    <li><a href="login.php"><b>SIGNIN</b></a></li>
                </ul>

                </ul>
    </section>

    <div class="regform">
        <h1> Registration Form</h1>
    </div>
    <div class="main">

        <form action='validate.php' method="POST" name="user-registration" enctype="multipart/form-data">
            <div>

                <h2 class="name"> Full Name </h2>
                <input class="Address" placeholder="Full Name" type="text" name="full_name" value="<?php echo $_POST['full_name'] ?? '' ?>" />
                <span class="error"><?php echo $full_nameErr ?></span>

                <h2 class="name"> Username </h2>
                <input class="Address" type="text" placeholder="username" name="username" value="<?php echo $_POST['username'] ?? '' ?>" />
                <span class="error"><?php echo $usernameErr ?></span>

                <h2 class="name">Email</h2>
                <input class="Address" type="text" placeholder="***@gmail.com" name="email" value="<?php echo $_POST['email'] ?? '' ?>" />
                <span class="error"><?php echo $emailErr ?></span>

                <h2 class="name">password</h2>
                <input class="Address" placeholder="*****" type="password" name="password">
                <span class="error"><?php echo $passwordErr ?></span>

                <h2 class="name">confirm password</h2>
                <input class="Address" placeholder="*****" type="password" name="cpassword">
                <span class="error"><?php echo $cpasswordErr ?></span>

                <h2 class="name"> Address </h2>
                <input class="Address" type="text" placeholder="Address" name="address" value="<?php echo $_POST['address'] ?? '' ?>" />
                <span class="error"><?php echo $addressErr ?></span>

                <h2 class="name">Contact</h2>

                <input class="Address" type="text" placeholder="+977 *********" name="contact" maxlength="10">
                <span class="error"><?php echo $contactErr ?></span>

                <h2 class="name">Insert Picture</h2>
                <input class="Address" type="file" name="image" accept="image/*" id="upload_file" onchange="getImagePreview(event)" />
                <div id="preview" style="padding-left: 301px; margin-top: -20px;"></div>
                <span class="error"><?php echo $imageErr ?></span>

                <h2 class="name"> Discription </h2>
                <textarea name="message" placeholder="about you and why do you want to donate" class="Address" cols="30" rows="3"></textarea>

                <div class="g-recaptcha" data-sitekey="6LcSI0EcAAAAAM3sqoiOaMvvJ2KGWXYXw0hroXhG"></div>

                <button name="submit" type="submit">Register</button>

                <input type="hidden" id="token" name="token">


        </form>
    </div>
    <?php $path = "http://ces.local/"; ?>
    <script src="<?php echo $path ?>/admin/assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $path ?>/admin/assets/js/plugins/validate/jquery.validate.min.js"></script>

    <script>
        function getImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('preview');
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            newimg.width = "200";
            newimg.height = "150";


            imagediv.appendChild(newimg);
        }

        $(function() {
            $("form[name='user-registration']").validate({
                rules: {
                    full_name: {
                        required: true,
                        minlength: 5
                    },
                    username: {
                        required: true,
                        minlength: 5
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: '#password',
                    },
                    address: {
                        required: true,
                        minlength: 5
                    },
                    contact: {
                        required: true,
                        number: true,
                        minlength: 5

                    },
                    message: {
                        required: true,
                        minlength: 5
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