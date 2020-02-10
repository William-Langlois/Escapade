<?php
session_start();
require '../vendor/autoload.php';

function chargerClasse($classe){
    $ds = DIRECTORY_SEPARATOR;
    $dir = __DIR__."{$ds}.."; //Remonte d'un cran par rapport à index.php
    $classeName = str_replace('\\', $ds,$classe);

    $file = "{$dir}{$ds}{$classeName}.php";
    if(is_readable($file)){
        require_once $file;
    }
}
spl_autoload_register('chargerClasse');


$router = new \src\Router\Router($_GET['url']);
// Index
$router->get('/', "Basic#Index");
// connexion
$router->get('/Login', 'User#loginForm');
$router->post('/Login', 'User#loginCheck');
$router->get('/Logout', 'User#logout');
// Inscription
$router->get('/Inscription', 'User#inscriptionForm');
$router->post('/Inscription', 'User#inscriptionCheck');



echo $router->run();

