<!DOCTYPE html>
<body>
<div>
        <span><h1>Bonjour !</h1></span>
        <br>
        <form action="" method="post">
              <input type="text" name="adresseMail" placeholder="Adresse mail"><br>
              <input type="password" name="mdp" placeholder="Mot de passe"><br>
              <input type="submit" value="Valider"/>
        </form><br>
    </div>

<?php
session_start();
if(isset($_POST['submit'])){
if(isset($_POST['adresseMail']) && isset($_POST['mdp']))
{
    // connexion à la base de données
    $db_username = 'bitnami';
    $db_password = 'mdpdebian';
    $db_name     = 'workshop';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('Connexion à la bdd impossible');
    

    $adresseMail = htmlspecialchars(trim($_POST['adresseMail'])); 
    $mdp = htmlspecialchars(trim($_POST['mdp']));
    
    if($adresseMail !== "" && $mdp !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur WHERE 
              adresseMail = '".$adresseMail."' and mdp = '".$mdp."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['adresseMail'] = $adresseMail;
           echo "Bienvenue";
           header('Location: ../../index.php');
        }
        else
        {
           header('Désolé, utilisateur ou mot de passe incorrect'); 
        }
    }
    else
    {
       header('Un de vos champs est vide');
    }
}
else
{
  header('Bug');
}
}
mysqli_close($db); // fermer la connexion
?>
</body>
</html>