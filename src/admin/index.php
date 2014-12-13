<?php
	@include_once '../lib/classes/Validator.php';
	@include_once '../lib/classes/DBConnection.php';
	@include_once '../lib/classes/User.class.php';
	@include_once '../lib/classes/Question.class.php';
	@include_once '../lib/classes/Answer.class.php';
	
	session_start();
	if (!isset($_SESSION['is_admin']))
	{
		header("Location: login.php");
	}
	@include_once '../config/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin Panel :: <?php echo $title; ?></title>
<link rel="stylesheet" href="../css/styles.css" type="text/css" />
<script type="text/javascript" src="../js/ajaxHandler.js"></script>
<script type="text/javascript" src="../js/timer.js"></script>
</head>
<body>
<script type="text/javascript">
//ajaxHandler('getquestion.php', 'question')
		process = setInterval("ajaxHandler('getquestion.php', 'question')", 1000);
</script>
	<div id="wrapper">
		<div id="header">
			<h1>
				Your Way
			</h1>
		</div>
		
		<div id="quizbody">
		
			<fieldset>
				<div>
					<a href="#" onclick="ajaxHandler('../../pages/clear.php?action=del_question', 'clear');">Clear Question</a>
					<a href="#"  onclick="ajaxHandler('../../pages/clear.php?action=cleardb', 'clear');">Clear Database</a>
					<br /><br />
					Answers from the users:
					<div id="current_question">
						<script type="text/javascript">
							process = setInterval("ajaxHandler('../../pages/getanswers.php', 'answers')", 1000);
						</script>
					</div>
				</div>
				<?php 
					$question = new Question();
					$q_arr = $question->ListQuestions();
					foreach ($q_arr as $q)
					{
				?>
					<p style="width: 500px; float: left;">
					Q - 
					<?php
						echo $q['question'];
					?>
					</p>
					<p style="width: 250px; float: left;">
						<i>Ans</i> - 
						<?php 
							echo $q['answer'];
						?>
					</p>
					
					<p style="float: right;">
						<a href="#" onclick="ajaxHandler('../../pages/setquestion.php?qid=<?php echo $q['id']; ?>', 'current_question')">Set As Current Question</a>
					</p>
				<?php
					}
				?>
				<p id="question">
					<?php
						echo $info_admin;
					?>
				</p>
				<!--
				<form action="" method="post">
					<textarea rows="15" cols="" id="txtAnswer" name="txtAnswer"></textarea>
					<br />
					<a href="#" class="myButton" onclick="ajaxHandler('../../pages/sendanswer.php?ans='+document.getElementById('txtAnswer').value, 'txtAnswer');">Submit<a/>
				</form>
				 -->
			</fieldset>
		</div>
		<div id="footer">
		<?php 
			echo "Powered by ".$tool." ".$version.", Designed by <a href='http://www.techgaun.com'>Brisha Pote</a> & Developed By <a href='http://www.techgaun.com'>Samar Dhwoj Acharya</a>";
		?>
	</div>
	</div>
</body>
</html>