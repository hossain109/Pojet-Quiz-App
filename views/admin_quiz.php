<?php
include '../model/quiz.php';

$question = filter_input(INPUT_POST, 'question', FILTER_SANITIZE_STRING);
$reponses = filter_input(INPUT_POST,'reponses', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
$bonneReponse = filter_input(INPUT_POST, 'bonneReponse', FILTER_SANITIZE_NUMBER_INT);

$numLigne = filter_input(INPUT_POST, 'ligne', FILTER_SANITIZE_STRING);


$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);


if($submit=="ajouter"){

//Contrôle de la validité des saisies
$valid = true;
$valid = $valid && !empty($question);
$valid = $valid && is_array($reponses);
$valid = $valid && !(empty($bonneReponse));

if(! $valid){
    echo "Votre saisie est invalide";
    exit;
}

$fichier = 'quiz.php';
//Ajout des nouvelles données au tableau
array_push($quiz,array(
    'question' => $question,
    'choix'    => $reponses,
    'bonneReponse' => $bonneReponse
));
 }else{
     $submit = "modifier";
     $quiz[$numLigne]['question'] = $question;
     $quiz[$numLigne]['choix'] = $reponses;
     $quiz[$numLigne]['bonneReponse'] = $bonneReponse+1;


}

//Conversion du tableau en fichier php
$nbQuestions = count($quiz);
$code = "<?php";
$code .= "\n \$quiz = array(";

for($i=0; $i<$nbQuestions;$i++){
    $code .= "\n\tarray(".
            "\n\t\t'question' =>'".addslashes($quiz[$i]['question'])."',".
            "\n\t\t'choix' => array(";
    foreach($quiz[$i]['choix'] as $reponse){
        $code .= "\n\t\t\t'". addslashes($reponse)."',";
    }
    
    $code .= "\n\t\t),";
    
    $code .= "\n\t\t'bonneReponse' =>". $quiz[$i]['bonneReponse'];
    
    $code .= "\n\t),";
}

$code .= "\n);";

file_put_contents("../model/$fichier", $code);


header('location:../web/index.php');