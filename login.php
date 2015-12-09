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
    <link rel="stylesheet" type="text/css" href="/0/css/styles.css">
    <title>Security-Hub</title>
</head>
<body link="#C0C0C0" vlink="#808080">    
    
<form action="index.php" method="POST" name="formulaire_connexion">


            <div class="form" id='table'><br>
                <center> <img src='/0/img/login-flat.png' height='35' width="35"></center>
                <input type="text" style="text-align: center" placeholder="Nom d'utilisateur" id="tbx_LoginConnection" name="NomUtil">

                    <input type="password" style="text-align:center" placeholder="Mot de passe" id="tbx_MdpConnection" name="MP"> 
                        <div id="resultat" style="color: red; text-align: center"><font size="-1"><?php echo $msg; ?>
                            <?php 
    if(isset($MsgErr)==true)
    {
        echo $MsgErr . "<br>";
    }
    else{
        echo "<br>";
    }
    ?>
    </div>
                        </font></div>


                        <td align="center">
                            <input name="Action" type="hidden" value="VerifLogin">

                            <input type="submit" value="Valider" id="btn_ValiderLogin" >  

                                <input type="button" value="Annuler" id="reset" onclick="boutonAnnuler();">
                                    </td>
                                    <br>
                                            <td colspan="3">
                                                <font size="-2"> <center><br>
                                                        <a></a>
                                                        <a href="pageInscription.php">Inscription</a>
                                                        <a></a>
                                                    </center></font>
                                            </td>
                                            </div>
                                            </form>
    
</body>
                                                <script>
                                                function boutonAnnuler() {
                                                    document.getElementById("utilisateur").value = "";
                                                    document.getElementById("mdp").value = "";
                                                }
                                                </script>
</html>
