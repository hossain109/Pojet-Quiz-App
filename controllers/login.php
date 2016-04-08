<?php
//output buffering
ob_start();

require '../views/login.php';
 //retourne contenu du buffer
$viewContent = ob_get_clean();



require '../views/layout.php';

?>