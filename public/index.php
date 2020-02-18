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
//Accueilheartplane
$router->get('/Accueil','Basic#Accueil');
// connexion
$router->get('/Login', 'User#loginForm');
$router->post('/Login', 'User#loginCheck');
$router->get('/Logout', 'User#logout');
// Inscription
$router->get('/Inscription', 'User#inscriptionForm');
$router->post('/Inscription', 'User#inscriptionCheck');

//chat
$router->get('/Chat/:id','Message#ShowChats#id');
$router->get('/Chat/:iduser/:iddest','Message#ShowOneChat#iduser#iddest');
$router->post('/sendChat/:iduser/:iddest','Message#SendMessage#iduser#iddest');

//follow
$router->get('/liked/:iduser','Like#ShowLiked#iduser');
$router->get('/like/:iduser','Like#ShowLike#iduser');
$router->get('/newlike/:iduser/:iduserliked','Like#likeSomebody#iduser#iduserliked');
$router->get('/removelike/:iduser/:iduserliked','Like#DeleteLike#iduser#iduserliked');

//notif
$router->get('/Notification/:iduser','Notifications#ShowNotification#iduser');

//setup du profil
$router->get('/ProfileSetup/:iduser','User#ShowSetupProfil#iduser');
$router->post('/ProfileSetup/:iduser','User#ShowSetupProfil#iduser');
//profile
$router->get('/Profile/:iduser',"User#ShowProfile#iduser");
$router->get('/Galerie/:iduser',"User#ShowGalerie#iduser");
$router->get('/Galerie/:categorie/:iduser',"User#ShowGalerieCategorie#categorie#iduser");
$router->get('/AddPhoto/:iduser',"User#ShowAddPhoto#iduser");
$router->post('/AddPhoto/:iduser',"User#AddPhoto#iduser");
$router->get('/DeletePhoto/:iduser/:idphoto/:redirect','User#DeletePhoto#iduser#idphoto#redirect');

//profile update
$router->get('/UpdateProfile/:iduser','User#ShowUpdateProfile#iduser');
$router->post('/UpdateProfile/:iduser','User#UpdateProfile#iduser');

//map
$router->get('/map','User#ShowMap');

//ban
$router->get('/ban/:concerneid','Ban#ShowBanForm#concerneid');
$router->post('/ban/:concerneid','Ban#Ban#concerneid');

//Signalement
$router->get('/signalement/:iduser','Signalement#ShowSignalement#iduser');
$router->get('/signaler/:iduser/:idconcerne/:managed/:context','Signalement#SendSignalement#iduser#idconcerne#managed#context');

//Voyages
$router->get('/AddVoyage/:iduser','User#ShowAddVoyage#iduser');
$router->post('/AddVoyage/:iduser','User#AddVoyage#iduser');
$router->get('/DeleteVoyage/:iduser/:idvoyage','User#DeleteVoyage#iduser#idvoyage');

echo $router->run();

