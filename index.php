<?php
include '/var/www/html/0/var.php';
session_start();
$MsgErr = "";
//Utiliser la SESSION

if(isset($_POST['Action']))
{
    include('VerifLogin.php');
}
else
{
    if(isset($_SESSION['login']))
    {
    	
        include('menu.php');
    }
    else
    {
        include('login.php');
    }
}

?>
