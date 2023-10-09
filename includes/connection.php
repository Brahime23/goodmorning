<?php
    session_start();

	//local db

	if($_SERVER['HTTP_HOST']=="localhost")
	{
	$serverIp="localhost";
	$userName="goodmorning";
	$password="goodmorning";
	$dbname="goodmorning";

	}else
	{
	//Live

	$serverIp="localhost";
	$userName="goodmorning";
	$password="goodmorning";
	$dbname="goodmorning";
	}
  $cn=mysqli_connect($serverIp,$userName,$password) OR Die("Couldn't Connect - ".mysqli_error());
	$link=mysqli_select_db($cn,$dbname)or Die("Couldn't SELCECT - ".mysqli_error());


?>
