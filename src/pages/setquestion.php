<?php
	@include_once '../lib/classes/Validator.php';
	@include_once '../lib/classes/DBConnection.php';
	@include_once '../config/config.php';
	@include_once '../lib/classes/Question.class.php';
	session_start();
	if (!isset($_SESSION['is_admin']))
	{
		echo "I guess you have not logged in.";
	}
	else
	{
		if (isset($_GET['qid']))
		{
			$q_id = is_numeric($_GET['qid'])?$_GET['qid']:1;
			$fp = @file_put_contents("question.php", $q_id);
			
			if ($fp == FALSE)
			{
				echo "Error setting the question. Check the file permission";
			}
			else 
			{
				$q = new Question();
				$q->setCurrentQuestion($q_id, $time);
				echo "Question ready for googling.";
			}
		}
	}
?>