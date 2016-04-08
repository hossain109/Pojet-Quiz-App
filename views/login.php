<?php
    session_start();
    if (isset($_POST['submit'])) {


    $pseudo = filter_input(INPUT_POST, 'pseudo');
    $password = filter_input(INPUT_POST, 'password');

    if ($pseudo =="sohrab" and $password == "taspia") {

        $_SESSION['role']='admin';
        $_SESSION['pseudo']=$pseudo;

        header('Location:http://localhost/quizApp/controllers/admin_editer.php');
        //$response = "login ok";
    } else {
        header('Location:http://localhost/quizApp/controllers/login.php');
        
    }
}

?>


<div class=" col-md-4 col-md-offset-4">
    <form class="form" action="../controllers/login.php" method="POST">

        <div class="form-group">
            <label>Pseudo</label>
            <input type="text" name="pseudo" class="form-control" value="" required>
            
        </div>
        
         <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
            
        </div>
        <button class="btn btn-primary" name="submit" type="submit">Valider</button>
    </form>
    
    
</div>