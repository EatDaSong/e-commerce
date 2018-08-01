<?php

require 'app/autoloader.php';
app\autoloader::register();

if(isset($_GET['p']))   {
    $page = $_GET['p'];
}   else    {
    $page = 'index';
}

//Initialisation des objets
$db = new app\database('ecommerce');



ob_start();
if($page === 'index')   {
    require 'pages/articles.php'; 
}   elseif($page === 'form')    {
    require 'pages/form.php';
}   elseif($page === 'articles')    {
    require 'pages/articles.php';
}   elseif($page === 'connexion')   {
    require 'pages/connexion.php';
}   elseif($page === 'femme')   {
    require 'pages/femme.php';
}   elseif($page === 'homme')   {
    require 'pages/homme.php';
}   elseif($page === 'enfant')  {
    require 'pages/enfant.php';
}
$content = ob_get_clean();

require 'pages/templates/default.php';