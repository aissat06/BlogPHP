<?php
// le fichier qui va etre le carrefour de mon projet
/*  utilisation systeme de routeur: faire passer toutes les pages par un fichier php particulier (ex: index.php)
    le routeur va s'occuper de charger les bons fichier 
    ¨Pour cela on utilise altorouter (https://packagist.org/packages/altorouter/altorouter) 
    Pour l'installer : composer require altorouter/altorouter:1.2.0
    Mettre index.php dans le dossier public qui servira comme racine à notre serveur web pour eviter que ce serveur aura accès au dossier vendor 
*/

use App\Router;

require '../vendor/autoload.php';

define('DEBUG_TIME', microtime(true));
// pachage whoops qui affiche une belle page d'erreur
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// code remplaçant
$router = new Router(dirname(__DIR__) . '/views');
$router
    ->get('/blog', 'post/index', 'blog')
    ->get('/blog/category', 'category/show', 'category')
    ->run();
// constante aqui contient le chemin vers les vues
define('VIEW_PATH', dirname(__DIR__) . '/views');
// Remplacé par le code remplaçant
/*// démarrer le router
$router = new AltoRouter();

// constante aqui contient le chemin vers les vues
define('VIEW_PATH', dirname(__DIR__) . '/views');

// gerer mes urls
$router->map('GET', '/blog', function() {
    require VIEW_PATH . '/post/index.php';
});
$router->map('GET', '/blog/category', function() {
    require VIEW_PATH . '/category/show.php';
});
// demander au router si l'url qui est appelé correspond à un des routes creés
$match = $router->match();
$match['target']();*/