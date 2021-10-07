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
	<link
		href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
</head>

<body>
	<section id="banner">
		<header>
			<div class="shape">
				<div class="logo">
					<img src="images/logo_simplifié.png">
				</div>
				<nav>
					<ul>
						<li><a href="index.html#ancre-quisommesnous">Qui sommes Nous?</a></li>
						<li><a href="#">Nos Services</a>
							<ul class="nav-has-dropdown">
								<li><a href="formation.html">Formation</a></li>
								<li><a href="logement.html">Logement</a></li>
								<li><a href="aide.html">Aide</a></li>
							</ul>
						</li>
						<!--<li><a href="#">Contacts</a></li>-->
						<li><a href="#ancre-contact">Nous Contacter</a></li>
						<li><a href="signin.html">Sign In</a></li>
					</ul>
				</nav>
			</div>
		</header>
	</section>

	<section id="Contact">
		<div id="ancre-contact" class="shape">
			<div class="contact-header">
				<h1>Formulaire d'inscription</h1>
				<h2> Vous êtes déjà inscrit ? <a href="signin.php">Cliquez ici !</a></h2>
			</div>
			<div class="Form">
				<form>
					<label>Votre nom :</label>
					<div class="inp">
						<input type="text" spellcheck="true" required="true" name="nom">
					</div>
					<label>Votre prénom :</label>
					<div class="inp">
						<input type="text" spellcheck="true" required="true" name="prenom">
					</div>
					<label>Votre âge :</label>
					<div class="inp">
						<input type="text" spellcheck="true" required="true" name="age">
					</div>
					<label>Votre numéro de téléphone :</label>
					<div class="inp">
						<input type="text" spellcheck="true" required="true" name="telephone">
					</div>
					<label>Votre adresse email :</label>
					<div class="inp">
						<input type="email" spellcheck="true" required="true" name="adresseMail">
					</div>
					<label>Votre ville :</label>
					<div class="inp">
						<input type="text" spellcheck="true" required="true" name="ville">
					</div>
					<label>Votre groupe :</label>
					<div class="inp">
						<input type="text" spellcheck="true" required="true" name="groupe">
					</div>
					<label>Votre mot de passe :</label>
					<div class="inp">
						<input type="password" spellcheck="true" required="true" name="mdp">
					</div>
					<label>Sexe :</label>
					<label> Êtes-vous : </label>
                    <div class="inp">
                        <select name="sexe" required="true">
                            <option value="woman">Une femme</option>
                            <option value="man">Un homme</option>
                            <option value="other">Autre</option>
                        </select>
                    </div>
					<div class="btn">
						<input type="submit" value="Je m'inscris !">
					</div>
				</form>
			</div>
		</div>
	</section>

<?php
    /* page: inscription.php */
//connexion à la base de données:
require('../config.php');

try{
    $bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'bitnami', 'mdpdebian');
}catch (Exception $e){
    echo "Not OK";
}


//traitement du formulaire:
    if (isset($_POST['submit']))
    {
    
   $nom = htmlspecialchars(trim($_POST['nom']));
   $prenom = htmlspecialchars(trim($_POST['prenom']));
   $age = htmlspecialchars(trim($_POST['age']));
   $ville = htmlspecialchars(trim($_POST['ville']));
   $telephone = htmlspecialchars(trim($_POST['telephone']));
   $adresseMail = htmlspecialchars(trim($_POST['adresseMail']));
   $groupe = htmlspecialchars(trim($_POST['groupe']));
   $mdp = htmlspecialchars(trim($_POST['mdp']));
   $sexe = htmlspecialchars(trim($_POST['sexe'])); 
   
   if($adresseMail && $mdp && $nom && $groupe && $ville && $prenom && $age && $telephone && $sexe){

    $query = "INSERT INTO utilisateur (nom, prenom, age, ville, telephone, adresseMail, groupe, mdp, sexe) VALUES ('$nom', '$prenom', '$age', '$ville', '$telephone', '$adresseMail', '$groupe', '$mdp', '$sexe')";
    
    $bdd->exec($query);

    if($bdd->connect_error)){
        echo "Message Erreur", $bdd->error_reporting;
        
    }

   }else echo "C'est non";
}
 ?>
</body>
</html>