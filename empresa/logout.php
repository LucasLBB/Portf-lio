<?php
session_start();
session_destroy();
header('Location:loginht.php');
exit();
?>
