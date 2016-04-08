<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Quiz</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container-fluid">

<header>
    <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../controllers/accueil.php">Quiz</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><p class="navbar-text">Bienvenue sur Quiz</p>
   <ul class="nav navbar-nav navbar-right">
          <?php

          if(isset($_SESSION['role'])){
              echo "<li class='navbar-text'>"."Bonjour ".$_SESSION['pseudo']."</li>";
                echo "<li><a href='../controllers/admin.php'>Ajout Question</a></li>";
                echo "<li><a href='../controllers/admin_editer.php'>Modifier Question</a></li>";
                 echo "<li><a href='../controllers/logout.php'>Deconnexion</a></li>";
              
          }  else {
              echo "<li><a href='../controllers/login.php'>Admin</a></li>";
          }
          ?>
        <li><a href="../controllers/about.php">About</a></li>
      </ul>

    </div>
  </div>
</nav>
</header>

<section class="row" style="margin-top:50px;min-height:350px;">
    <?php echo $viewContent; ?>
</section>

<blockquote>
  <p class="text-center">Tous les droits réservés pour admin.</p>
</blockquote>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>