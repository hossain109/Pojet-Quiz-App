<?
include "../model/quiz.php";
//var_dump($_POST);

$reponses = filter_input(INPUT_POST,
 						'reponseQuestion',
 						FILTER_SANITIZE_NUMBER_INT,
 						FILTER_REQUIRE_ARRAY
	);	
//controle pour repondre tous les questions
if (!is_array($reponses)) {

	echo "La réponse est inexploitable";

	echo "</br><h3><a href='accueil.php'>Retour aux Questions.</a></h3>";

}else{		
$nbQuestion = count($quiz);
$nbReponse = count($reponses);

if ($nbQuestion != $nbReponse) {
	// envoyer le maessage d'erreur en Flash avec redirection vers quiz_reponse.php
	echo "vous devez répondre à toutes les question";
	echo "</br><h3><a href='accueil.php'>Retour aux Questions.</a></h3>";

}else{
$score = 0;
$html = "<ol>";

for ($i=0; $i <$nbQuestion ; $i++) { 
//compter score et mettre le coulour par rapport reponse
 	if ($quiz[$i]['bonneReponse'] == $reponses[$i]){
 		$score = $score+1;
 		$colour = 'green';
 	}else{
 		$colour = 'red';
 	}

  $html .= "<li style = 'color:$colour;'>question ".($i+1)." : ".
  			$quiz[$i]['question']."<br>".
  			"votre réponse: ". $quiz[$i]['choix'][$reponses[$i]-1]."<br>".
  			"la bonne réponse : ".$quiz[$i]['choix'][$quiz[$i]['bonneReponse']-1]."</li>";
 } 
 $html .= "</ol>";

 echo "<h2>Vous avez $score bonne réponse sur  $nbQuestion</h2> $html";
}
 }

?>