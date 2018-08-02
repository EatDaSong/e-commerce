<?php

session_start();

require 'app/autoloader.php';
app\autoloader::register();

//traitement des actions à effectuer.

if (isset($_GET['a'])) {
    $action = $_GET['a'];
} else {
    $action = '';
}

if (!empty($action)) {
    ob_start();
 
    //Traitement des actions utilisateurs
        //déconnexion
    if ($action === 'deconnexion') {
        if (isset($_SESSION['user'])) {
            app\table\Utilisateur::deconnexion('user');
            echo "Vous vous êtes bien déconnecté";
        }
        //Connexion
    } elseif ($action === 'connexion') {
        if(isset($_POST['username']) and $_POST['password'])    {
            if (app\table\Utilisateur::connexion($_POST['username'], $_POST['password'], "user")) {
                echo "Connexion établie";
            } else {
                echo "Votre identifiant et votre mot de passe ne correspondent pas";
            }
        }   else    {
            echo "Vous êtes déjà identifié";
        }
        //Inscription
    } elseif ($action === 'inscription') {
        if (empty($_POST['mail']) and empty($_POST['mail2']) and empty($_POST['pseudo']) and empty($_POST['mdp']) and empty($_POST['mdp2'])) {
            echo "vous n'avez pas rempli tous les champs.";
        } else {
            if($_POST['mail'] === $_POST['mail2'] and $_POST['mdp'] === $_POST['mdp2'])   {
                    $inscription = app\table\Utilisateur::inscription($_POST['pseudo'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $_POST['genre'], $_POST['date'], $_POST['mail'], $_POST['adresse'], $_POST['ville'], $_POST['codepostal'], $_POST['pays']);
                    if ($inscription === true) {
                        app\table\Utilisateur::connexion($_POST['pseudo'], $_POST['mdp'], "user");
                        echo "Votre inscription s'est déroulé avec succés, vous êtes maintenant connecté";
                    } else {
                        if (stripos($inscription, 'pseudo') !== FALSE) {
                            echo 'Pseudo est déjà utilisé';
                        }
                        if (stripos($inscription, 'pseudo') !== FALSE and stripos($inscription, 'email') !== FALSE) {
                            echo ' | ';
                        }
                        if (stripos($inscription, 'email') !== FALSE) {
                            echo 'Email déjà utilisé';
                        }
                    }
            }   else    {
                echo "Vos email ou vos mots de passent ne correspondent pas";
            }
        }
    }   elseif ($action === 'editprofil')   {
        if(isset($_SESSION['user']))    {
            $notif = "";
            $utilisateur = new \app\table\Utilisateur($_SESSION['user']);
            if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['pays']) and !empty($_POST['adresse']) and !empty($_POST['codepostal']) and !empty($_POST['ville']) and !empty($_POST['pseudo'] and !empty($_POST['mail'])))    {
                $utilisateur->setPseudo($_POST['pseudo']);
                $utilisateur->setPays($_POST['pays']);
                $utilisateur->setPrenom($_POST['prenom']);
                $utilisateur->setNom($_POST['nom']);
                $utilisateur->setAdresse($_POST['adresse']);
                $utilisateur->setCodePostal($_POST['codepostal']);
                $utilisateur->setVille($_POST['ville']);
                $utilisateur->setEmail($_POST['mail']);
                if(!empty($_POST['mdp']))  {
                    if(!empty($_POST['mdp2']))   {
                        if($_POST['mdp'] == $_POST['mdp2']) {
                            $utilisateur->setMotDePasse($_POST['mdp']);
                            $notif .='<p class="detaill1" style="color: green;">Votre mot de passe a été avec succès</p>';
                        }   else    {
                            $notif .= '<p class="detaill1" style="color: red;">Vos mots de passes ne correspondent pas</p>';
                        }
                    }   else    {
                        $notif .= '<p class="detaill1" style="color: red;">Vous n\'avez pas remplit vos deux champs mot de passes, nous n\'avons pas pu les changer</p>';
                    }
                }
                $utilisateur->sauvegarderLUtilisateur();
                $notif .= '<p class="detaill1" style="color: green;">Votre profil a été édité avec succés<p>';
            }
        }
    }
    $bandeau = ob_get_clean();
}


//Traitement des pages à partir de là

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'index';
}

ob_start();
if ($page === 'index') {
    require 'pages/articles.php';
} elseif ($page === 'form') {
    require 'pages/form.php';
} elseif ($page === 'articles') {
    require 'pages/articles.php';
} elseif ($page === 'femme') {
    require 'pages/femme.php';
} elseif ($page === 'homme') {
    require 'pages/homme.php';
} elseif ($page === 'enfant') {
    require 'pages/enfant.php';
} elseif ($page === 'test') {
    require 'pages/test.php';
}   elseif ($page === 'profil') {
    if(isset($_SESSION['user']))    {
        if(!isset($utilisateur))    {
            $utilisateur = new \app\table\Utilisateur($_SESSION['user']);
        }
        require 'pages/profil.php';
    }   else    {
        require 'pages/articles.php';
    }
}

$content = ob_get_clean();

if($page === 'profil')  {
    if(isset($_SESSION['user']))    {
        require 'pages/templates/profil.php';
    }   else    {
        require 'pages/templates/default.php';
    }
} else  {
    require 'pages/templates/default.php';
}
