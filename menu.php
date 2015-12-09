
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript" src="js/vars.js"></script>
    <title>Security-Hub</title>
               
</head>
<body link="#C0C0C0" vlink="#808080">    

        <div id="logout" name="logout" style="font:icon"><center>        
            <?php
            $logout = " <br> <center> <a href='deconnexion.php' ><img src='img/logout.png' height='25' width='25' alt='Deconnexion'></a></center>";
            echo $logout;
            echo $_SESSION['login'];
            ?>
            <b> Logout</b>   
        </center></div>

        <div id="lst_users" name="lst_users">
            <br><hr><br>
            Qui est en ligne ? <br>
            <?php
                ExtraireUserOnline();
            ?>           
            <br><hr><br>
            <i>Hors-ligne</i> <br>
            <?php
                ExtraireUserOffline();
            ?>
            <hr><br><br>

        </div>
        </body>
        <div id="messages" name="messages">
            <?php 
            //A changer seulement pour test de message
            $AfficherListeMessage = "SELECT message_id,message_user,message_contenu FROM messages ORDER BY message_id ASC";
            $connexionBDD = pg_connect("host=51.254.118.235 dbname=chat_bdd user=postgres password=postgres");
            $result = pg_query($connexionBDD, $AfficherListeMessage) or die("Requête échouée !");
            while($data = pg_fetch_array($result))
            {
                echo "Nom d'utilisateur : ".$data['message_contenu']."</br></br>";
            }

            ?>
        </div>
        <div id="div_msg" name="div_msg">
            <input type="text" style="text-align: left" placeholder="Entrez votre message.." id="tbx_msg" name="tbx_msg">
            <input type="button" style="text-align: center" value="Envoyer" id="btn_chat" name="btn_chat" onclick="callScriptEnregistrerMessage('save_msg.php','tbx_msg')">
        </div> 
</html>
