<html>
<head>
<link rel="stylesheet" href="style.css">
<title> Grid </title>
</head>
<body>
	<div class="container">
		<div class="content">
			<?php
				include("common.php");
				if($_SESSION["count"]==0){
					$_SESSION["name"]=$_GET["name"];
					$_SESSION["count"]++;
				}
				echo "<h2>Name: ".$_SESSION["name"]."<br>Money: $".$_SESSION["money"]."</h2>";
			?>
		</div>
	<?php
		printGrid();
	?>
</body>
</html>