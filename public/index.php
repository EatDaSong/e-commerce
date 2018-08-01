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
    if ($action === 'deconnexion') {
        if (isset($_SESSION['user'])) {
            app\table\Utilisateur::deconnexion('user');
            echo "Vous vous êtes bien déconnecté";
        }
    } elseif ($action === 'connexion') {
        if (app\table\Utilisateur::connexion($_POST['username'], $_POST['password'], "user")) {
            echo "Connexion établie";
        } else {
            echo "Votre identifiant et votre mot de passe ne correspondent pas";
        }
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
}

$content = ob_get_clean();

require 'pages/templates/default.php';
