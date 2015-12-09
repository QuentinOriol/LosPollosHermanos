<?php

include 'var.php';

$user="Quentin";
 $changerEtatUserOffline="UPDATE utilisateurs SET etat_user=FALSE WHERE login_user='$user'";
        $connexionBDD = pg_connect("host=51.254.118.235 dbname=chat_bdd user=postgres password=postgres");
        pg_query($connexionBDD, $changerEtatUserOffline) or die("FUCK YOU");
session_start();
session_unset();
session_destroy();

header("location:index.php"); 
