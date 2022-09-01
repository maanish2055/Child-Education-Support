<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();


require_once('dbconnection.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "select * from sponsor where id='$id'");
    $result = mysqli_fetch_array($query);
}

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
        $id = $_GET['id'];
        if ($uploadImage) {

            $fileName = time() . '-' . $file_name;

            $target = 'image/' . $fileName;
            die($target);
            move_uploaded_file($file_tmp_name, $target);
            $mysql = mysqli_query($conn, "update  sponsor set full_name ='$full_name',username ='$username',password ='$password',address ='$address',contact ='$contact',email ='$email',message ='$message',image ='$fileName'where id=$id'") or die(mysqli_error($conn));
        } else {
            $mysql = mysqli_query($conn, "update  sponsor set full_name ='$full_name',username ='$username',password ='$password',address ='$address',contact ='$contact',email ='$email',message ='$message'where id=$id'") or die(mysqli_error($conn));
        }

        if ($mysql) {
            $_SESSION['action'] = 'success';
            $_SESSION['message'] = 'Users Created Successfully!';
            header('location:Aboutyou.php');
        }
    }
}

?>

<!DOCTYPE html>
<html>
<?php include("common/head.php") ?>

<body class="fixed-navigation">
    <div class="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <?php include('common/sidebar.php') ?>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Edit Form</h5>

                            </div>
                            <div class="ibox-content">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Full name</label>
                                        <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $query = mysqli_query($conn, "select * from sponsor where id='$id'");
                                            $record = mysqli_fetch_array($query);
                                        } ?>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="full_name" value="<?php echo $record['full_name'] ?>">
                                            <span class='error'><?php echo $full_nameErr ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Username</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="username" value="<?php echo $record['username'] ?>">
                                            <span class='error'><?php echo $usernameErr ?></span>
                                        </div>
                                    </div>


                                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Email</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" value="<?php echo $record['email'] ?>">
                                            <span class='error'><?php echo $emailErr ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group  row"><label class="col-sm-2 col-form-label">password</label>

                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <span class='error'><?php echo $passwordErr ?></span>
                                    </div>
                                    <div class="form-group  row"><label class="col-sm-2 col-form-label">address</label>

                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <span class='error'><?php echo $passwordErr ?></span>
                                    </div>

                                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Contact Number</label>

                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" name="mobile" value="<?php echo $record['mobile'] ?>">
                                            <span class='error'><?php echo $contactErr ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Image</label>
                                        <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $query = mysqli_query($conn, "select * from user where id='$id'");
                                            $record = mysqli_fetch_array($query);
                                        } ?>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" accept="jpg,png,jpeg" value="<?php echo $record['image'] ?>">>
                                            <img src="../images/user/<?php echo $record['image'] ?>" width="100px" height="100px" />
                                            <span class="error"><?php echo $imageErr ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">message</label>
                                        <div class="col-sm-10">

                                            <textarea id="w3review" name="message" rows="4" cols="50" value="<?php echo isset($message) ? $message : '' ?>">

                                    </textarea>
                                        </div>

                                    </div>
                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                            <button class="btn btn-primary btn-sm" type="submit" name="submit">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="footer">
            <div class="float-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2018
            </div>
        </div> -->


        </div>
        <?php include('../common/script.php') ?>
</body>

</html>