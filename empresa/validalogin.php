<?php
if(!($_SESSION['txtcpf'])) 
{
    header('Location:login.html');
    exit();
}
?>