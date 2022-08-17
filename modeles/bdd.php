
 <?php

 function rechercher($nom)
 {    
  global $db;

   $etudiants = array();
 
 $reponse = $db->query("SELECT e.Id_etudiant, e.nom_etudiant, e.post_nom_etudiant, e.prenom_etudiant, e.biographie_etudiant,
 DATE_FORMAT(e.date_naissance_etudiant, '%d/%m/%Y') AS date_n,
 DATE_FORMAT(e.date_enregistrement, '%d/%m/%Y') AS date_e, e.logine, e.mot_de_passe,
  e.promotion_etudiant, e.filiere_promotion, p.Id_promotion, p.class_promotion, 
 f.Id_filiere, f.Nom_filiere, f.Descriptions, DATE_FORMAT(f.date_creation, '%d/%m/%Y') AS date_f  
 FROM ETUDIANT e, PROMOTION p, FILIERE f
 WHERE e.promotion_etudiant=p.Id_promotion  AND e.filiere_promotion=f.Id_filiere
 AND (e.nom_etudiant=$nom OR e.post_nom_etudiant = $nom OR e.prenom_etudiant = $nom)
 ORDER BY e.nom_etudiant");

      $donnees = $reponse->fetchAll();
       $etudiants= $donnees;
 
       return $etudiants; 
}


 function afficher()
 {    
  global $db;

   $etudiants = array();
 
 $reponse = $db->query("SELECT e.Id_etudiant, e.nom_etudiant, e.post_nom_etudiant, e.prenom_etudiant, e.biographie_etudiant,
 DATE_FORMAT(e.date_naissance_etudiant, '%d/%m/%Y') AS date_n,
 DATE_FORMAT(e.date_enregistrement, '%d/%m/%Y') AS date_e, e.logine, e.mot_de_passe,
  e.promotion_etudiant, e.filiere_promotion, p.Id_promotion, p.class_promotion, 
 f.Id_filiere, f.Nom_filiere, f.Descriptions, DATE_FORMAT(f.date_creation, '%d/%m/%Y') AS date_f  
 FROM ETUDIANT e, PROMOTION p, FILIERE f
 WHERE e.promotion_etudiant=p.Id_promotion  AND e.filiere_promotion=f.Id_filiere
 ORDER BY e.nom_etudiant");

    $donnees = $reponse->fetchAll(); 
    $etudiants= $donnees;

 return $etudiants; 
}


function grouper_date()
 {    
  global $db;

   $etudiants = array();
 
 $reponse = $db->query("SELECT e.Id_etudiant, e.nom_etudiant, e.post_nom_etudiant, e.prenom_etudiant, e.biographie_etudiant,
 DATE_FORMAT(e.date_naissance_etudiant, '%d/%m/%Y') AS date_n,
 DATE_FORMAT(e.date_enregistrement, '%d/%m/%Y') AS date_e, e.logine, e.mot_de_passe,
  e.promotion_etudiant, e.filiere_promotion, p.Id_promotion, p.class_promotion, 
 f.Id_filiere, f.Nom_filiere, f.Descriptions, DATE_FORMAT(f.date_creation, '%d/%m/%Y') AS date_f  
 FROM ETUDIANT e, PROMOTION p, FILIERE f
 WHERE e.promotion_etudiant=p.Id_promotion  AND e.filiere_promotion=f.Id_filiere
 GROUP BY e.date_enregistrement");

        $donnees = $reponse->fetchAll();
       $etudiants= $donnees;

 return $etudiants; 
}


function grouper_filiere()
 {    
  global $db;

   $etudiants = array();
 
 $reponse = $db->query("SELECT e.Id_etudiant, e.nom_etudiant, e.post_nom_etudiant, e.prenom_etudiant, e.biographie_etudiant,
 DATE_FORMAT(e.date_naissance_etudiant, '%d/%m/%Y') AS date_n,
 DATE_FORMAT(e.date_enregistrement, '%d/%m/%Y') AS date_e, e.logine, e.mot_de_passe,
  e.promotion_etudiant, e.filiere_promotion, p.Id_promotion, p.class_promotion, 
 f.Id_filiere, f.Nom_filiere, f.Descriptions, DATE_FORMAT(f.date_creation, '%d/%m/%Y') AS date_f  
 FROM ETUDIANT e, PROMOTION p, FILIERE f
 WHERE e.promotion_etudiant=p.Id_promotion  AND e.filiere_promotion=f.Id_filiere
 GROUP BY f.Id_filiere");

       $donnees = $reponse->fetchAll();
       $etudiants= $donnees;

   return $etudiants; 
}


function grouper_promotion()
 {    
  global $db;

   $etudiants = array();
 
 $reponse = $db->query("SELECT e.Id_etudiant, e.nom_etudiant, e.post_nom_etudiant, e.prenom_etudiant, e.biographie_etudiant,
 DATE_FORMAT(e.date_naissance_etudiant, '%d/%m/%Y') AS date_n,
 DATE_FORMAT(e.date_enregistrement, '%d/%m/%Y') AS date_e, e.logine, e.mot_de_passe,
  e.promotion_etudiant, e.filiere_promotion, p.Id_promotion, p.class_promotion, 
 f.Id_filiere, f.Nom_filiere, f.Descriptions, DATE_FORMAT(f.date_creation, '%d/%m/%Y') AS date_f  
 FROM ETUDIANT e, PROMOTION p, FILIERE f
 WHERE e.promotion_etudiant=p.Id_promotion  AND e.filiere_promotion=f.Id_filiere
 GROUP BY p.Id_promotion");

        $donnees = $reponse->fetchAll();
       $etudiants= $donnees;

 return $etudiants; 
}




function recuperer($id)
 {    
  global $db;

   $etudiant = array();
 
 $reponse = $db->query("SELECT e.Id_etudiant, e.nom_etudiant, e.post_nom_etudiant, e.prenom_etudiant, e.biographie_etudiant,
 DATE_FORMAT(e.date_naissance_etudiant, '%d/%m/%Y') AS date_n,
 DATE_FORMAT(e.date_enregistrement, '%d/%m/%Y') AS date_e, e.logine, e.mot_de_passe,
  e.promotion_etudiant, e.filiere_promotion, p.Id_promotion, p.class_promotion, 
 f.Id_filiere, f.Nom_filiere, f.Descriptions, DATE_FORMAT(f.date_creation, '%d/%m/%Y') AS date_f  
 FROM ETUDIANT e, PROMOTION p, FILIERE f
 WHERE e.promotion_etudiant=p.Id_promotion  AND e.filiere_promotion=f.Id_filiere
 AND e.Id_etudiant=$id");
 
      $donnees = $reponse->fetch();
       $etudiant = $donnees;

       return $etudiant; 
  }




 function enregistrer()
 {
  global $db;

if ($_POST['promotion']=='1' OR $_POST['promotion']=='2')
{
  $_POST['filiere'] = '';
}
 $req = $db->prepare('INSERT INTO ETUDIANT VALUES(\'\',?,?,?,?,?,NOW(),?,?,?,?)');
    $req->execute(array($_POST['nom_etudiant'], $_POST['post_nom_etudiant'], $_POST['prenom_etudiant'],
    $_POST['biographie_etudiant'], $_POST['date_naissance_etudiant'], $_POST['promotion'], $_POST['logine'],
    $_POST['mot_de_passe'], $_POST['filiere']));
  }


  function modifier($id)
  {
    global $db;

    $rep = $db->query("SELECT id_etudiant, nom_etudiant, post_nom_etudiant, prenom_etudiant, 
    biographie_etudiant, date_naissance_etudiant, mot_de_passe, promotion_etudiant, filiere_promotion,
    FROM ETUDIANT WHERE id_etudiant=$id");
    
         $donnee = $rep->fetch();

    if(!isset($_POST['nom_etudiant']))
    {
      $_POST['nom_etudiant']=$donnee['nom_etudiant'];
    }

    
    if(!isset($_POST['post_nom_etudiant']))
    {
      $_POST['post_nom_etudiant']=$donnee['post_nom_etudiant'];
    }

    if(!isset($_POST['prenom_etudiant']))
    {
      $_POST['prenom_etudiant']=$donnee['prenom_etudiant'];
    }

    if(!isset($_POST['biographie_etudiant']))
    {
      $_POST['biographie_etudiant']=$donnee['biographie_etudiant'];
    }

    if(!isset($_POST['date_naissance_etudiant']))
    {
      $_POST['date_naissance_etudiant']=$donnee['date_naissance_etudiant'];
    }

    if(!isset($_POST['promotion']))
    {
      $_POST['promotion']=$donnee['promotion_etudiant'];
    }
    
    if(!isset($_POST['mot_de_passe']))
    {
      $_POST['mot_de_passe']=$donnee['mot_de_passe'];
    }

    if(!isset($_POST['filiere']))
    {
      $_POST['filiere']=$donnee['filiere_promotion'];
    }

    if ($_POST['promotion']=='1' OR $_POST['promotion']=='2')
{
  $_POST['filiere'] = '';
}
    $req = $db->prepare('UPDATE ETUDIANT SET nom_etudiant=?, post_nom_etudiant=?, prenom_etudiant=?,
    biographie_etudiant=?, date_naissance_etudiant=?, promotion_etudiant=?, mot_de_passe=?,
     filiere_promotion=?  WHERE id_etudiant=$id'); 
    $req->execute(array($_POST['nom_etudiant'], $_POST['post_nom_etudiant'], $_POST['prenom_etudiant'],
    $_POST['biographie_etudiant'], $_POST['date_naissance_etudiant'], $_POST['promotion'],
    $_POST['mot_de_passe'], $_POST['filiere']));
}


function supprimer($id)
{
  global $db;

  $reponse = $db->query("DELETE FROM ETUDIANT WHERE Id_etudiant=$id");
}




function connexions($logine, $mot_de_passe)
{
  global $db;

  $reponse = $db->query("SELECT * FROM ETUDIANT WHERE logine=$logine AND mot_de_passe=$mot_de_passe");
  $donnees = $reponse->fetch();
 
  return $donnees['id_etudiant'];
}


function verification($logine)
{
  global $db;

  $reponse = $db->query("SELECT * FROM ETUDIANT WHERE logine=$logine");
  $donnees = $reponse->fetch();
  if (empty($donnees))
  {
    return 1;
  } else {
    return 0;
  }
}


function comptes()
{
  global $db;

  $reponse = $db->query("SELECT COUNT(*) FROM ETUDIANT");
  $donnees = $reponse->fetchColumn();
  return $donnees;
  
}

 