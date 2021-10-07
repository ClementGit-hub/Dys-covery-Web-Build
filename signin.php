<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="device=width-device">
    <meta name="description" content="Affordable Web Development, Professional Web Development">
    <meta name="keyword" content="Wev Development, Web Design">
    <meta name="author" content="Alexandre Anania, Programmer and Developer">
    <title>Dys-covery</title>
    <link rel="stylesheet" type="text/css" href="forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <section id="banner">
        <header>
            <div class="shape">
                <a href="index.html">
                <div class="logo">
                    <img src="Images/logo1.png"></a>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.html#ancre-quisommesnous">Qui sommes Nous?</a></li>
                        <li><a href="#">Nos Services</a>
                            <ul class="nav-has-dropdown">
                                <li><a href="Formation.html">Formation</a></li>
                                <li><a href="Logement.html">Logement</a></li>
                                <li><a href="Aide.html">Aide</a></li>
                            </ul>
                        </li>
                        <!--<li><a href="#">Contacts</a></li>-->
                        <li><a href="index.html#ancre-contact">Nous Contacter</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </section>

    <section id="Contact">
        <div id="ancre-contact" class="shape">
            <div class="contact-header">
                <h1>Formulaire de connexion</h1>
                <h2> Vous n'êtes pas encore inscrit ? <a href="inscription.php">Cliquez ici !</a></h2>
            </div>
            <div class="Form">
                <form>
                    <label for="email">Votre adresse email :</label>
                    <div class="inp">
                        <input type="email" spellcheck="true" required="true" id="email">
                    </div>
                    <label for="password">Votre mot de passe :</label>
                    <div class="inp">
                        <input type="password" spellcheck="true" required="true" id="password">
                    </div>
                    <div class="btn">
                        <input type="submit" value="Je me connecte !">
                    </div>
                </form>
            </div>
        </div>
    </section>

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

</html>