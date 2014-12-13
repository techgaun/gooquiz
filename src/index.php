<?php
	session_start();
	@include_once 'lib/classes/Validator.php';
	@include_once 'lib/classes/DBConnection.php';
	@include_once 'lib/classes/User.class.php';
	
	if (!isset($_SESSION['user']))
	{
		$_SESSION['user'] = htmlspecialchars($_SERVER['REMOTE_ADDR'], ENT_QUOTES, 'UTF-8');
		$user = new User();
		$_SESSION['uid'] = $user->addUser($_SESSION['user']);
	}
	@include_once 'config/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<script type="text/javascript" src="js/ajaxHandler.js"></script>
<script type="text/javascript" src="js/timer.js"></script>
</head>
<body>
<script type="text/javascript">
//ajaxHandler('getquestion.php', 'question')
		process = setInterval("ajaxHandler('getquestion.php', 'question')", 1000);
</script>
	<div id="wrapper">
		<div id="header">
			<h1>
				Your Way<!-- <?php echo "<h1>".$_SESSION['uid']."</h1>"; ?> -->
			</h1>
		</div>
		
		<div id="quizbody">
			<a href="#" class="tooltip">FAQ<span class="custom help"><img src="images/Help.png" alt="Help" height="48" width="48" /><em>Help</em>You've <?php echo $time; ?> minutes to google and give correct answer. If your answer is correct, you'll win else you'll loose. If time exceeds, you'll loose.</span></a>
			<form name="cd">
				<input id="txt" readonly="true" type="text" value="<?php echo $time_str; ?>" border="0" name="disp">
			</form>
			<fieldset>
				<p id="question">
					<?php
						echo $info;
					?>
				</p>
				<form action="" method="post">
					<textarea rows="15" cols="" id="txtAnswer" name="txtAnswer"></textarea>
					<br />
					<a href="#" class="myButton" onclick="ajaxHandler('sendanswer.php?ans='+document.getElementById('txtAnswer').value, 'txtAnswer');">Submit<a/>
				</form>
			</fieldset>
		</div>
		<div id="footer">
		<?php 
			echo "Powered by ".$tool." ".$version.", Designed by <a href='http://www.techgaun.com'>Brisha Pote</a> & Developed By <a href='http://www.techgaun.com'>Samar Dhwoj Acharya</a>, &copy; <a href='http://www.techgaun.com'>Tech Gaun.Com</a>";
		?>
	</div>
	</div>
</body>
</html>