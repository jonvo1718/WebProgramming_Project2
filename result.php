<html>
<head>
<link rel="stylesheet" href="style.css">
<title> Result </title>
</head>
<body>
	<div class="container">
	<?php
		include("common.php");
		if(strtolower($_POST["answer"])==$_SESSION["answer"]){
			echo "<p> Correct! You earned $".$_SESSION["value"]."</p>\n";
			$_SESSION["money"]+=$_SESSION["value"];
		} else{
			echo "<p> Incorrect! The correct answer is ".$_SESSION["answer"]."</p>\n";
		}
		if(questionsAnswered()){
			insertScore($_SESSION["name"],$_SESSION["money"]);
			echo '
			<p> You have answered every question! </p>
			<form action="leaderboard.php" method="post">
				<input type="submit" value="Proceed to Leaderboard">
			</form>
			';
		} else{
			echo '
			<form action="grid.php" method="post">
				<input type="submit" value="Back to Question Select">
			</form>
			';
		}
	?>
	</div>
</body>
</html>