<?php 

	session_start();
	$_SESSION['who'] = '';
	header('Location:../index.php');