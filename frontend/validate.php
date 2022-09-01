<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('dbconnection.php');
if(isset($_POST['g-recaptcha-response'])){
    $secreatekey ="6LcSI0EcAAAAAAuguCvQ4a0q8pK2XIYGQhjTZ7Zx";
     $ip =$_SERVER['REMOTE_ADDR'];
     $response= $_POST['g-recaptcha-response'];
     $URL= "https://www.google.com/recaptcha/api/siteverify?secret=$secreatekey&response=$response&remoteip=$ip";
     $fire=file_get_contents($URL);
    $data= json_decode($fire);
    if($data->success==true){
        
$full_nameErr=$usernameErr=$passwordErr=$cpasswordErr=$addressErr=$contactErr=$emailErr=$messageErr=$imageErr='';
$full_name=$username=$password=$cpassword=$address=$contact=$email=$message=$image='';

if(isset($_POST['submit'])){
  	$full_name = $_POST['full_name'];
  	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$uploadImage = false;
  	
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
    $message = $_POST['message'];
	
    
    if(empty($full_name)){
        $full_nameErr = 'Full name is required';
    }
    
    if(empty($username)){
        $usernameErr = 'Username is required';
    } 
    if(empty($password)){
        $passwordErr = 'Password is required';
    }
    else if($password != $cpassword){
        $passwordErr = 'Password dont match';
    }

	if(isset($_FILES['image']) && $_FILES['image']['name'] != ''){
        $uploadImage = true;
       $file_name = $_FILES['image']['name'];
       $file_type = $_FILES['image']['type'];
       $file_tmp_name = $_FILES['image']['tmp_name'];
       $file_size = $_FILES['image']['size'];
       
       if(!in_array($file_type,['image/jpeg','image/jpg','image/png'])){
           $imageErr = 'Only jpeg, png and jpg image is required';
        }
    }
    
	if(empty($address)){
		$addressErr = 'Address is required';
	}
	if(empty($contact)){
        $contactErr = 'Contact is required';
    }
    if(empty($email)){
        $emailErr = 'Email is required';
    }
    
    if(empty($message)){
        $messageErr = 'Message is required';
    }
    print_r($passwordErr);
    
    if($full_nameErr== '' && $usernameErr== '' && $passwordErr== '' && $cpasswordErr== '' && $imageErr== '' && $addressErr== '' && $contactErr== '' && $emailErr== '' && $messageErr== ''){
        $password = md5($password);
        
        
        
        if($uploadImage){
            
            $fileName = time().'-'.$file_name;
        
            $target = 'image/'.$fileName;
            move_uploaded_file($file_tmp_name,$target);
            $mysql = mysqli_query($conn,"insert into sponsor(full_name,username,password,address,contact,email,message,image) values('$full_name','$username','$password','$address','$contact','$email', '$message','$fileName')") or die(mysqli_error($conn));
        }else{
            $mysql = mysqli_query($conn,"insert into sponsor(full_name,username,password,address,contact,email, message) values('$full_name','$username','$password','$address','$contact','$email', '$message')");
        }

        if($mysql){
            $_SESSION['action'] = 'success';
            $_SESSION['message'] = 'Users Created Successfully!';
            header('location:login.php');
        }
    }

  }
    }
    else{
        echo 'Please Fill Rechapcha';
    } 
}
else{ 
    echo "Rechapcha Error";
}
?>
<?php $path="http://ces.local";?> 
       <script src="<?php echo $path?>/admin/assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $path?>/admin/assets/js/plugins/validate/jquery.validate.min.js"></script>
 
<script>
    $(function() {
        $("form[name='user-registration']").validate({
            rules: {
                full_name: {
                    required:true,
                    minlength:5
                },
                username: {
                    required: true,
                    minlength:5
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
                    minlength:5
                },
                contact: {
                    required: true,
                    number: true,
                    minlength:5

                },
                message: {
                    required: true,
                    minlength:5
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
 

</script>

