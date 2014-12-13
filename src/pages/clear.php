<?php
	@include_once '../lib/classes/Validator.php';
	@include_once '../lib/classes/DBConnection.php';
	//@include_once '../lib/classes/User.class.php';
	@include_once '../lib/classes/Question.class.php';
	session_start();
	if (!isset($_SESSION['is_admin']))
	{
		echo "I guess you have not logged in.";
	}
	else
	{
		if (isset($_GET['action']))
		{
			$action = $_GET['action'];
			switch ($action)
			{
				case "del_question":
					@file_put_contents("../pages/question.php", "");
					break;
					
				case "cleardb":
					
					break;
					
				default:
					echo "No action specified";
			}
		}
	}
?>