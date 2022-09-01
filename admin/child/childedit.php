<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

session_start();

require_once('../dbconnection.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "select * from child where id='$id'");
    $result = mysqli_fetch_array($query);
}

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
 
     if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
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
         $date= date('Y-m-d');
 
         $id =$_GET['id'];
         if ($uploadImage) {
            if ($result['image'] && file_exists('../images/child/' . $result['image'])) {
                unlink('../images/child/' . $result['image']);
            }
            $fileName = time() . '-' . $file_name;
            $target = '../images/child/' . $fileName;
            move_uploaded_file($file_tmp_name, $target);
            $mysql = mysqli_query($conn, "update child set full_name='$fullname',dob='$dob',age='$age',religion='$religion',language='$language',contact='$contact',address='$address',height='$height',image='$fileName',message='$message' where id='$id'") or die(mysqli_error($conn));
        } else {
            
            $mysql = mysqli_query($conn, "update child set full_name='$fullname',dob='$dob',age='$age',religion='$religion',language='$language',contact='$contact',address='$address',height='$height',message='$message' where id=$id");
            
        }  
         if ($mysql) {
             $_SESSION['action'] = 'success';
             $_SESSION['message'] = 'Users Created Successfully!';
             header('location:childlist.php');
         }
     }
 
 }

?>

<!DOCTYPE html>
<html>
<?php include("../common/head.php")?>
<body class="fixed-navigation" >
    <div class="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <?php include('../common/sidebar.php')?>
        </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
</div>
           
        <div class="wrapper wrapper-content animated fadeInRight">
              
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>child Form</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">Full Name</label>
                                    <?php 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "select * from child where id='$id'");
                            $record = mysqli_fetch_array($query);
                        }?>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fullname"
                                               value="<?php echo $record['full_name']?>">
                                        <span class='error'><?php echo $fullNameErr ?></span>


                                    </div>
                                </div>


                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">Date of Birth</label>
                                    <?php 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "select * from child where id='$id'");
                            $record = mysqli_fetch_array($query);
                        }?>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="dob"
                                               value="<?php echo $record['dob']?>">

                                        <span class='error'><?php echo $dobErr ?></span>
                                    </div>
                                </div>


                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">age</label>
                                    <?php 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "select * from child where id='$id'");
                            $record = mysqli_fetch_array($query);
                        }?>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="age"
                                               value="<?php echo $record['age']?>">

                                        <span class='error'><?php echo $ageErr ?></span>
                                    </div>
                                </div>


                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">religion</label>
                                    <?php 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "select * from child where id='$id'");
                            $record = mysqli_fetch_array($query);
                        }?>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="religion"
                                               value="<?php echo $record['religion']?>">
                                        <span class='error'><?php echo $religionErr ?></span>

                                    </div>
                                </div>


                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">language</label>
                                    <?php 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "select * from child where id='$id'");
                            $record = mysqli_fetch_array($query);
                        }?>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="language"
                                               value="<?php echo $record['language']?>">
                                        <span class='error'><?php echo $languageErr ?></span>

                                    </div>
                                </div>

                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">contact</label>
                                    <?php 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "select * from child where id='$id'");
                            $record = mysqli_fetch_array($query);
                        }?>
                                    <div class="col-sm-10">
                                        <input type="contact" class="form-control" name="contact"
                                               value="<?php echo $record['contact']?>">
                                        <span class='error'><?php echo $contactErr ?></span>
                                    </div>
                                </div>


                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">address</label>
                                    <?php 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "select * from child where id='$id'");
                            $record = mysqli_fetch_array($query);
                        }?>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address"
                                               value="<?php echo $record['address']?>">
                                        <span class='error'><?php echo $addressErr ?></span>

                                    </div>
                                </div>


                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">Height</label>
                                    <?php 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "select * from child where id='$id'");
                            $record = mysqli_fetch_array($query);
                        }?>

                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" name="height"
                                               value="<?php echo $record['height']?>">
                                        <span class='error'><?php echo $heightErr ?></span>

                                    </div>
                                </div>


                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">Image</label>
                                    <?php 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "select * from child where id='$id'");
                            $record = mysqli_fetch_array($query);
                        }?>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" accept="jpg,png,jpeg"
                                               value="<?php echo $record['image']?>">
                                               <img src="../images/child/<?php echo $record['image'] ?>" width="100px" height="100px"/> 
                                        <span class="error"><?php echo $imageErr ?></span>
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">message</label>
                                    <div class="col-sm-10">
                                       
                                    <textarea id="w3review" name="message" rows="4" cols="50"
                                            >
                                            <?php echo $record['message']?>
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
      

 
    </div>
 <?php include('../common/script.php')?>   
</body>
</html>
