<?php
//output buffering
ob_start();

require '../views/admin_editer.php';
//retourne contenu du buffer
$viewContent = ob_get_clean();



require '../views/layout.php';