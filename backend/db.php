<?php
   $db_name = "bdpersonne";
   $db_server = "127.0.0.1";
   $db_user = "root"; 
   $db_pass = "passer";

   try {
       $db = new PDO("mysql:host={$db_server};dbname={$db_name};charset=utf8", $db_user, $db_pass);
       $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
       echo "Erreur de connexion : " . $e->getMessage();
   }
?>
