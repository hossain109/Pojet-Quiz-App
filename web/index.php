<?php
//page index par default index
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

if (empty($page)) {

	$page = 'accueil';
}

$fileName = "../controllers/$page.php";

if (file_exists($fileName)){

    require $fileName;

} else {

   echo "Page n'existe pas";

}

?>