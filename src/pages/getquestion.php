<?php
	@include_once '../lib/classes/Validator.php';
	@include_once '../lib/classes/DBConnection.php';
	@include_once '../lib/classes/Question.class.php';
	session_start();
	if (!isset($_SESSION['user']))
	{
		echo "Reload the page since there seems to be error while sending your answer to the server";
	}
	else
	{
		$err = "Could not retrieve question<br />";
		if (($question = file_get_contents("question.php")) == null)
		{
			echo "Please wait for a while before the quiz starts. Meanwhile, hover on the FAQ to know the rules for the game.";
		}
		else
		{
			if (is_numeric($question))
			{
				$qObj = new Question();
				$q = $qObj->viewQuestion($question);
				if (is_array($q))
				{
					echo ":success:".$q[0]['question'];
					$_SESSION['qid'] = $q[0]['id'];
				}
				else 
				{
					echo $err;
				}
			}
			else 
			{
				echo $err;
			}
		}
	}
?>