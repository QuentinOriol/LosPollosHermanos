<?php


//On verifie si les champs ne sont pas vides
if(isset($_POST['NomUtil']) && isset($_POST['MP']))
{
    //On recupère les variables de login entrée par l'utilisateur
    $login_user = pg_escape_string($_POST['NomUtil']);
    $mdp_user = pg_escape_string($_POST['MP']);
    
    //On execute la requete qui verifie si le login et le mdp existent dans la base de données , Retourne 1 si oui 
    $VerifierExistanceContact = "SELECT COUNT(*) AS uservalide FROM utilisateurs WHERE login_user='$login_user' AND mdp_user='$mdp_user'";
    $connexionBDD = pg_connect("host=51.254.118.235 dbname=chat_bdd user=postgres password=postgres");
    $result = pg_fetch_array(pg_exec($connexionBDD,$VerifierExistanceContact));
    $rows = $result['uservalide'];
    
    //Si Login et mdp existent on envoi vers la page de menu
    if($rows == 1)
    {
        $_SESSION['login']=$login_user;
        EtatOnline($login_user);
        include("menu.php");
    }
    //Si les logs ne sont pas bon message d'erreur et il reste sur page de connexion
    else
    {
	//On passe la variable de session a 0 car connexion echouée
        $_SESSION['login']=0;
        $MsgErr='Les identifiants ne sont pas correct ! Reessayer.';
        include('login.php');
    }
    
}
else
{
    $_SESSION['login']=0;
    $MsgErr='Le login n\'est pas correct';
    include('login.php');
    
}




?>
