<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once('../dbconnection.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = mysqli_query($conn,"select image from sponsor where id='$id'");
    $row = mysqli_fetch_array($query);

    if ($row['image'] && file_exists('../../frontend/image/' . $row['image'])) {
        unlink('../images/user/' . $row['image']);
    }

    $mysql = mysqli_query($conn,"delete from sponsor where id ='$id'");
    if($mysql){
        $_SESSION['action'] = 'danger';
        $_SESSION['message'] = 'Users deleted Successfully!';
        header('location:sponsorlist.php');
    }
}
?>