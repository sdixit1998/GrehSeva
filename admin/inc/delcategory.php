<?php
	require_once '../config/connect.php';
	if(!isset($_SESSION['Email'])&empty($_SESSION['Email']))
	{
		header('location:login.php');
	}
	
	if(isset($_GET) & !empty(isset($_GET))){
		$id=$_GET['id'];
		$sql="DELETE FROM category WHERE id='$id'";
		if(mysqli_query($connection,$sql)){
			header('location:categories.php');
		}
	}else{
		header('location:categories.php');
	}
?>