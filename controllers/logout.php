<?php

session_start();
 session_destroy();
 //redirection
 header('Location:http://localhost/quizApp/controllers/accueil.php');
?>