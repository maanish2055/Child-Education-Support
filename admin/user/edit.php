<?php
error_reporting(E_ALL);
ini_set('display_errors','1');

session_start();

require_once('../dbconnection.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "select * from user where id='$id'");
    $result = mysqli_fetch_array($query);
}

 //Error validation
$firstNameErr=$lastNameErr=$emailErr=$passwordErr=$mobileErr=$imageErr = '';
//variable store
$first_name=$middle_name=$last_name=$email=$password=$confirm_password=$mobile='';
if(isset($_POST['submit'])){
  
    $first_name = $_POST['first_name'];
    $middle_name =$_POST['middle_name'];
    $last_name =$_POST['last_name'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $confirm_password =$_POST['confirm_password'];
    $mobile =$_POST['mobile'];

    if(empty($first_name)){
        $firstNameErr= 'first name is required';
    }
    if (empty($last_name)){
        $lastNameErr="last name is required ";
    }
    
    if (empty($email)){
        $emailErr="Email is required ";
} 

if ($password != '') {
    if ($password != $confirm_password) {
        $passwordErr = 'Password dont match';
    }
}

if (empty($mobile)) {
    $mobileErr = 'Mobile Number is required';
}

if (isset($_FILES['image']['name']) && $_FILES['image']['size'] != '') {
    $uploadImage = true;
    $file_name = $_FILES['image']['name'];
    $file_type = $_FILES['image']['type'];
    $file_tmp_name = $_FILES['image']['tmp_name'];
    $file_size = $_FILES['image']['size'];

    if (!in_array($file_type, ['image/jpeg', 'image/jpg', 'image/png'])) {
        $imageErr = 'Only jpeg, png and jpg image is required';
    }
}
if($firstNameErr ==''&& $lastNameErr ==''&& $emailErr ==''&& $passwordErr ==''&& $mobileErr =='' && $imageErr == ''){
$pass = md5($password);

$id =$_GET['id'];
if ($uploadImage) {
    if ($result['image'] && file_exists('../images/user/' . $result['image'])) {
        unlink('../images/user/' . $result['image']);
    }
    $fileName = time() . '-' . $file_name;
    
    $target = '../images/user/' . $fileName;
    move_uploaded_file($file_tmp_name, $target);

$mysql = mysqli_query($conn, "update  user set email ='$email',first_name='$first_name',last_name='$last_name',middle_name='$middle_name',mobile='$mobile',image='$fileName' where id='$id'")or die(mysqli_error($conn));
} else {
    $mysql = mysqli_query($conn, "update user set email ='$email',first_name='$first_name',last_name='$last_name',middle_name='$middle_name',mobile='$mobile' where id='$id'");
}   
if($password !=''){
    $mysql = mysqli_query($conn,"update user set password ='$password' where id='$id'" );

}
// $mysql=mysqli_query($conn,query:"insert into user(email,first_name,middle_name,last_name,password,mobile");
if($mysql){
$_SESSION['action']= 'success';
$_SESSION['message']= 'Users updated Sucessfully';
header('location:list.php ');
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
                            <h5>Users Form</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">First Name</label>
                        <?php 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "select * from user where id='$id'");
                            $record = mysqli_fetch_array($query);
                        }?>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="first_name" 
                                        value="<?php echo $record['first_name']?>">
                                        <span class='error'><?php echo $firstNameErr?></span>
                                </div>
                                </div>

                                  <div class="form-group  row">
                                      <label class="col-sm-2 col-form-label">Middle Name</label>
 
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="middle_name"  
                                        value="<?php echo $record['middle_name']?>">
                                </div>
                                </div>

                                
                                  <div class="form-group  row"><label class="col-sm-2 col-form-label">Last Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="last_name"  value="<?php echo $record['last_name']?>">
                                        <span class='error'><?php echo $lastNameErr?></span>
                                </div>
                                </div>

                                
                                  <div class="form-group  row"><label class="col-sm-2 col-form-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email"  value="<?php echo $record['email']?>" >
                                        <span class='error'><?php echo $emailErr?></span>
                                </div>
                                </div>


                                
                                  <div class="form-group  row"><label class="col-sm-2 col-form-label">password</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" ></div>
                                        <span class='error'><?php echo $passwordErr?></span>
                                </div>
                                    <div class="form-group  row"><label class="col-sm-2 col-form-label">confirm password</label>

                                <div class="col-sm-10">
                                     <input type="password" class="form-control" name="confirm_password"></div>
                                     <span class='error'><?php echo $passwordErr?></span>
                                </div>

                                  <div class="form-group  row"><label class="col-sm-2 col-form-label">Contact Number</label>
                                
                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" name="mobile"  value="<?php echo $record['mobile']?>">
                                        <span class='error'><?php echo $mobileErr?></span>
                                </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">Image</label>
                                   <?php
                                    if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = mysqli_query($conn, "select * from user where id='$id'");
                            $record = mysqli_fetch_array($query);
                            }?>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" accept="jpg,png,jpeg" value="<?php echo $record['image']?>">>
                                         <img src="../images/user/<?php echo $record['image'] ?>" width="100px" height="100px"/> 
                                        <span class="error"><?php echo $imageErr ?></span>
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
 <?php include('../common/script.php')?>   
</body>
</html>
