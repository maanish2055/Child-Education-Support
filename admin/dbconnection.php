<?php
$servername ="localhost";
$username ="root";
$password ="";
$dbname ="childeducationsupport";

$conn= mysqli_connect($servername,$username,$password,$dbname);

if($conn){
   // echo " connected to database";

}else{
   // echo "not connected to database";
}
?>
