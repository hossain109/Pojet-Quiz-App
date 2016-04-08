<?php
include "../model/quiz.php";
$nbQuestion = count($quiz);

?>


<!DOCTYPE html>
<html>
<head>
	<title>quiz</title>
</head>
<body>
<form method="post" action="../controllers/resultat_quiz.php">
  <ol>
	<!--liste des question -->
	<?php if($nbQuestion != 0){ ?>
	<?php for($i=0;$i<$nbQuestion;$i++): ?>
		<div>
		
			<h2><li><?= $quiz[$i]['question']; ?></li></h2>
			<!--<?php echo $quiz[$i]['question']; ?>-->
			
			<?php 
			$choix = $quiz[$i]['choix'];
			$nbChoix = count($choix);
			for ($k=0; $k <$nbChoix ; $k++):
				?>
			<input type="radio" name="reponseQuestion[<?=$i?>]"
								value="<?=$k+1?>"
			></input>

			<?= $choix[$k] ?><br>
		<?php endfor; ?>
	</div>
<?php endfor; ?>
<br>
<div>
	<button type="submit">Valider</button>
</div>
<?php }?>
</ol>
</form>
</body>
</html>