<?php
	session_start();
	function printGrid(){
		$grid=$_SESSION["grid"];
		$str="";
		for($x=0;$x<5;$x++){
			$str.="<tr>\n";
			for($y=0;$y<5;$y++){
				$str.="<td>";
				if($grid[(($x*5)+$y)]==1){
					$str.='
					<form action="question.php" method="get">
						<input type="hidden" name="num" value="'.(($x*5)+$y).'">
						<input type="submit" value="$'.($x+1).'00" class="button">
					</form>
					';
				} else{
					$str.=" DONE ";
				}
				$str.="</td>";
			}
			$str.="</tr>";
		}
		echo '
		<table>
            <tr>
                <td>Math</td>
                <td>Comp Sci</td>
                <td>Literature</td>
                <td>Geometry</td>
                <td>History</td>
            </tr>
			'.$str.'
        </table>
		';
	}
	
	function getQuestion($num){
		$file=file_get_contents("questions.txt");
		$questions=explode(",",$file);
		$question=explode("?",$questions[$num]);
		return $question;
	}
	
	function questionsAnswered(){
		foreach($_SESSION["grid"] as $n){
			if($n==1){
				return false;
			}
		}
		return true;
	}
	
	function readScores(){
		$file=file_get_contents("scores.txt");
		$scores=explode(",",$file);
		for($i=0;$i<count($scores);$i++){
			$scores[$i]=explode(".",$scores[$i]);
		}
		return $scores;
	}
	
	function writeScores($scores){
		$str="";
		$count=count($scores);
		for($i=0;$i<$count;$i++){
			for($j=0;$j<2;$j++){
				$str.=$scores[$i][$j];
				if($j<1){
					$str.=".";
				}
			}
			if($i<$count-1){
				$str.=",";
			}
			$str.="\n";
		}
		file_put_contents("scores.txt",$str);
	}
	
	function insertScore($name,$money){
		$scores=readScores();
		$count=count($scores);
		$scores[$count]=array($name,$money);
		$pos=$count;
		for($i=$count-1;$i>=0;$i--){
			if($scores[$i][1]<$money){
				$temp=$scores[$i];
				$scores[$i]=$scores[$pos];
				$scores[$pos]=$temp;
				$pos=$i;
			}
		}
		writeScores($scores);
	}
	
	function printScores(){
		$scores=readScores();
		$count=count($scores);
		echo "<ol id=\"names\">\n";
		for($i=0;$i<$count;$i++){
			echo "\t<li>".$scores[$i][0]."</li>\n";
		}
		echo "</ol>\n<dl id=\"scores\">\n";
		for($i=0;$i<$count;$i++){
			echo "\t<dt>".$scores[$i][1]."</dt>\n";
		}
		echo "</dl>\n";
	}
?>