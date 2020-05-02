<?php
ob_start();
<<<<<<< HEAD
if((!$_SESSION['email']) || (!$_SESSION['senha']))
{
    header('Location:loginht.php');
=======
if((!$_SESSION['email']) || (!$_SESSION['senha'])){
    header('Location:login.html');
>>>>>>> 940c707faa0b613c23cea08833f67e69220aa3ab
    exit();
}

