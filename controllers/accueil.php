<?php
//output buffer
ob_start();

require '../views/accueil.php';

//retourne contenu du buffer
$viewContent = ob_get_clean();



require '../views/layout.php';

?>