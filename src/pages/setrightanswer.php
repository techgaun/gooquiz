<?php
	@include_once '../lib/classes/Validator.php';
	@include_once '../lib/classes/DBConnection.php';
	@include_once '../config/config.php';
	@include_once '../lib/classes/Answer.class.php';
	session_start();
	if (!isset($_SESSION['is_admin']))
	{
		echo "I guess you have not logged in.";
	}
	else
	{
		if (isset($_GET['uid']))
		{
			$uid = (int) $_GET['uid'];
			$ans = new Answer();
			$ans->setRightAnswer($uid);
		}
	}
?>