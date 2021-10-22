<?php

session_start();

if(isset($_SESSION['uid']))
{
	unset($_SESSION['uid']);

}
//admin
if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);

}
if(isset($_SESSION['nid']))
{
	unset($_SESSION['nid']);

}

header("Location: home.php");
die;