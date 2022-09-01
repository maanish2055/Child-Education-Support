<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['id']);
session_unset();
header('location:login.php');