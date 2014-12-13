<?php
	@include_once '../config/config.php';
	if ($localonly === 1 && $_SERVER['REMOTE_ADDR'] != "127.0.0.1")
	{
		die("Admin has setup the admin panel to be accessible from local computer only");
	}
	session_start();
	if (isset($_SESSION['is_admin']))
	{
		header("location: index.php");
	}
 
	if (isset($_POST['txtPass']))
	{
		if ($_POST['txtPass'] == $pass)
		{
			$_SESSION['is_admin'] = 1;
			header("location: index.php");
		}
		else 
		{
			$err = "<div style=\"margin-bottom: 20px; color: #f00\">Login failed.</div>";
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login To Manage CMS</title>
</head>

<body>
<!-- I'm too lazy to design admin part
brisha@techgaun.com
-->
<div style="margin-bottom: 20px;">Enter verification code</div>
<?php
	if (isset($_POST['txtPass']) && isset($err))
	{
		echo $err;
	}
?>
<form method="post" action="">
<input type="password" name="txtPass" id="txtPass" style="width: 160px" />
<br />
<input type="submit" name="sbtPass" id="sbtPass" value=" Login " style="margin-top: 15px;" />
</form>

</body>