<?php
//output buffering
ob_start();

require '../views/admin.php';
//retourne contenu du buffer  
$viewContent = ob_get_clean();



require '../views/layout.php';

?>