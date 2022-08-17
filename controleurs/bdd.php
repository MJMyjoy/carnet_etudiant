<?php

/* C'est en tout début de fichier que l'on vérifie les autorisations.
Les news sont visibles par tous, mais si vous voulez en restreindre l'accès,
c'est ici que cela se passe. */

 //On inclut le modèle
 include 'modeles/bdd.php';

 // On stock le nombre total des personnes enregistrees
$nombre=comptes(); 

if (isset($_GET['Deconnexion']))
{ 
    /* Pour se deconnecter on retire la valeur de $_SESSION['id'] */
   $_SESSION['id'] = NULL;
    session_destroy();
    header('Location: index.php');
}


if (isset($_GET['test']) AND $_GET['test']=='Accueil')
{
    if ($_SESSION['id']== NULL)
    {
        /* ICI l'utilisateur n'est pas connecté */
        $_GET['connect'] =0;
        include 'vues/index.php';
    }
    else 
    {
    /* Ici c'est au cas ou un utilisateur deja connect desir revenir sur sa page d'accueil */
    $_GET['connect'] =1;
    $moi= recuperer($_SESSION['id']);
    include 'vues/index.php';
    }
}

if (isset($_GET['test']) AND $_GET['test']=='Connexions')
 { 
    $id = Connexions('"'.$_POST['logine'].'"', '"'.$_POST['mot_de_passe'].'"');
    if (empty($id))
    {
       /* Le login et mot de passe ne trouvent pas dans la base des donnees */
        $_GET['pages'] ='erreur'; // La variable $_GET['pages']  est utilisee sur la page de connection
        include 'vues/connexion/connexion.php';
    }
     else
    {
        /* La variable  $_SESSION['id'] garde l'id de la personne connectees */
    $_SESSION['id'] = $id;
    $_GET['connect'] =1; // La variable $_GET['connect']  est utilisee sur la page d'accueil d'un utilisateur connecté ou non
    $moi= recuperer($_SESSION['id']);
    include 'vues/index.php';
    
    }
}

if (isset($_GET['test']) AND $_GET['test']=='Inscriptions')
{
    $tests = verification('"'.$_POST['logine'].'"');
    if ($tests==1)
    {
        enregistrer();
        comptes();
        $nombre=comptes(); 

        $_GET['pages'] ='succees';
        include 'vues/connexion/connexion.php';
    }

    else
    {
        /* Ici le login est deja utilise */
        $_GET['pagef'] = 'deja';
        include 'vues/inscription/inscription.php';
    }
    }

    if (isset($_GET['test']) AND $_GET['test']=='Suppression')
    {
        supprimer($_SESSION['id']);
        comptes();
        $nombre=comptes(); 
        $_SESSION['id']=NULL;
        $_GET['connect'] =0;
        $_GET['pages'] ='supp';
        include 'vues/connexion/connexion.php';
    }
 

    if (isset($_GET['test']) AND $_GET['test']=='Rechercher')
    {
        if ($_SESSION['id']== NULL)
        {
            /* ICI l'utilisateur n'est pas connecté */
            $_GET['connect'] =0;
            include 'vues/index.php';
        }
        else 
        {
         $_GET['connect'] =1;
            $moi= recuperer($_SESSION['id']);
            if (isset($_POST['nom']))
                {
                $etudiants=rechercher('"'.$_POST['nom'].'"');
                }
            else
            {
            
            $etudiants=NULL;}
            }
    include 'vues/recherche/index.php';

}


    if (isset($_GET['test']) AND $_GET['test']=='Affichage')
    {
        if ($_SESSION['id']== NULL)
        {
            /* ICI l'utilisateur n'est pas connecté */
            $_GET['connect'] =0;
            include 'vues/index.php';
        }
        else 
        {
    $_GET['connect'] =1;
    $moi= recuperer($_SESSION['id']);
    $etudiants=afficher();
    include 'vues/afficher/index.php';
        }
}

if (isset($_GET['test']) AND $_GET['test']=='Affichage_date')
{
    if ($_SESSION['id']== NULL)
    {
        /* ICI l'utilisateur n'est pas connecté */
        $_GET['connect'] =0;
        include 'vues/index.php';
    }
    else 
    {
$_GET['connect'] =1;
$moi= recuperer($_SESSION['id']);
$etudiants=grouper_date();
include 'vues/afficher/index.php';
    }
}



if (isset($_GET['test']) AND $_GET['test']=='Affichage_prom')
{
    if ($_SESSION['id']== NULL)
    {
        /* ICI l'utilisateur n'est pas connecté */
        $_GET['connect'] =0;
        include 'vues/index.php';
    }
    else 
    {
$_GET['connect'] =1;
$moi= recuperer($_SESSION['id']);
$etudiants=grouper_promotion();
include 'vues/afficher/index.php';
    }
}


if (isset($_GET['test']) AND $_GET['test']=='Affichage_fil')
{
    if ($_SESSION['id']== NULL)
    {
        /* ICI l'utilisateur n'est pas connecté */
        $_GET['connect'] =0;
        include 'vues/index.php';
    }
    else 
    {
$_GET['connect'] =1;
$moi= recuperer($_SESSION['id']);
$etudiants=grouper_filiere();
include 'vues/afficher/index.php';
    }
}


if (isset($_GET['test']) AND $_GET['test']=='Seconnecter')
{
    include 'vues/connexion/connexion.php';
}

if (isset($_GET['test']) AND $_GET['test']=='Sinscrire')
{
    include 'vues/inscription/inscription.php';
}

if (isset($_GET['test']) AND $_GET['test']=='Profils')
{
    if ($_SESSION['id']== NULL)
    {
        /* ICI l'utilisateur n'est pas connecté */
        $_GET['connect'] =0;
        include 'vues/index.php';
    }
    else 
    {
    /* Ici c'est au cas ou un utilisateur deja connect desir revenir sur sa page d'accueil */
    $_GET['connect'] =1;
    $moi= recuperer($_SESSION['id']);
    include 'vues/users/index.php';
    }
}
// Je pourrai peut etre en avoir besoin: include(dirname(__FILE__).'/../vues/.....');
?>