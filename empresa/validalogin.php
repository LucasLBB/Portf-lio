<?php
ob_start();
if((!$_SESSION['email']) || (!$_SESSION['nomecompleto']))
{
    header('Location:login.html');
    exit();
}

?>