<?php
	@include_once '../lib/classes/Validator.php';
	@include_once '../lib/classes/DBConnection.php';
	@include_once '../lib/classes/Answer.class.php';
	@include_once '../lib/classes/User.class.php';
	session_start();
	if (!isset($_SESSION['is_admin']))
	{
		echo "Reload the page since there seems to be error while retrieving the answers";
	}
	else
	{
		$err = "Could not retrieve answers<br />";
		$answer = new Answer();
		$a = $answer->ListAnswers();
		if (!is_array($a) || empty($a))
		{
			echo "<div>No answers has been submitted yet.</div>";
		}
		else
		{
			$u = new User();
			foreach ($a as $ans)
			{
				$user = $u->viewUser($ans['user_id']);
				echo "<div>".$ans['answer']."&nbsp;&nbsp;&nbsp;&nbsp;".$ans['send_time']."&nbsp;&nbsp;&nbsp;&nbsp;By ".$user[0]['ip']."&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"ajaxHandler('../../pages/setrightanswer.php?uid=".$ans['user_id']."', 'right_answer');\">Right answer</a></div>";
			}
		}
	}
?>