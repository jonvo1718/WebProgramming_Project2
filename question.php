<html>
<head>
<link rel="stylesheet" href="style.css">
<title> Question </title>
</head>
<body>
	<div class="container">
		<?php
			include("common.php");
			$num=$_GET["num"];
			$_SESSION["grid"][$num]=0;
			$question=getQuestion($num);
			$_SESSION["answer"]=$question[1];
			$num-=$num%5;
			$num/=5;
			$num+=1;
			$num*=100;
			$_SESSION["value"]=$num;
			echo $question[0];
			echo '
			<form action="result.php" method="post">
				<input type="text" name="answer" required>
				<input type="submit" value="Submit Answer">
			</form>
			';
		?>
	</div>
</body>
</html>