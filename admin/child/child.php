<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once('../dbconnection.php');
// if(!isset($_SESSION['contact'])){
//     header('location:../logout.php');
//  }

//Error validation
$fullNameErr = $dobErr = $ageErr = $contactErr = $addressErr = $religionErr = $languageErr = $heightErr = $imageErr = '';
//variable store
$fullname = $dob = $age = $contact = $address = $image = '';
if (isset($_POST['submit'])) {
    $uploadImage = false;
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $religion = $_POST['religion'];
    $language = $_POST['language'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $height = $_POST['height'];
    $message = $_POST['message'];


    if (empty($fullname)) {
        $fullNameErr = 'fullname is required';
    }
    if (empty($dob)) {
        $dobErr = "Date of birth is required ";
    }
    if (empty($religion)) {
        $religionErr = "plz mention religion ";
    }
    if (empty($language)) {
        $languageErr = "language is required ";
    }
    if (empty($height)) {
        $heightErr = "height is required ";
    }

    if (empty($message)) {
        $messageErr = "message is required ";
    }

    if (empty($contact)) {
        $contactErr = "contact is required ";
    } else {
        $query = mysqli_query($conn, "select * from child where contact='$contact'");
        $checkcontactExists = mysqli_fetch_array($query);

        if (isset($checkcontactExists['contact']) && $checkcontactExists['contact'] == $contact) {
            $contactErr = 'number Already Exists';
        }
    }


    if (empty($address)) {
        $addressErr = "address is required ";
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

    //    if ($fullNameErr = $dobErr = $ageErr = $contactErr = $addressErr = $imageErr == '') {
    if ($fullNameErr == '' && $dobErr == '' &&  $ageErr == '' && $contactErr == '' && $addressErr == '' && $imageErr == '') {
        $date = date('Y-m-d');

        if ($uploadImage) {
            $fileName = time() . '-' . $file_name;
            $target = '../images/child/' . $fileName;
            move_uploaded_file($file_tmp_name, $target);
            //            $mysql = mysqli_query($conn, "insert into child(fullname,dob,age,religion,language,contact,address,height,image,message) values('$fullname,$dob,$age,$religion,$language,$contact,$address,$height,$image,$message')");
            $mysql = mysqli_query($conn, "insert into child(full_name,dob,age,religion,language,contact,address,height,image,message,date) values('$fullname','$dob','$age','$religion','$language','$contact','$address','$height','$fileName','$message','$date')") or die(mysqli_error($conn));
        } else {
            //            $mysql = mysqli_query($conn, "insert into child(fullname,dob,age,religion,language,contact,address,height,message) values('$fullname,$dob,$age,$religion,$language,$contact,$address,$height,$image,$message')");
            $mysql = mysqli_query($conn, "insert into child(full_name,dob,age,religion,language,contact,address,height,message,date) values('$fullname','$dob','$age','$religion','$language','$contact','$address','$height','$message','$date')") or die(mysqli_error($conn));
        }
        if ($mysql) {
            $_SESSION['action'] = 'success';
            $_SESSION['message'] = 'child Created Successfully!';
            header('location:childlist.php');
        }
    }
}
?>


<!DOCTYPE html>
<html>
<?php include("../common/head.php") ?>

<body class="fixed-navigation">

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
                                <div class="media-body">
                                    <small class="float-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>.
                                    <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html" class="dropdown-item">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="profile.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="float-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="grid_options.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html" class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="../logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
    </div>
    <div class="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <?php include('../common/sidebar.php') ?>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Child Form</h5>

                            </div>
                            <div class="ibox-content">
                                <form action="" method="post" enctype="multipart/form-data" name="user-registration">
                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Full Name</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="fullname" value="<?php echo isset($fullname) ? $fullname : '' ?>">
                                            <span class='error'><?php echo $fullNameErr ?></span>


                                        </div>
                                    </div>


                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Date of Birth</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="dob" id="dob" value="<?php echo isset($dob) ? $dob : '' ?>">
                                            <span class='error'><?php echo $dobErr ?></span>
                                        </div>
                                    </div>


                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">age</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="age" value="<?php echo isset($age) ? $age : '' ?>">

                                            <span class='error'><?php echo $ageErr ?></span>
                                        </div>
                                    </div>


                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">religion</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="religion" value="<?php echo isset($religion) ? $religion : '' ?>">
                                            <span class='error'><?php echo $religionErr ?></span>

                                        </div>
                                    </div>


                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">language</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="language" value="<?php echo isset($language) ? $language : '' ?>">
                                            <span class='error'><?php echo $languageErr ?></span>

                                        </div>
                                    </div>

                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">contact</label>
                                        <div class="col-sm-10">
                                            <input type="contact" class="form-control" maxlength="10" name="contact" value="<?php echo isset($contact) ? $contact : '' ?>">
                                            <span class='error'><?php echo $contactErr ?></span>
                                        </div>
                                    </div>


                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address" value="<?php echo isset($address) ? $address : '' ?>">
                                            <span class='error'><?php echo $addressErr ?></span>

                                        </div>
                                    </div>


                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Height</label>

                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" name="height" value="<?php echo isset($height) ? $height : '' ?>">
                                            <span class='error'><?php echo $heightErr ?></span>

                                        </div>
                                    </div>


                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" accept="jpg,png,jpeg" value="<?php echo isset($image) ? $image : '' ?>">
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

                            </div>


                            <div class="hr-line-dashed"></div>
                            <div class="form-group row">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Save changes</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>

    <?php include('../common/script.php') ?>

    <script>
        $(function() {
            $("form[name='user-registration']").validate({
                rules: {
                    fullname: {
                        required: true,
                        minlength: 3
                    },

                    dob: "required",
                    age: {
                        required: true,
                        minlength: 2
                    },
                    religion: {
                        required: true,
                        minlength: 3
                    },
                    language: {
                        required: true,
                        minlength: 4
                    },
                    contact: {
                        required: true,
                        minlength: 10
                    },
                    address: {
                        required: true,
                        minlength: 5
                    },
                    Height: {
                        required: true,
                        minlength: 5
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
        var today = new Date().toISOString().split('T')[0];
document.getElementsByName("dob")[0].setAttribute('max', today);
    </script>

</body>

</html>