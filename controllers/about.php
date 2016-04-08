<?php
//output buffering
ob_start();
echo "<div style = 'text-align:center; hieght:700px;' >";
echo "<b>HOSSAIN Mohammad Sohrab</b><br>Concepteur Developpeur Informatique<br>M2I &nbsp; Paris 75012";
echo "</div>";
//retourne contenu du buffer 
$viewContent = ob_get_clean();


require '../views/layout.php';

?>