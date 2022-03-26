<html>
<head>
<link rel="stylesheet" href="style.css">
<title> Leaderboard </title>
</head>
<body>
	<div class="container">
		<?php
			include("common.php");
			printScores();
		?>
		<div class="clear">
			<form action="start.php" method="post">
				<input type="submit" value="Restart" class="button" id="return">
			</form>
		</div>
	</div>
</body>
</html>