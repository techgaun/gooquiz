<?php

class User 
{
	
	function __construct() 
	{
	
	}
	
	function ListUsers()
	{
		$con = new DBConnection();
		$query = "SELECT * FROM user";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}
	
	function ListRecentUsers($num)
	{
		$con = new DBConnection();
		$num = Validator::cleanString($num, 'int');
		$query = "SELECT * FROM user ORDER BY id DESC LIMIT $num";
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tuts = $con->fetch_array();
			return $tuts;
		}
		return false;
	}
	
	function viewUser($id)
	{
		$con = new DBConnection();
		$$id = Validator::cleanString($id, 'int');
		$query = "SELECT * FROM user WHERE id = '$id'";
		
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tut = $con->fetch_array();
			return $tut;
		}
		return false;
	}
	
	function viewUserByIp($ip)
	{
		$con = new DBConnection();
		$$id = Validator::cleanString($ip);
		$query = "SELECT * FROM user WHERE ip = '$ip'";
		
		$con->setQuery($query);
		$con->execute_query();
		if ($con->get_num_of_rows() > 0)
		{
			$tut = $con->fetch_array();
			return $tut;
		}
		return false;
	}
	
	function addUser($ip)
	{
		$dbcon = new DBConnection();
		$ip = Validator::cleanString($ip);
		
		$query = "SELECT * FROM user WHERE ip = '$ip'";
		$dbcon->setQuery($query);
		$dbcon->execute_query();
		$rows = $dbcon->get_num_of_rows();
		if ($rows == 1)
		{
			$arr = $dbcon->fetch_array();
			return $arr[0]['id'];
		}
		else
		{
			$query = "INSERT INTO user (ip) VALUES ('$ip')";
			$dbcon->setQuery($query);
			$dbcon->execute_query();
			$rows = $dbcon->get_affected_rows();
			if ($rows == 1)
			{
				return $dbcon->get_insert_id();
			}
			else
			{
				return FALSE;
			}
		}
	}
	
	function removeUser($id)
	{
		$dbcon = new DBConnection();
		$num = Validator::cleanString($id, 'int');
		$query = "DELETE FROM users WHERE id = '$id'";
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
	
	function removeAllUsers()
	{
		$dbcon = new DBConnection();
		$query = "DELETE FROM users";
		$dbcon->setQuery($query);
		$dbcon->execute_query();
		$rows = $dbcon->get_affected_rows();
		if ($rows >= 1)
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