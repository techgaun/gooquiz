<?php
	@include_once '../lib/classes/Validator.php';
	@include_once '../lib/classes/DBConnection.php';
	@include_once '../lib/classes/User.class.php';
	@include_once '../lib/classes/Answer.class.php';
	@include_once '../lib/classes/Question.class.php';
	
	session_start();
	if (!isset($_SESSION['user']))
	{
		echo "Reload the page since there seems to be error while sending your answer to the server";
	}
	else 
	{
		if (isset($_GET['ans']))
		{
			
			$ans = htmlspecialchars($_GET['ans'], ENT_QUOTES, "UTF-8");
			$ip = $_SESSION['user'];
			$answer = new Answer();
			
			$success = $answer->addAnswer($_SESSION['uid'], $ans);
			//session_destroy();
			echo $success;
		}
	}
?>