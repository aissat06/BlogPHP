<?php
// le fichier qui va etre le carrefour de mon projet
/*  utilisation systeme de routeur: faire passer toutes les pages par un fichier php particulier (ex: index.php)
    le routeur va s'occuper de charger les bons fichier 
    ¨Pour cela on utilise altorouter (https://packagist.org/packages/altorouter/altorouter) 
    Pour l'installer : composer require altorouter/altorouter:1.2.0
    Mettre index.php dans le dossier public qui servira comme racine à notre serveur web pour eviter que ce serveur aura accès au dossier vendor 
*/
require '../vendor/autoload.php';

// constante aqui contient le chemin vers les vues
define('VIEW_PATH', dirname(__DIR__) . '/views');
// démarrer le router
$router = new AltoRouter();
// gerer mes urls
$router->map('GET', '/blog', function() {
    require VIEW_PATH . '/post/index.php';
});
$router->map('GET', '/blog/category', function() {
    require VIEW_PATH . '/category/show.php';
});
// demander au router si l'url qui est appelé correspond à un des routes creés
$match = $router->match();
$match['target']();