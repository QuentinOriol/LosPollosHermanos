<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    
    <title>Inscription</title>
</head>
<body link="#C0C0C0" vlink="#808080">
    <div id="formulaire_inscription">
	
        <form name="formulaire_inscription" if="frm_Inscription" method="post" action="#">
            <input type="text" name="user" id="tbx_Login" placeholder="Nom d'utilisateur"  style="text-align: center">
            <input type="password" name="mdp" id="tbx_Mdp" placeholder="Mot de passe"  style="text-align: center">
            <input type="password" name="mdp_verif" id="tbx_MdpVerif" placeholder="Retapez votre mot de passe" style="text-align: center"><br>
	       



<font size="-2"> <center><br>
   <?php

if(isset($_POST['user']) && isset($_POST['mdp']))
{
    if($_POST['user'] == '')
    {
        echo "Le champ login n'est pas rempli !";
    }
    else
    {
        if($_POST["mdp"] == '')
        {
            echo "Le champ mot de passe n'est pas rempli !";
        }
        else
        {
           if($_POST['mdp'] == $_POST['mdp_verif'])
    {
    $login = pg_escape_string($_POST['user']);
    $mdp = pg_escape_string($_POST['mdp']);
    $mdp_verif = pg_escape_string($_POST['mdp_verif']);
    
    
    $arrayInscription = array(
      ':login' => $login,
      ':motdepasse' => $mdp
    );

    try
    {
    //On execute la requete qui verifie si le login et le mdp existent dans la base de données , Retourne 1 si oui 
    $VerifierExistanceContact = "SELECT COUNT(*) AS uservalide FROM utilisateurs WHERE login_user='$login'";
    $connexionBDD = pg_connect("host=51.254.118.235 dbname=chat_bdd user=postgres password=postgres");
    $result = pg_fetch_array(pg_exec($connexionBDD,$VerifierExistanceContact));
    $rows = $result['uservalide'];
    
    
    if($rows == 1)
    {
        echo "Ce pseudo est deja utilisé, veuillez en choisir un autre !";
    }
    else
    {
    /*CONNEXION EN PDO
            $db = new PDO("pgsql:host=51.254.118.235;dbname=chat_bdd", "postgres", "postgres");
            echo "Connexion reussie !";
            $query = $db->prepare("INSERT INTO utilisateurs(login_user,mdp_user) VALUES (:login,:motdepasse);");
            $query = $db->execute($arrayInscription);
            echo "T'est un boss t'es inscrit $login! ";*/
    
    $InsererNouveauContact = "INSERT INTO utilisateurs(login_user,mdp_user) VALUES ('$login','$mdp');";
    pg_exec($connexionBDD,$InsererNouveauContact);
    echo "Inscription réussie ! Bienvenue a toi $login :)";
    }
    
    }

    catch(PDOException $e)
    {
        $e->getMessage();
    }
    }
    else
    {
    echo "Les deux mots de passes ne sont pas identiques.";
    } 
        }
    }
    
}

?>
</center></font>
<br><td align="center">
            
    

    <input type="submit" value="Valider" id="btn_ValiderInscription">
            <input type="button" value="Annuler" id="reset" onclick="boutonAnnuler();">
</td>
<td colspan="3">
                                                <font size="-2"> <center><br>
                                                        <a href=""></a>
                                                        <a href="login.php">Se connecter</a>
                                                        <a href=""></a>
                                                    </center></font>
                                            </td>

        </form>
    </div>

</body>
</html>
