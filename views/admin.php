<?php
include "../model/quiz.php";

$numLigne = filter_input(INPUT_GET, 'ligne',FILTER_SANITIZE_NUMBER_INT);
//pour ajouter questions
if($numLigne == ''){
$submitAction = "ajouter";
$question = '';

}
//pour modifier les question
else {
$submitAction = "modifier";
$question = $quiz[$numLigne]['question'];
$choix = $quiz[$numLigne]['choix'];
$nbChoix = count($choix);
$nbReponses = $quiz[$numLigne]['bonneReponse'];
$reponses = $nbReponses-1;

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
 <form action="../controllers/admin_quiz.php" method="post" id="method">
 <!-- Ajouter les questions par javascript -->	
 	<label>Question
		<input type="text" name="question" value="<?=$question?>" size="120" id="">
 	</label>
 	<?php if ($numLigne == '') { ?>
 	
 	<button type="button" id="ajouteReponse">Ajouter une réponse</button><br>
 	
 	<fieldset id="reponses">
 		<legend>Réponses</legend>
 		<!-- Afficher les question pour modifier-->
	<?php 
	 } else{
		for ($i=0; $i <$nbChoix ; $i++) { 
		echo "<input type='text' name='reponses[]' value='$choix[$i]' > size=80 required.<input type='radio' name='bonneReponse' value='$i' required><br>";

		}
		echo "<input type='hidden' name='ligne' value='$numLigne'>";
	 }?>		
	
 	</fieldset>

 	<div>
 		<button type="submit" name="submit" value="<?=$submitAction?>" >Valider</button>
 	</div>
 </form>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Ajouter les questions -->
<script>
	$('#ajouteReponse').click(function() {
		/* Act on the event */
		var nbReponses = $('#reponses input[type="text"]').length;
		$('#reponses').append(
			"<input type='text' name='reponses[]' > size=80 required"+
			"<input type='radio' name='bonneReponse' value='"+(nbReponses+1)+" 'required> <br>"
			);
	});
</script>

</body>
</html>