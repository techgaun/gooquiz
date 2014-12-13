<?php

class Answer 
{
	
	function __construct() 
	{
	
	}
	
	function ListAnswers()
	{
		$con = new DBConnection();
		$query = "SELECT * FROM answer";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}
	
	function ListRecentAnswers($num)
	{
		$con = new DBConnection();
		$num = Validator::cleanString($num, 'int');
		$query = "SELECT * FROM answer LIMIT $num";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}
	
	function viewAnswer($id)
	{
		$con = new DBConnection();
		$$id = Validator::cleanString($id, 'int');
		$query = "SELECT * FROM answer WHERE ans_id = '$id'";
		
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tut = $con->fetch_array();
			return $tut;
		}
		return false;
	}
	
	function addAnswer($uid, $ans)
	{
		$dbcon = new DBConnection();
		$uid = Validator::cleanString($uid, 'int');
		$ans = Validator::cleanString(nl2br($ans));
		$query = "SELECT * FROM answer WHERE user_id = '$uid'";
		$dbcon->setQuery($query);
		$dbcon->execute_query();		
		$rows = $dbcon->get_num_of_rows();
		
		if ($rows == 1)
		{
			$query = "UPDATE answer SET answer = '$ans', send_time = NOW() WHERE user_id = '$uid'";
		}
		else
		{
			$query = "INSERT INTO answer (user_id, answer, send_time) VALUES ('$uid', '$ans', NOW())";
		}	
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
	
	function removeAnswer($id)
	{
		$dbcon = new DBConnection();
		$num = Validator::cleanString($id, 'int');
		$query = "DELETE FROM answer WHERE ans_id = '$id'";
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
	
	function setRightAnswer($uid)
	{
		$dbcon = new DBConnection();
		$uid = Validator::cleanString($uid, 'int');
		$query = "UPDATE current_question SET right_answer_by = '$uid'";
		
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
}

?>