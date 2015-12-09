<?php
		

		function ExtraireUserOnline()
		{
    			$ListeUsers = "SELECT login_user FROM utilisateurs WHERE etat_user=TRUE ORDER BY login_user DESC";
    			$connexionBDD = pg_connect("host=51.254.118.235 dbname=chat_bdd user=postgres password=postgres");
   				 $result = pg_query($connexionBDD, $ListeUsers) or die("Requête échouée !");
    			
    			while($data = pg_fetch_array($result))
    		{
        		echo "<a href='load_msg'>".$data["login_user"]."</a></br>";
    		}
		}

		function ExtraireUserOffline()
		{
    			$ListeUsers = "SELECT login_user FROM utilisateurs WHERE etat_user=FALSE ORDER BY login_user DESC";
    			$connexionBDD = pg_connect("host=51.254.118.235 dbname=chat_bdd user=postgres password=postgres");
   				 $result = pg_query($connexionBDD, $ListeUsers) or die("Requête échouée !");
    			
    			while($data = pg_fetch_array($result))
    		{
        		echo "<a href='load_msg'>".$data["login_user"]."</a></br>";
    		}
    	}


		function EtatOnline($pUser)
		{
        
        $changerEtatUserOnline="UPDATE utilisateurs SET etat_user=TRUE WHERE login_user='$pUser'";
        $connexionBDD = pg_connect("host=51.254.118.235 dbname=chat_bdd user=postgres password=postgres");
        pg_query($connexionBDD, $changerEtatUserOnline) or die("FUCK YOU");
    	
    	}

    	

    	function EtatOffline($pUser)
    	{
        
        $changerEtatUserOffline="UPDATE utilisateurs SET etat_user=FALSE WHERE login_user='$pUser'";
        $connexionBDD = pg_connect("host=51.254.118.235 dbname=chat_bdd user=postgres password=postgres");
        pg_query($connexionBDD, $changerEtatUserOffline) or die("FUCK YOU");
    	
    	}
?>
