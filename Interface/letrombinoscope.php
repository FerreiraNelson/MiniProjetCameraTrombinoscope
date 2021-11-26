<?php
//RECHERCHER LA VALEUR DU MDP ET USERNAME INSERER LORS DE LA CONNEXION

 $mysqli = new mysqli('172.20.21.21', 'root', '','espace_client');
// $req= "select pseudo, mdp from utilisateur";
// $res= $mysqli-> query($req);
// $rep= $res-> fetch_assoc();
if(isset($_POST['validForm'])){
//REPONSE DE LA BASE DE DONNEE
$username=$_POST['username'];
$password=$_POST['psw'];
// $email= $_POST['email'];
// $prenom= $_POST['prenom'];
// $nom= $_POST['nom'];
$req= "select nom, prenom from utilisateur where pseudo='$username' and mdp='$password'";
$res= $mysqli-> query($req);
//echo $req;
//VERIFIER SI MDP OU/ET USER DEJA UTILISE
if($res-> num_rows != 0){
$rep= $res-> fetch_assoc();
$nom=$rep['nom'];
$prenom=$rep['prenom'];
echo "Connexion établie. Bienvenu " .$nom . " " .$prenom ."<br>";
} 
else {
	echo "Ce pseudo ".$username ." ainsi que, ce mot de passe ".$password ." ,sont déja attiribués ou n'existent pas."."<br>";
}


//MDP OU UTILISATEUR NON RENSEIGNER
if(empty($username) or empty($password)){
	echo "Aucun pseudo et/ou mot de passe saisi";
}
else {
	echo "Le pseudo est: ".$username ."<br>" ."Le mot de passe est: ".$password ."<br>" ;
}
}
//RECUPERER DONNEE DU FORMULAIRE
if (isset($_POST['connexion'])){
$user = $_POST['username'];
$mdp = $_POST['psw'];
$req = "selct nom, prenom from utilisateur where pseudo= $user and mdp= $mdp";
$rep= $res-> fetch_assoc();
$res= $mysqli-> query($req);
}

//ANALYSE DU FORMULAIRE + INSERTION DE NOUVEL UTILISATEUR
foreach($_POST as $cle => $valeur){
	$$cle = $valeur;
}
if (isset($inscription)){
	$username=$_POST['username'];
	$req = "select idutilisateur from utilisateur where pseudo='$username' ";
	$res = $mysqli -> query($req);
	if(($res->num_rows)==0)
		{
		//INSERER UN UTILISATEUR
		$req = "insert into utilisateur(nom, prenom, email, naissance, pseudo, mdp) values('$lname','$fname','$email','$birthday','$username','$psw1')";
		$mysqli -> query($req);
		echo "inscription réussi"."<br>";
		}else 
		{
	echo "Erreur, pseudo déja utilisé"."<br>";
		}
}
?>