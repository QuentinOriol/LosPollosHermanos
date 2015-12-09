<?php
require 'menu.php';

$contenu = $_POST['tbx_msg'];
$user = $_SESSION['login'];

$InsererMessageBdd = "INSERT INTO messages(message_user, message_contenu) VALUES ('$user','$contenu');";
$connexionBDD = pg_connect("host=51.254.118.235 dbname=chat_bdd user=postgres password=postgres");
pg_exec($connexionBDD, $InsererMessageBdd);
echo "Message enregistrer !";

?>
