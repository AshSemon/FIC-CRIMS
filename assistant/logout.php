<?php
session_start();
include('../connection.inc.php');
include('../function.inc.php');
unset($_SESSION['AJ_IS_LOGIN']);
unset($_SESSION['AJ_USER']);
unset($_SESSION['AJ_USER_NAME']);
unset($_SESSION['AJ_ID']);
redirect('login.php');
?>