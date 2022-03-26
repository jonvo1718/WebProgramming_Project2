<?php
	session_start();
	$_SESSION["grid"]=array(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
	$_SESSION["money"]=0;
	$_SESSION["name"]="";
	$_SESSION["count"]=0;
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title> Start Page </title>
</head>
<body>
	<div class="container">
		<h1> Welcome to Jeopardy </h1>
		<form action="grid.php" method="get">
			<input type="text" name="name" required>
			<input type="submit" value="Start Game!">
		</form>
	</div>
</body>
</html>