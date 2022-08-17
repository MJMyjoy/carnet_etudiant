<?php
session_start();

         try {
         $db = new PDO('mysql:host=localhost;dbname=test', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); }
        catch (Exception $e) { 
            die('Erreur : ' . $e->getMessage()); }
        
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            // On émet une alerte à chaque fois qu'une requête a échoué.
 //On inclut le fichier s'il existe et s'il est spécifié

    $reponse = $db->query("SELECT COUNT(*) FROM ETUDIANT");
    $donnees = $reponse->fetchColumn();
    $nombre=$donnees; // On donne a nombre le nombre total d'etudiants enregistrés
    
 if (!empty($_GET['page']) && is_file($_GET['page']))
 { 
        include $_GET['page'];
    }

else
{ 
    $_SESSION['id']= NULL;
    $_GET['connect'] =0;
    include 'vues/index.php';
}

 ?>
