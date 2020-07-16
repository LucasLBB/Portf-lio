<?php
ob_start();
if((!$_SESSION['email']) || (!$_SESSION['senha'])){
    header('Location:../view/loginUser.php');
    exit();
}