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
<div>
  <ol>
	<!--liste des question -->
	<?php for($i=0;$i<$nbQuestion;$i++): ?>
		<div>
		
			<h2><li><?= $quiz[$i]['question']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href='../controllers/suppression.php?ligne=<?=$i?>'>Supprimer</a>
        &nbsp;&nbsp;<a href='../controllers/admin.php?ligne=<?=$i?>'>Modifier</a>



			</li></h2>
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

</ol>
</div>
</body>
</html>