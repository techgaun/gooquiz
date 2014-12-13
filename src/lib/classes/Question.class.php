<?php

class Question 
{
	
	function __construct() 
	{
	
	}
	
	function ListQuestions()
	{
		$con = new DBConnection();
		$query = "SELECT * FROM questions";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}
	
	function ListRecentQuestions($num)
	{
		$con = new DBConnection();
		$num = Validator::cleanString($num, 'int');
		$query = "SELECT * FROM questions ORDER BY id DESC LIMIT $num";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}
	
	function viewQuestion($id)
	{
		$con = new DBConnection();
		$$id = Validator::cleanString($id, 'int');
		$query = "SELECT * FROM questions WHERE id = '$id'";
		
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tut = $con->fetch_array();
			return $tut;
		}
		return false;
	}
	
	function addQuestion($q, $ans, $end_time)
	{
		$dbcon = new DBConnection();
		$q = Validator::cleanString($q);
		$ans = Validator::cleanString(nl2br($ans));
		
		$query = "INSERT INTO questions (question, answer) VALUES ('$q', '$ans')";
		$dbcon->setQuery($query);
		$dbcon->execute_query();
		$rows = $dbcon->get_affected_rows();
		if ($rows == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function removeQuestion($id)
	{
		$dbcon = new DBConnection();
		$num = Validator::cleanString($id, 'int');
		$query = "DELETE FROM questions WHERE id = '$id'";
		$dbcon->setQuery($query);
		$dbcon->execute_query();
		$rows = $dbcon->get_affected_rows();
		if ($rows == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function setCurrentQuestion($qid, $time)
	{
		$dbcon = new DBConnection();
		$title = Validator::cleanString($qid, 'int');
		
		$query = "SELECT * FROM current_question";
		$dbcon->setQuery($query);
		$dbcon->execute_query();
		$rows = $dbcon->get_num_of_rows();
		if ($rows == 1)
		{
			$query = "UPDATE current_question SET q_id = '$qid', right_answer_by = NULL, end_time = ADDTIME(NOW(), '00:$time:00')";
		}
		else 
		{
			$query = "INSERT INTO current_question (q_id, end_time) VALUES ('$qid', ADDTIME(NOW(), $time))";
		}
		//echo $query;
		$dbcon->setQuery($query);
		$dbcon->execute_query();
		$rows = $dbcon->get_affected_rows();
		if ($rows == 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function ListAnswers()
	{
		$con = new DBConnection();
		$query = "SELECT * FROM questions";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}
}

?>